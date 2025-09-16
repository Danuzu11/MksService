<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */

?>

<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Producto</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($producto) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Producto') ?>
            </legend>

            <div class="form-group">
                <label>
                    <?= __('Nombre del Producto') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="nombre" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios"
                    value="<?= $producto->nombre ?>" required>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Descripcion') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="descripcion"
                    value="<?= $producto->descripcion ?>" required>
            </div>

            <div class="form-group">
                <label><?= __('Categoria') ?></label>
                <select style="color: green;" id="select-categoria"  name="id_categoria" class="form-control2 rounded shadow-sm select-status" required>
                    <?php foreach ($categoriasProductos as $key => $categoria): ?>
                        <option style="color: green;" value="<?php echo $categoria->id; ?>">
                            <?php echo $categoria->tipo_producto; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label>
                    <?= __('Precio') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="precio" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $producto->precio ?>" required>
            </div>
            <div class="form-group">
                <label>
                    <?= __('Stcok') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="stock" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $producto->stock ?>" required>
            </div>
        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>

<script>

    const selectEspecialidad = document.getElementById('select-categoria');
    const distribuidorId = "<?= $producto->categoria->id ?>";
    selectEspecialidad.value = distribuidorId;
    selectEspecialidad.style.color = 'green';
    
</script>
