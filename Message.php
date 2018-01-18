<?php

namespace borodulin\camunda;


use yii\helpers\Json;

class Message extends Module
{
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