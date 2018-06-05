<?php

use borodulin\camunda\Deployment;
use borodulin\camunda\ProcessDefinition;

/**
 * Class ApiCest
 */
class ApiCest
{
    /**
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function _before()
    {
        $deployment = new Deployment();
        foreach ($deployment->getDeployments() as $item) {
            $deployment->deleteDeployment($item['id']);
        }
    }

    /**
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function _after()
    {
        $deployment = new Deployment();
        foreach ($deployment->getDeployments() as $item) {
            $deployment->deleteDeployment($item['id']);
        }
    }

    /**
     * @param $name
     * @return array
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    protected function deploy($name)
    {
        return (new Deployment())
            ->create($name, YII_APP_BASE_PATH . "tests/_data/$name.bpmn");
    }

    /**
     * @param $bk
     * @param array $params
     * @return array
     * @throws \borodulin\camunda\Exception
     * @throws \yii\base\InvalidConfigException
     */
    protected function start($name, $bk, $params = [])
    {
        $this->deploy($name);
        $api = new ProcessDefinition();
        $process = $api->startInstanceByKey($name, [
            'businessKey' => $bk,
            'variables' => $api::translateVariables($params)
        ]);
        return $process;
    }
}
