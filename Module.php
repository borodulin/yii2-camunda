<?php
/**
 * Created by PhpStorm.
 * User: borodulin
 * Date: 18.01.18
 * Time: 13:47
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
                throw new InvalidConfigException('Camunda should be instance of CamundaApi');
            }
        } else {
            $this->api = Yii::createObject(CamundaApi::className());
        }
    }

}