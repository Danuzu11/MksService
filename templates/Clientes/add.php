<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?= $this->Html->css('styleAdd.css') ?>

<div class="main-add">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Agregar Cliente</h1>
    </div>

    <div class="main-add-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <?= $this->Form->create($cliente) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Agregar Cliente') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Nombre Cliente') ?></label>
                <input type="text" id="nombre" class="form-control rounded shadow-sm" name="nombre" id="userInput" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" required>
            </div>

            <div class="form-group">
                <label><?= __('Direccion') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="direccion" id="userInput" required>
            </div>

            <div class="form-group">
                <label><?= __('Numero de telefono') ?></label>
                <input type="text" id="tlf" class="form-control rounded shadow-sm" name="tlf" id="userInput" pattern="[0-9]*" title="Ingrese un numero valido"  required>
            </div>

            
            <div class="form-group">
                <label><?= __('Deuda') ?></label>
                <input type="text" id="deuda" class="form-control rounded shadow-sm" name="deuda" id="userInput" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

        </fieldset>

        <?= $this->Form->button(__('Agregar'), ['class' => 'botoncito btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>

<script>

    const nombreInput = document.getElementById('nombre');
    const tlfInput = document.getElementById('tlf');
    const deudaInput = document.getElementById('deuda');

    const regex = /^[a-zA-Z\s]+$/; 
    const regexSoloNumeros = /^[0-9]*$/; 
    const regexSoloDecimales = /^[0-9.]+$/

    nombreInput.addEventListener('keypress', (event) => {
        const char = String.fromCharCode(event.charCode); 
        if (!regex.test(char)) {
            console.error('Only letters and spaces allowed.');
            event.preventDefault(); 
        }
    });

    tlfInput.addEventListener('keypress', (event) => {
        const char = String.fromCharCode(event.charCode); 
        if (!regexSoloNumeros.test(char)) {
            console.error('Only numbers');
            event.preventDefault(); 
        }
    });

    deudaInput.addEventListener('keypress', (event) => {
        const char = String.fromCharCode(event.charCode); 
        if (!regexSoloDecimales.test(char)) {
            console.error('Only decimals');
            event.preventDefault(); 
        }
    });


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

