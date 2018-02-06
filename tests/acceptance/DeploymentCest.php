<?php

use borodulin\camunda\Deployment;
use borodulin\camunda\Exception;

/**
 * Class DeploymentCest
 */
class DeploymentCest extends ApiCest
{
    /**
     * @param Deployment $deployment
     * @param AcceptanceTester $I
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDeploymentsCount(Deployment $deployment, AcceptanceTester $I)
    {
        $this->deploy('demo1');
        $result = $deployment->getDeploymentsCount();
        $I->assertEquals(1, $result);
    }

    /**
     * @param Deployment $deployment
     * @param AcceptanceTester $I
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function deployBatch(Deployment $deployment, AcceptanceTester $I)
    {
        (new Deployment())
            ->create('batchDeploy', [
                YII_APP_BASE_PATH . "tests/_data/demo1.bpmn",
                YII_APP_BASE_PATH . "tests/_data/demo2.bpmn"
            ]);
        $result = $deployment->getDeploymentsCount();
        $I->assertEquals(1, $result);
    }
}
