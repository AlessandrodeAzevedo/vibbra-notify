<?php
declare(strict_types=1);

namespace MdBootstrap\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MdBootstrap\View\Helper\FormHelper;

/**
 * MdBootstrap\View\Helper\FormHelper Test Case
 */
class FormHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MdBootstrap\View\Helper\FormHelper
     */
    protected $FormHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->FormHelper = new FormHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FormHelper);

        parent::tearDown();
    }
}
