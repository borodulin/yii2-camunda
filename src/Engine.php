<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

/**
 * Class Engine
 * @package borodulin\camunda
 */
class Engine extends Module
{
    /**
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList()
    {
        return $this->getApi()
            ->execute('engine');
    }
}