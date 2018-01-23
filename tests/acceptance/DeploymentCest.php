<?php
/**
 *
 */
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
        $I->assertTrue($result == 1);
    }
}
