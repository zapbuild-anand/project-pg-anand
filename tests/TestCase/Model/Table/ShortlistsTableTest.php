<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortlistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortlistsTable Test Case
 */
class ShortlistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortlistsTable
     */
    protected $Shortlists;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shortlists',
        'app.Users',
        'app.Pgs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Shortlists') ? [] : ['className' => ShortlistsTable::class];
        $this->Shortlists = TableRegistry::getTableLocator()->get('Shortlists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Shortlists);

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
