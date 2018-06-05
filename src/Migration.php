<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

/**
 * Class Migration
 * @package borodulin\camunda
 */
class Migration extends Module
{

    /**
     * Generate a migration plan for two process definitions.
     * The generated migration plan contains migration instructions which map equal activities
     * between the two process definitions.
     * @param $sourceProcessDefinitionId
     * @param $targetProcessDefinitionId
     * @param bool $updateEventTriggers
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function generate($sourceProcessDefinitionId, $targetProcessDefinitionId, $updateEventTriggers = true)
    {
        return $this->getApi()->postJson([
            'sourceProcessDefinitionId' => $sourceProcessDefinitionId,
            'targetProcessDefinitionId' => $targetProcessDefinitionId,
            'updateEventTriggers' => $updateEventTriggers
        ])
            ->execute('migration/generate');
    }

    /**
     * Validates a migration plan statically without executing it.
     * This corresponds to the creation time validation described in the user guide.
     * @param $sourceProcessDefinitionId
     * @param $targetProcessDefinitionId
     * @param $instructions
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function validate($sourceProcessDefinitionId, $targetProcessDefinitionId, $instructions)
    {
        return $this->getApi()->postJson([
            'sourceProcessDefinitionId' => $sourceProcessDefinitionId,
            'targetProcessDefinitionId' => $targetProcessDefinitionId,
            'instructions' => $instructions
        ])
            ->execute('migration/validate');
    }

    /**
     * Execute a migration plan synchronously for multiple process instances.
     * @param $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function execute($params)
    {
        return $this->getApi()
            ->postJson($params)
            ->execute('migration/execute');
    }

    /**
     * Execute a migration plan asynchronously (batch) for multiple process instances
     * @param $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function executeAsync($params)
    {
        return $this->getApi()
            ->postJson($params)
            ->execute('migration/executeAsync');
    }
}
