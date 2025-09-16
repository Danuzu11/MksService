<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$fechaFormateada = $pedido->fecha_pedido->format('Y-m-d');
?>

<?= $this->Html->css('styleforms.css') ?>

<div class="bodyController">

    <div class="text-center ml-6 mb-3 mt-10">
        <h1>Editar Pedido</h1>
    </div>

    <div class="empleado-perfil">
    <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">


        <?= $this->Form->create($pedido) ?>

        <fieldset class="mb-3">
            <legend>
                <?= __('Editar Pedido') ?>
            </legend>

            <div class="form-group">
                <label><?= __('Cliente') ?></label>
                <select style="color: green;" id="select-cliente"  name="id_cliente" class="form-control2 rounded shadow-sm select-status" required>
                    <option value="">Escoge un tipo de cliente</option>
                    <?php foreach ($clientes as $key => $cliente): ?>
                        <option style="color: green;" value="<?php echo $cliente->id; ?>">
                            <?php echo $cliente->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <?= __('Fecha del pedido') ?>
                </label>
                <input type="date" class="ml-20 bg-slate-500 rounded shadow-sm" name="fecha_pedido" value="<?= $fechaFormateada ?>" required>
            </div>

            <div class="form-group">
                <label><?= __('Tipo de pago') ?></label>
                <select style="color: green;" id="select-pago"  name="tipoPago" class="form-control2 rounded shadow-sm select-status" required>
                    <option value="">Escoge un tipo de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Punto">Punto</option>
                    <option value="Divisas">Divisas</option>
                </select>
            </div>


            <div class="form-group">
                <label>
                    <?= __('Precio') ?>
                </label>
                <input type="text" class="form-control rounded shadow-sm" name="precio_total" name="precio" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un numero decimal con punto (por ejemplo, 4.5)"
                    value="<?= $pedido->precio_total ?>" required>
            </div>

        </fieldset>

        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-submit rounded shadow-sm']) ?>
        <?= $this->Form->end() ?>

    </div>

</div>

<script>
    
    const selectCliente = document.getElementById('select-cliente');
    const clienteId = "<?= $pedido->id_cliente ?>";
    selectCliente.value = clienteId;
    selectCliente.style.color = 'green';

    const selectPago = document.getElementById('select-pago');
    const pago = "<?= $pedido->tipoPago ?>";
    selectPago.value = pago;
    selectPago.style.color = 'green';

</script>

