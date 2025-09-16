<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImportesFixture
 */
class ImportesFixture extends TestFixture
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
                'id_distribuidor' => 1,
                'fecha' => 1712777053,
                'precio' => 1.5,
                'productos' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
