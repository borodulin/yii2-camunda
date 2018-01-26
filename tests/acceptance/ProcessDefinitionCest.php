<?php

use borodulin\camunda\ProcessDefinition;
use borodulin\camunda\ProcessInstance;

/**
 * Class ProcessDefinitionCest
 */
class ProcessDefinitionCest extends ApiCest
{
    /**
     * @param ProcessDefinition $definition
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function listCount(ProcessDefinition $definition, AcceptanceTester $I)
    {
        $I->assertEquals(0, $definition->getListCount());
        $this->deploy('demo1');
        $I->assertEquals(1, $definition->getListCount());
    }

    /**
     * @param ProcessDefinition $definition
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDefinitionByKey(ProcessDefinition $definition, AcceptanceTester $I)
    {
        $I->expectException('borodulin\camunda\Exception', function () use ($definition) {
            $definition->getDefinitionByKey('demo1');
        });
        $this->deploy('demo1');
        $result = $definition->getDefinitionByKey('demo1');
        $I->assertArraySubset(['key' => 'demo1'], $result);
    }

    /**
     * @param ProcessDefinition $definition
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function suspendByKey(ProcessDefinition $definition, AcceptanceTester $I)
    {
        $this->start('demo2', '123');
        $definition->suspendedByKey('demo2', true);
        $result = $definition->getList();
        $I->assertEquals(true, $result[0]['suspended']);
        $definition->suspendedByKey('demo2', false);
        $result = $definition->getList();
        $I->assertEquals(false, $result[0]['suspended']);
    }

    /**
     * @param ProcessDefinition $definition
     * @param ProcessInstance $instance
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function submitStartForm(ProcessDefinition $definition, ProcessInstance $instance, AcceptanceTester $I)
    {
        $this->deploy('demo6');
        $I->expectException('borodulin\camunda\Exception', function () use ($definition){
            $definition->submitStartFormByKey('demo6', [
                'bk11' => 'qwe'
            ]);
        });

        $definition->submitStartFormByKey('demo6', [
            'bk' => 'qwe'
        ]);

        $I->assertEquals(1, $instance->getListCount());
    }
}
