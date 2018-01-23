<?php


use borodulin\camunda\Exception;
use borodulin\camunda\Message;
use borodulin\camunda\ProcessInstance;

class MessageCest extends ApiCest
{
    /**
     * @param Message $message
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function sendMessage(Message $message, ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->start('demo2', '123');

        $I->assertEquals(1, $instance->getListCount());

        $I->expectException('borodulin\camunda\Exception', function () use ($message) {
            $message->messageOne('testMessage', '124');
        });

        $message->messageOne('testMessage', '123');

        $I->assertEquals(0, $instance->getListCount());

        $I->expectException('borodulin\camunda\Exception', function () use ($message) {
            $message->messageOne('testMessage', '123');
        });
    }

    /**
     * @param Message $message
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function sendMessages(Message $message, ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->start('demo2', '123');

        $I->assertEquals(1, $instance->getListCount());

        $message->messageAll('testMessage');

        $I->assertEquals(0, $instance->getListCount());

        $message->messageAll('testMessage');
    }

}
