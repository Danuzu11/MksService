<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cierrecaja $cierrecaja
 */
?>

<?= $this->Html->css('styleAdd.css') ?>

<div class="main-add">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Agregar Cierre</h1>
    </div>

    <div class="main-add-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <?= $this->Form->create($cierrecaja) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Agregar nuevo Distribuidor') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Fecha de cierre') ?></label>
                <input type="date" class="ml-20 bg-slate-500  rounded shadow-sm" id="fecha" name="fecha_cierre" required>
            </div>

            <div class="form-group">
                <label><?= __('Ingresado en Efectivo') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="total_efectivo" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

            <div class="form-group">
                <label><?= __('Ingresado en Divisas') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="total_divisas" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

            <div class="form-group">
                <label><?= __('Ingresado en Tarjeta') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="total_tarjeta" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

            <div class="form-group">
                <label><?= __('Ingresado en Punto') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="total_punto" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

        </fieldset>

        <!-- <input type="text"> -->
        <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>

<script>


    // var fechaActual = new Date();
    // console.log("fechaActual: ",fechaActual)
    // fechaActual.setDate(fechaActual.getDate() + 0.5);
    // console.log("fechaActual: ",fechaActual)
    // var fechaMinima = fechaActual.toISOString().split("T")[0];
    // console.log("fechaMinima: ",fechaMinima)
    // document.getElementById("fecha").setAttribute("min", fechaMinima);
    // document.getElementById("fecha").setAttribute("max", fechaMinima);

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