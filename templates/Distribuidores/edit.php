<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Distribuidore $distribuidore
 */

?>

<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Empleado</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($distribuidore) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Distribuidor') ?>
            </legend>

            <div class="form-group">
                <label>
                    <?= __('Nombre Medico') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="nombre"  pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" 
                    value="<?= $distribuidore->nombre ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Numero de telefono') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="tlf" pattern="[0-9]*" title="Ingrese un numero valido" 
                    value="<?= $distribuidore->tlf ?>" required>
            </div>

            
            <div class="form-group">
                <label>
                    <?= __('Descripcion') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="descripcion"
                    value="<?= $distribuidore->descripcion ?>" required>
            </div>

            
            <div class="form-group">
                <label>
                    <?= __('Direccion') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="direccion"
                    value="<?= $distribuidore->direccion ?>" required>
            </div>
        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>

<script></script>
