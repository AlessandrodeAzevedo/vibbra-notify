<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebPushesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebPushesTable Test Case
 */
class WebPushesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WebPushesTable
     */
    protected $WebPushes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.WebPushes',
        'app.Apps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WebPushes') ? [] : ['className' => WebPushesTable::class];
        $this->WebPushes = $this->getTableLocator()->get('WebPushes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->WebPushes);

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
