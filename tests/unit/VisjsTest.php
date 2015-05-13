<?php

namespace yii2visjs\tests\unit;

use \yii2visjs\yii2visjs;

/**
 * This is MasonryTest unit test.
 *
 * @see       yii2masonry\yii2masonry
 * @license   https://github.com/philippfrenzel/yii2masonry/blob/master/LICENSE.md MIT
 *
 * @author    Philipp Frenzel <philipp@frenzel.net>
 */

class VisjsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \yii2masonry\yii2masonry
     */
    protected $instance;

    /**
     * @inheritdoc
     */
    protected function _before()
    {
        $this->instance = new yii2visjs();
    }

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        $this->instance = null;
    }

    // tests
    public function testMe()
    {

    }

}