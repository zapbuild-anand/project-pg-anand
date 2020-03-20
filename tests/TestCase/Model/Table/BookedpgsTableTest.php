<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookedpgsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookedpgsTable Test Case
 */
class BookedpgsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookedpgsTable
     */
    protected $Bookedpgs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bookedpgs',
        'app.Payments',
        'app.Rents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bookedpgs') ? [] : ['className' => BookedpgsTable::class];
        $this->Bookedpgs = TableRegistry::getTableLocator()->get('Bookedpgs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bookedpgs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
