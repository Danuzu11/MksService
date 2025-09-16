<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pedido> $pedidos
 */

?>

<?= $this->Html->css('indexInterfaces.css') ?>

<div class="mainCard column">

    <div class="bienvenida-conteo flex">

        <div class="bienvenida-Admin bg-slate-950 rounded-3xl mx-4 my-8 shadow-md ">
            <h1 style="font-weight: 600;"> Bienvenido a la interfaz de pedidos </h1>
            <p class="mt-5">
                !Bienvenido! en este apartado podras visualizar, agrega y editar los pedidos diarios que hagas
            </p>
        </div>
    </div>

    <div class="tabla bg-slate-950 rounded-3xl">
        <table class="table-fixed">

            <div class="clase-contenedor mb-5">
                <?= $this->Html->link('Agregar Nuevo Pedido', ['controller' => 'pedidos', 'action' => 'add'], ['class' => 'buttonAdd ml-4']); ?>
            </div>



            <div class="col-span-1" style="display: flex; flex-direction: row; justify-content: space-between;">

                <div class="header">
                    <h1 class="mx-5" style="font-weight: 600;">Pedidos</h1>
                </div>

                <div class="clase-contenedor mb-5">
                    <form method="post"
                        action="<?= $this->Url->build(['controller' => 'pedidos', 'action' => 'cerrarcaja']); ?>">
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="buttonCloseBox ml-11">Cerrar De Caja</button>
                    </form>
                </div>

            </div>

            <div class="search my-auto">
                <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'type' => 'get']) ?>
                <div class="mx-20" style="display: flex;">

                    <input type="date" class=" bg-slate-500 rounded shadow-sm" name="date">

                    <div class="input submit ml-5">
                        <?= $this->Form->button('Filtrar', ['class' => 'w-full buttonSearch']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>



            <thead>
                <tr>
                    <th scope="col">
                        <?= $this->Paginator->sort('Cliente') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('fecha_pedido') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('tipoPago') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('precio_total') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= _('Actions') ?>
                    </th>
                </tr>
            </thead>
            <?php if ($pedidos != 'null') { ?>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td>
                                <?= h($pedido->cliente->nombre) ?>
                            </td>

                            <td>
                                <?= h($pedido->fecha_pedido->format('d-m-Y')) ?>
                            </td>

                            <td>
                                <?= h($pedido->tipoPago) ?>
                            </td>

                            <td>
                                <?= h($pedido->precio_total) ?>
                            </td>

                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'View', $pedido->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'Edit', $pedido->id], ['class' => 'mx-4']) ?>

                                <button id="btn-delete-doctor" name="<?= $pedido->id ?>/<?= $pedido->id ?>"
                                    style="color: red;">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } ?>
        </table>
    </div>



    <?php if ($pedidos != 'null') { ?>
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
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) actuales de {{count}} en total')) ?>
        </p>
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
                const idPedidos = nombre_id[1];
                console.log(nombre)
                console.log(idPedidos)
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
                        form.action = 'pedidos/delete/' + idPedidos;

                        var inputNombre = document.createElement("input");
                        inputNombre.type = "hidden";
                        inputNombre.name = "nombre";
                        inputNombre.value = nombre;

                        var inputId = document.createElement("input");
                        inputId.type = "hidden";
                        inputId.name = "id";
                        inputId.value = idPedidos;

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