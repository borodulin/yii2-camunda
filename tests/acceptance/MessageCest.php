<?php


use borodulin\camunda\Deployment;
use borodulin\camunda\ProcessDefinition;

class MessageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    /**
     * after DeploymentCest::clear
     * @param Deployment $deployment
     * @param ProcessDefinition $definition
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     */
    public function sendMessage(Deployment $deployment, ProcessDefinition $definition, AcceptanceTester $I)
    {
        $result = $deployment->create('demo2', YII_APP_BASE_PATH . '/demo/demo2.bpmn');
        $I->assertArrayHasKey('deployedProcessDefinitions', $result);
        $defs = $result['deployedProcessDefinitions'];
        $I->assertTrue(count($defs) == 1);
        foreach ($defs as $id => $def) {
            $I->assertArrayHasKey('id', $def);
            $definition->startInstanceById($def['id'], [
            'businessKey' => 123,
//            'variables' => $api->translateVariables(['user_id' => 1, 'id' => '982406948'])
            ]);
        }

//        $result = $definition->getListCount();
//        var_dump($result);
    }

}
