<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Distribuidore $distribuidore
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">

        <h1>
            Perfil Distribuidor
        </h1>
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
        <h3>
            <?= h($distribuidore->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Nombre del Distribuidor</label>
                <span>
                    <?= $distribuidore->nombre ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Numero de telefono</label>
                <span>
                    <?= h($distribuidore->tlf) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Descripcion</label>
                <span>
                    <?= h($distribuidore->descripcion) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Direccion</label>
                <span>
                    <?= h($distribuidore->direccion) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>