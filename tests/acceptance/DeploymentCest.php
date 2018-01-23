<?php
/**
 *
 */
use borodulin\camunda\Deployment;
use borodulin\camunda\Exception;

/**
 * Class DeploymentCest
 */
class DeploymentCest
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
     * @throws Exception
     */
    public function getDeployments(Deployment $deployment, AcceptanceTester $I)
    {
        $result = $deployment->getDeployments();
        $I->assertTrue(is_array($result));
    }


    /**
     * @param Deployment $deployment
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function clear(Deployment $deployment)
    {
        foreach ($deployment->getDeployments() as $item) {
            $deployment->deleteDeployment($item['id']);
        }
    }

    /**
     * @param Deployment $deployment
     * @throws Exception
     */
    public function deployCreate(Deployment $deployment, AcceptanceTester $I)
    {
        $result = $deployment->create('demo1', YII_APP_BASE_PATH . '/demo/demo1.bpmn');

        $I->assertArrayHasKey('id', $result);
    }

    /**
     * @param Deployment $deployment
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function getDeploymentsCount(Deployment $deployment, AcceptanceTester $I)
    {
        $result = $deployment->getDeploymentsCount();
        $I->assertTrue($result == 1);
    }
}
