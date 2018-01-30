<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

use JsonSerializable;
use yii\base\BaseObject;

/**
 * Class BaseDto
 * @package borodulin\camunda\dto
 */
class BaseDto extends BaseObject implements JsonSerializable
{

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $array = (array)$this;
        return array_filter($array, function ($value) {
            return $value !== null;
        });
    }
}