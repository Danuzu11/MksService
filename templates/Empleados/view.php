<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">


        <h1>
            Perfil Empleados
        </h1>
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
        <h3>
            <?= h($empleado->id) ?>
        </h3>
        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Nombre Empleado</label>
                <span>
                    <?= $empleado->nombre ?>
                </span>
            </div>
            <div class="user-item status">
                <label>Salario</label>
                <span>
                    <?= h($empleado->salario) ?>
                </span>
            </div>
        </div>
        <h1>________________________________________</h1>

    </div>
</div>
