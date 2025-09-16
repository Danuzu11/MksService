<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cierrecaja> $cierrecajas
 */
?>
<?= $this->Html->css('indexInterfaces.css') ?>
<div class="mainCard column">

    <div class="bienvenida-conteo flex">

        <div class="bienvenida-Admin bg-slate-950 rounded-3xl mx-4 my-8 shadow-md ">
            <h1 style="font-weight: 600;"> Bienvenido al menu de cierres de caja </h1>
            <p class="mt-5">
                !Bienvenido! en este apartado podras visualizar y editar los cierres de caja registrados en la plataforma
            </p>
        </div>

        <!-- <div class="conteo-Admin rounded-3xl bg-slate-950 items-center justify-center mb-7 mx-8 my-8 shadow-md">
            <h1 style="font-weight: 600;"> Total Medicos Registrados </h1>
            <p class="mt-1"> Resumen de todos los doctores registrados </p>
            <div class="logoPersonas mt-2">
                <img class="rounded-md h-auto rounded-full" src="img/iconoCardioRojo.png" alt="Imagen">
                <h1 class="mx-5" style="font-weight: normal; font-size: 36px">
                    <?= 0 ?> Ks
                </h1>
            </div>
        </div> -->

    </div>

    <div class="tabla bg-slate-950 rounded-3xl">
        <table class="table-fixed">
            
            <div class="clase-contenedor mb-5">
                <?= $this->Html->link('Agregar Cierre de Caja', ['controller' => 'cierrecajas', 'action' => 'add'], ['class' => 'buttonAdd ml-4']); ?>
            </div>
            <div class="col-span-1" style="display: flex; flex-direction: row; justify-content: space-between;">

                <div class="header">
                    <h1 class="mx-5" style="font-weight: 600;">Cierres de caja</h1>
                </div>

                <!-- <div class="search my-auto">
                    <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'type' => 'get']) ?>
                    <div class="mx-20" style="display: flex;">

                        <div class="input text mx-5">
                            <?= $this->Form->control('search', ['label' => false, 'class' => 'form-control rounded-md', 'placeholder' => 'Buscar nombre o Codigo']) ?>
                        </div>

                        <div class="input submit">
                            <?= $this->Form->button('Buscar', ['class' => 'w-full buttonSearch']) ?>
                        </div>

                    </div>
                    <?= $this->Form->end() ?>
                </div> -->

            </div>


            <thead>
                <tr>
                    <th scope="col">
                        <?= $this->Paginator->sort('Fecha de Cierre') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('Ingreso Efectivo') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('Ingreso Divisas') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('Ingreso Tarjeta') ?>
                    </th>

                    <th scope="col">
                        <?= $this->Paginator->sort('Ingreso Punto') ?>
                    </th>

                    <th scope="col" class="actions">
                        <?= _('Actions') ?>
                    </th>
                </tr>
            </thead>
            <?php if($cierrecajas != 'null'){ ?>
                <tbody>
                    <?php foreach ($cierrecajas as $cierrecaja): ?>
                        <tr>
                            <td>
                                <?= h($cierrecaja->fecha_cierre->format('d-m-Y')) ?>
                            </td>

                            <td>
                                <?= h($cierrecaja->total_efectivo) ?>
                            </td>

                            <td>
                                <?= h($cierrecaja->total_divisas) ?>
                            </td>

                            <td>
                                <?= h($cierrecaja->total_tarjeta) ?>
                            </td>

                            <td>
                                <?= h($cierrecaja->total_punto) ?>
                            </td>

                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'View', $cierrecaja->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'Edit', $cierrecaja->id], ['class' => 'mx-4']) ?>

                                <button id="btn-delete-doctor" name="<?= $cierrecaja->id ?>/<?= $cierrecaja->id ?>"
                                    style="color: red;">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <?php if($cierrecajas != 'null'){ ?>
    <div class="paginators">

        <ul class="paginationDoctor">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>

    <p class="text-paginator">
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) actuales de {{count}} en total')) ?></p>
    </p>
    <?php } ?>
</div>

<script>
    const botones = document.querySelectorAll("#btn-delete-doctor");

    if (botones) {
        for (const boton of botones) {

            boton.addEventListener('click', (event) => {

                // Detiene el comportamiento normal del botón
                event.preventDefault();

                // Asigno las variables nombre y id y las pico para usarlas
                const nombre_id = boton.name.split("/");
                const nombre = nombre_id[0];
                const idCierrecaja = nombre_id[1];
                console.log(nombre)
                console.log(idCierrecaja)
                // Alerta si confirma eliminacion
                swal({
                    title: "Eliminando..",
                    text: "¿Estás seguro de que quieres eliminar el registro " + nombre + " ?",
                    icon: "warning",
                    dangerMode: true,
                    buttons: ["Ok", "Cancel"],
                }).then((logout) => {
                    if (!logout) {
                        // window.location.href = 'medicos/delete/' + id;

                        var form = document.createElement("form");
                        form.method = "POST";
                        form.action = 'cierrecajas/delete/' + idCierrecaja;

                        var inputNombre = document.createElement("input");
                        inputNombre.type = "hidden";
                        inputNombre.name = "nombre";
                        inputNombre.value = nombre;

                        var inputId = document.createElement("input");
                        inputId.type = "hidden";
                        inputId.name = "id";
                        inputId.value = idCierrecaja;

                        form.appendChild(inputNombre);
                        form.appendChild(inputId);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        }
    }

</script>
