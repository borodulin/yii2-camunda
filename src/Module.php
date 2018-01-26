<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;


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

    public static function translateVariables($variables)
    {
        $result = [];
        foreach ((array)$variables as $key => $value) {
            if (is_array($value)) {
                $result[$key] = $value;
            } else {
                $result[$key] = ['value' => $value, 'type' => ucfirst(gettype($value))];
            }
        }
        if (empty($result)) {
            return null;
        }
        return $result;
    }

    /**
     * @param $date
     * @return false|int|string
     */
    protected function formatDate($date)
    {
        if (!is_null($date)) {
            if (!is_numeric($date)) {
                $date = strtotime($date);
            }
            if (!is_numeric($date)) {
                throw new InvalidParamException('Execution date is invalid');
            }
            $date = date('c', $date);
        }
        return $date;
    }
}