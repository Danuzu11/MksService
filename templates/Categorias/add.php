<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>

<?= $this->Html->css('styleAdd.css') ?>

<div class="main-add">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Agregar Categoria</h1>
    </div>

    <div class="main-add-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <?= $this->Form->create($categoria) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Agregar nueva Categoria') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Tipo de producto') ?></label>
                <input type="text" class="form-control rounded shadow-sm" id="tipo_producto" name="tipo_producto" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" required>
            </div>

            <div class="form-group">
                <label><?= __('Descripcion') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="descripcion" required>
            </div>


        </fieldset>

        <!-- <input type="text"> -->
        <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>