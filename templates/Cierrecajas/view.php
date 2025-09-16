<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">

        <h1>
            Cierre de Caja
        </h1>
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
        <h3>
            <?= h($cierrecaja->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Total Efectivo</label>
                <span>
                    <?= $cierrecaja->total_efectivo ?>
                </span>
            </div>
            <div class="user-item status">
                <label>Total Tarjeta</label>
                <span>
                    <?= h($cierrecaja->total_tarjeta) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Total Divisas</label>
                <span>
                    <?= h($cierrecaja->total_divisas) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Total Punto</label>
                <span>
                    <?= h($cierrecaja->total_punto) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Fecha Cierre</label>
                <span>
                    <?= h($cierrecaja->fecha_cierre->format('d-m-Y')) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>