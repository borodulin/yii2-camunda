<?php


use borodulin\camunda\ProcessDefinition;

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
}
