<?php

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
        $count = $task->getListCount([
            'processInstanceBusinessKey' => '123',
        ]);
        $I->assertEquals(1, $count);
        $result = $task->getList([
            'processInstanceBusinessKey' => '123',
        ]);
        $task->complete($result[0]['id']);
        $count = $task->getListCount([
            'processInstanceBusinessKey' => '123',
        ]);
        $I->assertEquals(0, $count);

//        $query = new TaskQuery();
//        $query->processDefinitionId = 'qwe';
//        $query = $query->jsonSerialize();
//        var_dump($query);
    }
}