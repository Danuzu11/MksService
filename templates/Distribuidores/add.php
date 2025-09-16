<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Distribuidore $distribuidore
 */
?>

<?= $this->Html->css('styleAdd.css') ?>

<div class="main-add">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Agregar Distribuidores</h1>
    </div>

    <div class="main-add-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <?= $this->Form->create($distribuidore) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Agregar nuevo Distribuidor') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Nombre del distribuidor') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="nombre"  pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" required>
            </div>

            <div class="form-group">
                <label><?= __('Numero de telefono') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="tlf" pattern="[0-9]*" title="Ingrese un numero valido"  required>
            </div>

            <div class="form-group">
                <label><?= __('Descripcion del distribuidor') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="descripcion" required>
            </div>

            <div class="form-group">
                <label><?= __('Direccion del distribuidor') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="direccion" required>
            </div>

        </fieldset>

        <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>

<script>

//     const select = document.querySelector('select');

//     function validateUsername() {
//     const userInput = document.getElementById("userInput");
//     const usernameWarning = document.getElementById("usernameWarning");
    
//     // Expresión regular para verificar espacios en blanco
//     const regex = /\s/;
    
//     if (regex.test(userInput.value)) {
//         usernameWarning.style.display = "block";
//     } else {
//         usernameWarning.style.display = "none";
//     }
// }

// function validatePassword() {
//     const passwordInput = document.getElementById("passwordInput");
//     const passwordStrength = document.getElementById("passwordStrength");

//     // Expresión regular para verificar la fortaleza de la contraseña
//     const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,}$/;
   
//     // ^: Coincide con el inicio de la cadena.
//     // (?=.*[A-Z]): Debe contener al menos una letra mayúscula.
//     // (?=.*[a-z]): Debe contener al menos una letra minúscula.
//     // (?=.*\d): Debe contener al menos un dígito.
//     // (?=.*[@$!%*?&]): Debe contener al menos uno de los caracteres especiales: @, $, !, %, *, ?, o &.
//     // [A-Za-z\d@$!%*?&]{8,}: La contraseña debe estar formada por caracteres alfanuméricos y los caracteres especiales mencionados y tener al menos 8 caracteres de longitud.
//     // $: Coincide con el final de la cadena.


//     if (regex.test(passwordInput.value)) {
//         // La contraseña cumple con los requisitos
//         passwordStrength.textContent = "Fortaleza de contraseña: Fuerte";
//         passwordStrength.style.color = "green";
//     } else {
//         // La contraseña no cumple con los requisitos
//         passwordStrength.textContent = "Fortaleza de contraseña: Débil, la contraseña debe contener al menos: una letra mayuscula, una letra minuscula, un digito, un caracter especial.";
//         passwordStrength.style.color = "red";
//     }
// }


</script>