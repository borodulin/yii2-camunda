<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use JsonSerializable;
use Yii;
use yii\base\BaseObject;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\helpers\Json;

/**
 * @property CamundaApi $api
 *
 * Class Module
 * @package borodulin\camunda
 */
abstract class Module extends BaseObject
{
    /**
     * @var CamundaApi
     */
    private $_api;

    /**
     * @return CamundaApi
     * @throws InvalidConfigException
     */
    public function getApi()
    {
        if ($this->_api === null) {
            /** @var CamundaApi $api */
            if ($api = Yii::$app->get('camunda', false)) {
                if (!$api instanceof CamundaApi) {
                    throw new InvalidConfigException('Camunda should be an instance of the CamundaApi');
                }
                $this->_api = $api;
            } else {
                $this->_api = Yii::createObject(CamundaApi::class);
            }
        }
        return $this->_api;
    }

    /**
     * @param $variables
     * @return array|null
     */
    public static function translateVariables($variables)
    {
        $result = [];
        foreach ((array)$variables as $key => $value) {
            if ($value instanceof JsonSerializable) {
                $result[$key] = ['value' => Json::encode($value), 'type' => 'Json'];
            } elseif (is_array($value)) {
                if (isset($value['value'], $value['type'])) {
                    $result[$key] = $value;
                } else {
                    $result[$key] = ['value' => Json::encode($value), 'type' => 'Json'];
                }
            } elseif (is_scalar($value)) {
                $result[$key] = ['value' => $value, 'type' => ucfirst(gettype($value))];
            } else {
                throw new InvalidArgumentException('Type of value: "' . gettype($value) . '" is not supported.');
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
                throw new InvalidArgumentException('Execution date is invalid');
            }
            $date = date('c', $date);
        }
        return $date;
    }

    /**
     * @param $value
     * @throws InvalidConfigException
     */
    public function setApi($value)
    {
        if (is_string($value)) {
            $this->_api = Yii::createObject(CamundaApi::class, [
                'apiUrl' => $value
            ]);
        } elseif (is_array($value)) {
            if (!isset($value['class'])) {
                $value['class'] = CamundaApi::class;
            }
            $this->_api = Yii::createObject($value);
        } elseif ($value instanceof CamundaApi) {
            $this->_api = $value;
        } else {
            throw new InvalidArgumentException('Api is invalid');
        }
    }
}
