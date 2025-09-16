<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cierrecaja $cierrecaja
 */

$fechaFormateada = $cierrecaja->fecha_cierre->format('Y-m-d');
?>


<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Cierre de Caja</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($cierrecaja) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Cliente') ?>
            </legend>

            <div class="form-group">
                <label>
                    <?= __('Fecha del cierre') ?>
                </label>
                <input type="date" class=" ml-20 bg-slate-500  rounded shadow-sm" name="fecha_cierre" value="<?= $fechaFormateada ?>"  required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Total de efectivo recibidas') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="total_efectivo" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $cierrecaja->total_efectivo ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Total de transacciones recibidas') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="total_tarjeta" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $cierrecaja->total_tarjeta ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Total de divisas recibidas') ?>
                </label> 
                <input type="text" class="form-control rounded shadow-sm" name="total_divisas" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $cierrecaja->total_divisas ?>" required>
            </div>

            
            <div class="form-group">
                <label>
                    <?= __('Total en transacciones por punto recibidas') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="total_punto" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $cierrecaja->total_punto ?>" required>
            </div>

        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>