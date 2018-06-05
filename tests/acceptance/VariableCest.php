<?php

use borodulin\camunda\ProcessInstance;
use borodulin\camunda\VariableInstance;

/**
 * Class TaskCest
 */
class VariableCest extends ApiCest
{
    /**
     * @param ProcessInstance $instance
     * @param VariableInstance $variableInstance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function translateJson(ProcessInstance $instance, VariableInstance $variableInstance, AcceptanceTester $I)
    {
        $this->start('demo1', '123', [
            'json' => ['test1' => '1']
        ]);
        $I->assertEquals(1, $instance->getListCount());
        $I->assertEquals(1, $variableInstance->getListCount());
        $result = $variableInstance->getListPost(['variableName' => 'json']);
        $I->assertCount(1, $result);
        $I->assertEquals($result[0]['name'], 'json');
        $I->assertEquals($result[0]['type'], 'Json');
    }
}
