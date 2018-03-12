<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use borodulin\camunda\dto\AuthorizationCheckQuery;
use borodulin\camunda\dto\AuthorizationCreateBody;
use borodulin\camunda\dto\AuthorizationQuery;
use borodulin\camunda\dto\AuthorizationUpdateBody;
use yii\helpers\ArrayHelper;

/**
 * Class Authorization
 * @package borodulin\camunda
 */
class Authorization extends Module
{

    /**
     * Query for a list of authorizations using a list of parameters. The size of the result set can be retrieved by
     * using the get authorization count method.
     * @param array|AuthorizationQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList($query = null)
    {
        return $this->getApi()
            ->execute('authorization', $query);
    }

    /**
     * Query for authorizations using a list of parameters and retrieve the count.
     * @param null $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCount($query = null)
    {
        $result = $this->getApi()
            ->execute("authorization/count", $query);
        return ArrayHelper::getValue($result, 'count');
    }


    /**
     * Retrieves a single authorization by Id.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function get($id)
    {
        return $this->getApi()
            ->execute("authorization/{$id}");
    }

    /**
     * Performs an authorization check for the currently authenticated user.
     * @param AuthorizationCheckQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function check(AuthorizationCheckQuery $query)
    {
        return $this->getApi()
            ->execute('authorization/check', $query);
    }

    /**
     * The /authorization resource supports two custom OPTIONS requests, one for the resource as such and one for
     * individual authorization instances. The OPTIONS request allows you to check for the set of available operations
     * that the currently authenticated user can perform on the /authorization resource. Whether the user can
     * perform an operation or not may depend on various factors, including the users authorizations to interact
     * with this resource and the internal configuration of the process engine.
     * @param null $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function options($id = null)
    {
        return $this->getApi()
            ->methodOptions()
            ->execute($id ? "authorization/{$id}" : "authorization");
    }

    /**
     * Creates a new authorization
     * @param AuthorizationCreateBody $body
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function create(AuthorizationCreateBody $body)
    {
        return $this->getApi()
            ->postJson($body)
            ->execute('authorization/create');
    }

    /**
     * Updates a single authorization.
     * @param $id
     * @param AuthorizationUpdateBody $body
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function update($id, AuthorizationUpdateBody $body)
    {
        return $this->getApi()
            ->postJson($body)
            ->methodPut()
            ->execute("authorization/{$id}");
    }

    /**
     * Deletes an authorization by id.
     * @param $id
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function delete($id)
    {
        $this->getApi()
            ->methodDelete()
            ->execute("authorization/{$id}");
    }
}