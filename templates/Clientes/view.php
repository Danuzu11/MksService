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
            Perfil Cliente
        </h1>
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
        <h3>
            <?= h($cliente->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Nombre del Empleado</label>
                <span>
                    <?= $cliente->nombre ?>
                </span>
            </div>
            <div class="user-item status">
                <label>Direccion</label>
                <span>
                    <?= h($cliente->direccion) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Numero de telefono</label>
                <span>
                    <?= h($cliente->tlf) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Deuda</label>
                <span>
                    <?= h($cliente->deuda) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>

