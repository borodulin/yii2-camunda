<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use yii\base\UserException;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class Exception
 * @package borodulin\camunda
 */
class Exception extends UserException
{
    public function __construct($message)
    {
        if (is_array($message)) {
            $message = ArrayHelper::getValue($message, 'message', VarDumper::dumpAsString($message));
        }
        parent::__construct($message);
    }

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Camunda api exception';
    }
}
