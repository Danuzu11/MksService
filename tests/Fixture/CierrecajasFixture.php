<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CierrecajasFixture
 */
class CierrecajasFixture extends TestFixture
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
                'fecha_cierre' => 1712776995,
                'total_efectivo' => 1.5,
                'total_tarjeta' => 1.5,
                'total_divisas' => 1.5,
            ],
        ];
        parent::init();
    }
}
