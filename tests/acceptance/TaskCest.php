<?php

use borodulin\camunda\dto\TaskQuery;
use borodulin\camunda\ProcessInstance;
use borodulin\camunda\Task;

/**
 * Class TaskCest
 */
class TaskCest extends ApiCest
{
    /**
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function complete(ProcessInstance $instance, Task $task, AcceptanceTester $I)
    {
        $this->start('demo3', '123');
        $I->assertEquals(1, $instance->getListCount());
        $count = $task->getListCount(new TaskQuery([
            'processInstanceBusinessKey' => '123'
        ]));
        $I->assertEquals(1, $count);
        $result = $task->getList([
            'processInstanceBusinessKey' => '123',
        ]);
        $task->complete($result[0]['id']);
        $count = $task->getListCount([
            'processInstanceBusinessKey' => '123',
        ]);
        $I->assertEquals(0, $count);
    }

    /**
     * @param ProcessInstance $instance
     * @param Task $task
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function submitForm(ProcessInstance $instance, Task $task, AcceptanceTester $I)
    {
        $this->start('demo5', '123');
        $I->assertEquals(1, $instance->getListCount());
        $result = $task->getList([
            'processInstanceBusinessKey' => '123',
        ]);
        $taskId = $result[0]['id'];
        $result = $task->getFormVariables($taskId);

        $I->assertArraySubset([
            'field1' => [
                'type' => 'String',
                'value' => null
            ],
            'field2' => [
                'type' => 'Long',
                'value' => 0,
            ]
        ], $result);

        $I->expectException('borodulin\camunda\Exception', function () use ($task, $taskId) {
            $task->submitForm($taskId, [
                'field2' => 10,
            ]);
        });

        $task->submitForm($taskId, [
            'field1' => 'testValue',
        ]);

        $I->assertEquals(0, $instance->getListCount());
    }
}