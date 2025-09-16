<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>

<div class="bienvenida-conteo">

    <div class="space-between">
        <div class="bienvenida-Usuario bg-slate-950 rounded-3xl mx-4 my-8 shadow-md ">
            <h1 style="font-weight: 600;"> Hola! </h1>
        </div>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

       
    </div>    

    <div class="space-between">
        <div class="bienvenida-Admin bg-slate-950 rounded-3xl mx-4 my-8 shadow-md flex">
            <div>
                <h1 style="font-weight: 600;"> Bienvenido! </h1>
                <p class="mt-5 text-justify mr-20">
                    ¡Bienvenido a app de gestion!
                    Ingresa tu rol y tu contraseña y disfruta de nuestro servicio
                </p>
            </div>

            <div class="logoBienvenida ">
                <img class="fix-img"
                    src="<?= $this->Url->build('/', ['fullBase' => true]) . 'img/image/tipoCarne.webp' ?>" alt="Imagen">
            </div>
        </div>
    </div>

</div>

<style>
    /* estilos de las letras */
    ul {
        color: white;
    }

    h1 {
        font-size: 24px;
        color: white;
    }

    p {
        font-size: 12px;
        color: #959ea9;
        font-weight: bold;
        
    }

    h2 {
        font-size: 24px;
        color: white;
        font-weight: bold;
    }

    /* finde */

    /* estilos de las logos */
    .logoBienvenida img {
        width: 100%;
        height: 100%;
        max-width: 213px;
    }

    .logoBienvenida {
        display: flex;
        align-items: center;
        float: left;
    }

    /* finde */


    /* estilos de los divs de bienvenida */
    .fix-img{
        min-width: 160px;
        min-height: 160px;
        border-radius: 1.5rem;

    }

    .fix-img:hover {filter: saturate(180%);}

    .bienvenida-Usuario {
        width: 100%;
        justify-content: space-between;
        padding: 30px;
    }

    .bienvenida-Admin {
        width: 100%;
        justify-content: space-between;
        padding: 30px;
    }

    .conteo-Admin {
        width: 100%;
        justify-content: space-between;
        padding: 30px;
    }
    .space-between{
        margin: 30px;        
    }
    .bienvenida-conteo{
        width: 100%;
    }
    

    /* finde */
</style>