<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">

        <h1>
            Producto
        </h1>

        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <h3>
            <?= h($producto->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Nombre del Empleado</label>
                <span>
                    <?= $producto->nombre ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Descripcion</label>
                <span>
                    <?= h($producto->descripcion) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Categoria</label>
                <span>
                    <?= h($producto->categoria->tipo_producto) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Precio</label>
                <span>
                    <?= h($producto->precio) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Stock</label>
                <span>
                    <?= h($producto->stock) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>