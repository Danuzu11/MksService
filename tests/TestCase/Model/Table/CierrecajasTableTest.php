<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CierrecajasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CierrecajasTable Test Case
 */
class CierrecajasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CierrecajasTable
     */
    protected $Cierrecajas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cierrecajas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cierrecajas') ? [] : ['className' => CierrecajasTable::class];
        $this->Cierrecajas = $this->getTableLocator()->get('Cierrecajas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cierrecajas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CierrecajasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
