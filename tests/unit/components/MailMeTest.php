<?php
namespace components;


class MailMeTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $this->assertTrue(\Yii::$app->mailme->test(), "its not true");
    }
}