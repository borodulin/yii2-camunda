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
     * @param Deployment $deployment
     * @param ProcessDefinition $definition
     * @param AcceptanceTester $I
     * @throws \borodulin\camunda\Exception
     */
    public function sendMessage(Deployment $deployment, ProcessDefinition $definition, AcceptanceTester $I)
    {
        $result = $deployment->create('demo2', YII_APP_BASE_PATH . '/demo/demo2.bpmn');
        $I->assertArrayHasKey('id', $result);
        $definition->startInstanceById($result['id'], []);

        $result = $definition->getListCount();
        var_dump($result);
    }

}
