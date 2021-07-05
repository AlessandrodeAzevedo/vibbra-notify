<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificationOptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificationOptionsTable Test Case
 */
class NotificationOptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificationOptionsTable
     */
    protected $NotificationOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NotificationOptions',
        'app.Notifications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NotificationOptions') ? [] : ['className' => NotificationOptionsTable::class];
        $this->NotificationOptions = $this->getTableLocator()->get('NotificationOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NotificationOptions);

        parent::tearDown();
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
