<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use borodulin\camunda\dto\ExecutionQuery;
use yii\helpers\ArrayHelper;

/**
 * Class Execution
 * @package borodulin\camunda
 */
class Execution extends Module
{
    /**
     * Query for the executions that fulfill given parameters. Parameters may be static as well as dynamic runtime
     * properties of executions. The size of the result set can be retrieved by using the get executions count method.
     * @param array|ExecutionQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList($query = null)
    {
        return $this->getApi()
            ->execute('execution', $query);
    }

    /**
     * Query for the number of executions that fulfill given parameters.
     * Takes the same parameters as the get executions method.
     * @param array|ExecutionQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCount($query = null)
    {
        return $this->getApi()
            ->execute('execution/count', $query);
    }

    /**
     * Retrieves a single execution according to the Execution interface in the engine.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function get($id)
    {
        return $this->getApi()
            ->execute("execution/{$id}");
    }

    /**
     * Query for executions that fulfill given parameters through a json object. This method is slightly more powerful
     * than the GET query because it allows to filter by multiple instance and execution variables of types String,
     * Number or Boolean.
     * @param null $query
     * @param int $firstResult
     * @param int $maxResults
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListPost($query = null, $firstResult = 0, $maxResults = 20)
    {
        return $this->getApi()
            ->postJson($query)
            ->execute('execution', [
                'firstResult' => $firstResult,
                'maxResults' => $maxResults,
            ]);
    }

    /**
     * Query for the number of executions that fulfill given parameters. This method takes the same message body as
     * the POST query and therefore it is slightly more powerful than the GET query count api.
     * @param $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCountPost($query)
    {
        $result = $this->getApi()
            ->postJson($query)
            ->execute('execution/count');
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * Signals a single execution.
     * Can for example be used to explicitly skip user tasks or signal asynchronous continuations.
     * @param string $id The id of the execution to signal.
     * @param $variables
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function trigger($id, $variables)
    {
        $this->getApi()
            ->postJson([
                'variables' => self::translateVariables($variables)
            ])
            ->execute("execution/{$id}/signal");
    }
}
