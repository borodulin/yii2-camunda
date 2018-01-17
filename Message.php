<?php

namespace common\components\camunda;


use yii\helpers\Json;

class Message
{
    /**
     * @var CamundaApi
     */
    private $api;

    public function __construct(CamundaApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param $name
     * @param $variables
     * @return mixed
     * @throws Exception
     */
    public function messageAll($name, $variables)
    {
        return $this->api->postJson(Json::encode([
            'messageName' => $name,
            'processVariables' => $this->api->translateVariables($variables),
            'all' => true,
        ]))->execute('message');
    }

    /**
     * @param $name
     * @param $businessKey
     * @param $variables
     * @return mixed
     * @throws Exception
     */
    public function messageOne($name, $businessKey, $variables)
    {
        return $this->api->postJson(Json::encode([
            'messageName' => $name,
            'businessKey' => $businessKey,
            'processVariables' => $this->api->translateVariables($variables)
        ]))->execute('message');
    }
}