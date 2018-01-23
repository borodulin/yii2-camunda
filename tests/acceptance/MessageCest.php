<?php


use borodulin\camunda\Message;
use borodulin\camunda\ProcessInstance;

class MessageCest extends ApiCest
{
    /**
     * @param Message $message
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function sendMessage(Message $message, ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->start('demo2', '123');

        $count = $instance->getListCount();

        $I->assertEquals(1, $count);
    }

}
