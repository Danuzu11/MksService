<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Importe $importe
 */
?>

<?= $this->Html->css('perfilStyle.css') ?>

<div class="card-view-user ">
    <div class="data-inside text-center content-center">



        <h1>
            Importe
        </h1>

        <img class="imagePerfil rounded-md h-auto rounded-full"
            src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/carne.jpg' ?>" alt="ImagenPerfil">
            
        <h3>
            <?= h($importe->id) ?>
        </h3>

        <h1>________________________________________</h1>
        <div class="user-wrapper">

            <div class="user-item nombre-user">
                <label>Distribuidor designado</label>
                <span>
                    <?= $importe->distribuidore->nombre ?>
                </span>
            </div>

            <div class="user-item nombre-user">
                <label>Precio</label>
                <span>
                    <?= $importe->precio ?>
                </span>
            </div>
            <div class="user-item status">
                <label>Fecha</label>
                <span>
                    <?= h($importe->fecha->format('d-m-Y')) ?>
                </span>
            </div>

            <div class="user-item status">
                <label>Productos</label>
                <span>
                    <?php if ($importe->productos != null) { ?>
                        <?php $productosImportados = json_decode($importe->productos) ?>
                        <select style="color: green;" id="select-categoria" name="id_distribuidor"
                            class="form-control2 rounded shadow-sm select-status" required>
                            <?php foreach ($productosImportados as $key => $productoImportado): ?>
                                <option style="color: green;" value="<?php echo $productoImportado ?>">
                                    <?php echo $productoImportado ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php } else { ?>
                        <?= "[No hay productos]" ?>
                    <?php } ?>

                </span>
            </div>

        </div>

        <h1>________________________________________</h1>

    </div>
</div>