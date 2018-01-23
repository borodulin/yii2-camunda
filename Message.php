<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use yii\helpers\Json;

class Message extends Module
{
    /**
     * @param $name
     * @param $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function messageAll($name, $variables)
    {
        return $this->getApi()->postJson(Json::encode([
            'messageName' => $name,
            'processVariables' => $this->translateVariables($variables),
            'all' => true,
        ]))->execute('message');
    }

    /**
     * @param $name
     * @param $businessKey
     * @param $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function messageOne($name, $businessKey, $variables)
    {
        return $this->getApi()->postJson(Json::encode([
            'messageName' => $name,
            'businessKey' => $businessKey,
            'processVariables' => $this->translateVariables($variables)
        ]))->execute('message');
    }
}