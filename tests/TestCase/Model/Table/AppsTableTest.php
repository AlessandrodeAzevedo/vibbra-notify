<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppsTable Test Case
 */
class AppsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AppsTable
     */
    protected $Apps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Apps',
        'app.Users',
        'app.Emails',
        'app.Smss',
        'app.WebPushes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Apps') ? [] : ['className' => AppsTable::class];
        $this->Apps = $this->getTableLocator()->get('Apps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Apps);

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
