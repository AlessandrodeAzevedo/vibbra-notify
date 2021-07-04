<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmssTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmssTable Test Case
 */
class SmssTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SmssTable
     */
    protected $Smss;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Smss',
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
        $config = $this->getTableLocator()->exists('Smss') ? [] : ['className' => SmssTable::class];
        $this->Smss = $this->getTableLocator()->get('Smss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Smss);

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
