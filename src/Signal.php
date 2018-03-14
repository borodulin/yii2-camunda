<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use borodulin\camunda\dto\SignalBody;

/**
 * Class Signal
 * @package borodulin\camunda
 */
class Signal extends Module
{
    /**
     * @param SignalBody $body
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function event(SignalBody $body)
    {
        return $this->getApi()
            ->postJson($body)
            ->execute('signal');
    }

    /**
     * @param $name
     * @param null $executionId
     * @param null $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function trigger($name, $executionId = null, $variables = null)
    {
        $body = ['name' => $name];
        if ($executionId) {
            $body['executionId'] = $executionId;
        }
        if ($variables) {
            $body['variables'] = self::translateVariables($variables);
        }
        return $this->getApi()
            ->postJson($body)
            ->execute('signal');
    }
}