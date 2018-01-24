<?php

use borodulin\camunda\ProcessInstance;

/**
 * Class ProcessInstanceCest
 */
class ProcessInstanceCest extends ApiCest
{
    /**
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function deleteProcess(ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->start('demo1', '123');
        $I->assertEquals(1, $instance->getListCount());
        sleep(1);
        foreach ($instance->getList() as $item) {
            $instance->delete($item['id']);
        }
        $I->assertEquals(0, $instance->getListCount());
    }

    /**
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function variables(ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->start('demo3', '123');
        $I->assertEquals(1, $instance->getListCount());
        foreach ($instance->getList() as $item) {
            $result = $instance->getVariables($item['id']);
            $I->assertArraySubset([
                'foo' =>[
                    'type' => 'String',
                    'value' => 'bar',
                ]
            ], $result);
        }
    }



}
