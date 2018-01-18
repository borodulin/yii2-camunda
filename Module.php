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
     * @var CamundaApi
     */
    protected $api;

    /**
     * Module constructor.
     * @throws InvalidConfigException
     */
    public function __construct()
    {
        if ($this->api = Yii::$app->get('camunda', false)) {
            if (!$this->api instanceof CamundaApi) {
                throw new InvalidConfigException('Camunda should be an instance of the CamundaApi');
            }
        } else {
            $this->api = Yii::createObject(CamundaApi::className());
        }
    }
}