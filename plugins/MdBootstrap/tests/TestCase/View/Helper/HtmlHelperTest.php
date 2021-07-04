<?php
declare(strict_types=1);

namespace MdBootstrap\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MdBootstrap\View\Helper\HtmlHelper;

/**
 * MdBootstrap\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MdBootstrap\View\Helper\HtmlHelper
     */
    protected $HtmlHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->HtmlHelper = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HtmlHelper);

        parent::tearDown();
    }
}
