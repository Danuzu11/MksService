<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosFixture
 */
class PedidosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_cliente' => 1,
                'fecha_pedido' => 1712777064,
                'tipoPago' => 'Lorem ipsum dolor sit amet',
                'precio_total' => 1.5,
            ],
        ];
        parent::init();
    }
}
