<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use borodulin\camunda\dto\VariableInstanceQuery;
use yii\helpers\ArrayHelper;

/**
 * Class VariableInstance
 * @package borodulin\camunda
 */
class VariableInstance extends Module
{

    /**
     * Retrieves the content of a single variable by id. Applicable for byte array and file variables.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getBinary($id)
    {
        return $this->getApi()
            ->execute("variable-instance/{$id}/data");
    }

    /**
     * Query for the number of variable instances that fulfill given parameters. Takes the same parameters as the
     * get variable instances method.
     * @param array|VariableInstanceQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCount($query = null)
    {
        $result = $this->getApi()
            ->execute("variable-instance/count", $query);
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * Query for variable instances that fulfill given parameters. Parameters may be the properties of variable
     * instances, such as the name or type. The size of the result set can be retrieved by using the get variable
     * instances count method.
     * @param array|VariableInstanceQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList($query = null)
    {
        return $this->getApi()
            ->execute('variable-instance', $query);
    }

    /**
     * Retrieves a single variable by id.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function get($id)
    {
        return $this->getApi()
            ->execute("variable-instance/{$id}");
    }

    /**
     * Query for variable instances that fulfill given parameters through a JSON object. This method is slightly more
     * powerful than the GET query because it allows filtering by multiple variable instances
     * of types String, Number or Boolean.
     * @param null $query
     * @param int $firstResult
     * @param int $maxResults
     * @param bool $deserializeValues
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListPost($query = null, $firstResult = 0, $maxResults =20, $deserializeValues = false)
    {
        return $this->getApi()
            ->postJson($query)
            ->execute('variable-instance', [
                'firstResult' => $firstResult,
                'maxResults' => $maxResults,
                'deserializeValues' => $deserializeValues,
            ]);
    }

    /**
     * Query for the number of variable instances that fulfill given parameters. This method takes the same message
     * body as the POST query and therefore it is slightly more powerful than the GET query count.
     * @param array $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCountPost($query = null)
    {
        $result = $this->getApi()
            ->postJson($query)
            ->execute('variable-instance/count');
        return ArrayHelper::getValue($result, 'count');
    }
}