<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">

        <h1>
            Categoria
        </h1>
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
        <h3>
            <?= h($categoria->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Tipo Producto</label>
                <span>
                    <?= $categoria->tipo_producto ?>
                </span>
            </div>
            <div class="user-item status">
                <label>Descripcion</label>
                <span>
                    <?= h($categoria->descripcion) ?>
                </span>
            </div>

        </div>
        <h1>________________________________________</h1>

    </div>
</div>