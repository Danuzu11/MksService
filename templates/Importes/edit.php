<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Importe $importe
 */
$fechaFormateada = $importe->fecha->format('Y-m-d');
$productosImportados = 0;
if ($importe->productos != null) {
    $productosImportados = json_decode($importe->productos);
}

$productCount = 1;
?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Ver Importe</h1>
    </div>

    <div class="empleado-perfil">
        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($importe) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Importe') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Distribuidor designado') ?></label> <br>
                <select style="color: green;" id="select-categoria" name="id_distribuidor"
                    class="form-control2 rounded shadow-sm select-status" required>
                    <?php foreach ($distribuidores as $key => $distribuidore): ?>
                        <option style="color: green;" value="<?php echo $distribuidore->id; ?>">
                            <?php echo $distribuidore->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Precio') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="precio" value="<?= $importe->precio ?>" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Fecha') ?>
                </label>
                <input type="date" class="ml-20 bg-slate-500 rounded shadow-sm" name="fecha"
                    value="<?= $fechaFormateada ?>" required>
            </div>

            <!-- <div class="form-group">
                <label>
                    <?= __('Productos') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="productos"
                    value="<?= $importe->productos ?>" required>
            </div> -->

            <div class="form-group">
                <label><?= __('Productos') ?></label>
                <!-- <input type="text" class="form-control rounded shadow-sm" name="productos"> -->

                <div id="productsContainer">
                    <!-- Aquí se agregarán dinámicamente los campos de producto -->
                    <?php if ($importe->productos != 'null') { ?>
                        <?php foreach ($productosImportados as $key => $productoImportado): ?>
                            <?php $productCount = $productCount + 1; ?>
                            <div id="product<?= $productCount ?>Div">
                                <label for="product<?= $productCount ?>">Producto <?= $productCount ?> </label>
                                <input type="text" class="form-control rounded shadow-sm" id="product<?= $productCount ?>"
                                    name="productos[]" value="<?= $productoImportado ?>" required>
                                <button type="button" class="bg-[#ef4444] rounded shadow-sm"
                                    onclick="removeProduct(<?= $productCount ?>)">Eliminar</button>
                            </div>
                        <?php endforeach; ?>
                    <?php } ?>
                </div>
                <button type="button" onclick="addProduct()">Agregar Producto</button>

            </div>

        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>

<?php if ($importe->productos != null) {

    echo $this->Html->scriptBlock(sprintf('let productosImportados = %s;', json_encode($productosImportados)));
}

?>

<script>

    const selectEspecialidad = document.getElementById('select-categoria');
    const distribuidorId = "<?= $importe->distribuidore->id ?>";
    selectEspecialidad.value = distribuidorId;
    selectEspecialidad.style.color = 'green';
    let productCount = 0
    if (productosImportados != null) {
        productCount = productosImportados.length
    }

    console.log(productCount)

    function addProduct() {
        if (productCount < 10) {
            const container = document.getElementById('productsContainer');

            const productDiv = document.createElement('div');
            productDiv.innerHTML = `
            <div id="product${productCount}Div">
                <label for="product${productCount}">Producto ${productCount + 1}:</label>
                <input type="text" class="form-control rounded shadow-sm" id="product${productCount}" name="productos[]" >
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

</script>

<style>
    /* estilos de boton actualizar */
    .btn-submit {
        border-radius: 25px;
        background-color: #EB6060;
        height: 40px;
        width: 60%;
        font-size: 14px;
        color: white;
        margin-left: 20%;
    }

    /* Finde */


    /* scroll invisible */
    ::-webkit-scrollbar {
        display: none;
    }

    /* Finde */


    /* estilos de vista main */
    .bodyController {
        overflow: auto;
        width: 30%;
    }

    .mainView {
        background-color: rgb(2 6 23);
    }

    /* Finde */


    /* estilos de icono de perfil */
    .imagePerfil {
        margin-left: 40%;
        width: 120px;
        height: 120px;
    }

    /* Finde */


    /* estilos para los forms-principales */
    .bodyController {
        margin: 0 auto;
        background-color: rgb(2 6 23);
    }

    .form-group {
        color: white;
        padding: 5px;
    }

    .bodyController .form-control:focus {
        outline: none;
        box-shadow: 0 0 0 5px rgba(0, 0, 255, 0.2);
    }

    .bodyController .form-control {
        /* background-color: transparent; */
        background-color: rgb(2 6 23);
        font-weight: 600;
        padding: 20px;
        border: 1px solid grey;
        width: 100%;
        height: 40px;
        margin: 0 auto;
        border-width: 2px;
        border-radius: 20px;
    }

    .bodyController .form-control1 {
        /* background-color: transparent; */
        background-color: rgb(2 6 23);
        width: 100%;
        border: 2px solid grey;
        padding: 10px;
    }

    /* Finde */


    /* estilos de las letras */
    ul {
        color: white;
    }

    h1 {
        font-size: 24px;
        color: white;
        font-weight: bold;
    }

    p {
        font-size: 12px;
        color: #959ea9;
        font-weight: bold;
    }

    h2 {
        font-size: 24px;
        color: white;
        font-weight: 600;
    }

    label {
        color: white;
        font-weight: 600;
    }

    /* finde */


    /* estilos del select */
    .select-status {
        /* background-color: transparent; */
        background-color: rgb(2 6 23);
        border: 1px solid grey;
        width: 50%;
        height: 40px;
        margin-left: 20%;
        text-align: center;
        border-width: 2px;
        border-radius: 20px;
        font-weight: 600;
    }

    /* finde */
</style>