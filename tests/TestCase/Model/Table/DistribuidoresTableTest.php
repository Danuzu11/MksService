<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistribuidoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistribuidoresTable Test Case
 */
class DistribuidoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistribuidoresTable
     */
    protected $Distribuidores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Distribuidores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Distribuidores') ? [] : ['className' => DistribuidoresTable::class];
        $this->Distribuidores = $this->getTableLocator()->get('Distribuidores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Distribuidores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DistribuidoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
