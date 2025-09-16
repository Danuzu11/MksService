<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">

    <div class="text-center ml-20 mb-3 mt-10">
        <h1>Ver Pedido</h1>
    </div>

    <div class="data-inside text-center content-center">

    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <h1>
            Pedido
        </h1>

        <h3>
            <?= h($this->Number->format($pedido->id)) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item status">
                <label>Cliente</label>
                <span>
                    <?= h($pedido->cliente->nombre) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Precio</label>
                <span>
                    <?= h($pedido->precio_total) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Fecha Pedido</label>
                <span>
                    <?= h($pedido->fecha_pedido->format('d-m-Y')) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>