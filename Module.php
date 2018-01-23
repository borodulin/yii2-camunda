<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use Yii;
use yii\base\InvalidConfigException;


/**
 * Class Module
 * @package borodulin\camunda
 */
abstract class Module
{
    /**
     * @return CamundaApi
     * @throws InvalidConfigException
     */
    protected function getApi()
    {
        /** @var CamundaApi $api */
        if ($api = Yii::$app->get('camunda', false)) {
            if (!$api instanceof CamundaApi) {
                throw new InvalidConfigException('Camunda should be an instance of the CamundaApi');
            }
        } else {
            $api = Yii::createObject(CamundaApi::className());
        }
        return $api;
    }

    public function translateVariables($variables)
    {
        $result = [];
        foreach ($variables as $key => $value) {
            $result[$key] = ['value' => $value, 'type' => gettype($value)];
        }
        if (empty($result)) {
            return null;
        }
        return $result;
    }
}