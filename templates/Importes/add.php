<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Importe $importe
 */

?>

<?= $this->Html->css('styleAdd.css') ?>

<div class="main-add">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Agregar Importe</h1>
    </div>

    <div class="main-add-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">

        <?= $this->Form->create($importe) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Agregar nuevo Distribuidor') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Fecha del importe') ?></label>
                <input type="date" class="ml-20 bg-slate-500 rounded shadow-sm" name="fecha" required>
            </div>

            <div class="form-group">
                <label><?= __('Costo total') ?></label>
                <input type="text" class="form-control rounded shadow-sm" name="precio" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)" required>
            </div>

            <div class="form-group">
                <label><?= __('Distribuidores') ?></label>
                <select style="color: green;" id="select-categoria"  name="id_distribuidor" class="form-control2 rounded shadow-sm select-status" required>
                    <option value="">Escoge el distribuidor</option>
                    <?php foreach ($distribuidores as $key => $distribuidore): ?>
                        <option style="color: green;" value="<?php echo $distribuidore->id; ?>">
                            <?php echo $distribuidore->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label><?= __('Productos') ?></label>
                <!-- <input type="text" class="form-control rounded shadow-sm" name="productos"> -->

                <div id="productsContainer">
                 <!-- Aquí se agregarán dinámicamente los campos de producto -->
                </div>
                <button type="button" onclick="addProduct()">Agregar Producto</button>

            </div>    
            
            <!-- <input type="text" class="form-control rounded shadow-sm" id="productosArray" name="productos" hidden> -->

        </fieldset>

        <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-submit rounded shadow-sm' , 'id'=>'btonsubmit']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>

<script>


let productCount = 0;

function addProduct() {
    if (productCount < 10) {
        const container = document.getElementById('productsContainer');

        const productDiv = document.createElement('div');
        productDiv.innerHTML = `
            <div id="product${productCount}Div">
                <label for="product${productCount}">Producto ${productCount + 1}:</label>
                <input type="text" class="form-control rounded shadow-sm" id="product${productCount}" name="productos[]" required>
                <button type="button" class="bg-[#ef4444] rounded shadow-sm" onclick="removeProduct(${productCount})">Eliminar</button>
            </div>
        `;

        container.appendChild(productDiv);
        productCount++;
    } else {
        alert('Solo se pueden agregar hasta 10 productos.');
    }
}

function removeProduct(index) {
    const productDiv = document.getElementById(`product${index}Div`);
    if (productDiv) {
        productDiv.remove();
        productCount--;
    }
}



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
