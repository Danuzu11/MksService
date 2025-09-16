
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */

?>

<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Cliente</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($cliente) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Cliente') ?>
            </legend>

            <div class="form-group">
                <label>
                    <?= __('Nombre del Cliente') ?>
                </label>
                <input type="text" id="nombre" class="form-control rounded shadow-sm" name="nombre" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" 
                    value="<?= $cliente->nombre ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Direccion') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="direccion" 
                    value="<?= $cliente->direccion ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Telefono') ?>
                </label>
                <input type="text" id="tlf" class="form-control rounded shadow-sm" name="tlf" pattern="[0-9]*" title="Ingrese un numero valido"
                    value="<?= $cliente->tlf ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Deuda') ?>
                </label>
                <input type="text" id="deuda" class="form-control rounded shadow-sm" name="deuda" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $cliente->deuda ?>" required>
            </div>
        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
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

</script>