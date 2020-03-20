<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeedbacksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeedbacksTable Test Case
 */
class FeedbacksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeedbacksTable
     */
    protected $Feedbacks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Feedbacks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Feedbacks') ? [] : ['className' => FeedbacksTable::class];
        $this->Feedbacks = TableRegistry::getTableLocator()->get('Feedbacks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Feedbacks);

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
}
