<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>

<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Categoria de producto</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($categoria) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Categoria') ?>
            </legend>

            <div class="form-group">
                <label>
                    <?= __('Tipo de producto') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="tipo_producto" value="<?= $categoria->tipo_producto ?>" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios"  required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Descripcion') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="descripcion"
                    value="<?= $categoria->descripcion ?>" required>
            </div>


        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>