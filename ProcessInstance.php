<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use yii\helpers\ArrayHelper;

/**
 * Class ProcessInstance
 * @package borodulin\camunda
 */
class ProcessInstance extends Module
{
    /**
     * Delete
     * DELETE /process-instance/{id}
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function delete($id)
    {
        return $this->getApi()
            ->methodDelete()
            ->execute("process-instance/$id");
    }

    /**
     * Get Activity Instance
     * GET /process-instance/{id}/activity-instances
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getActivity($id)
    {
        return $this->getApi()
            ->execute("process-instance/$id/activity-instances");
    }


    /**
     * Get List Count
     * GET /process-instance/count
     * @param array $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCount($params = [])
    {
        $result = $this->getApi()
            ->execute("process-instance/count", $params);
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * Get List
     * GET /process-instance
     * @param array $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList($params = [])
    {
        return $this->getApi()
            ->execute("process-instance", $params);
    }

    /**
     * Get
     * GET /process-instance/{id}
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getInstance($id)
    {
        return $this->getApi()
            ->execute("process-instance/$id");
    }

    /**
     * Modify
     * POST /process-instance/{id}/modification
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function modify($id)
    {
        return $this->getApi()
            ->setPostData()
            ->execute("process-instance/$id/modification");
    }

    /**
     * Get List Count (POST)
     * POST /process-instance/count
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCountFiltered()
    {
        return $this->getApi()
            ->setPostData()
            ->execute("process-instance/count");
    }

    /**
     * Get List (POST)
     * POST /process-instance
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListFiltered()
    {
        return $this->getApi()
            ->setPostData()
            ->execute("process-instance");
    }

    /**
     * Activate/Suspend By Id
     * PUT /process-instance/{id}/suspended
     * @param $id
     * @param $suspended
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function suspendedById($id, $suspended)
    {
        return $this->getApi()
            ->postJson(['suspended' => $suspended ? 'true' : 'false'])
            ->methodPut()
            ->execute("process-instance/$id/suspended");
    }

    // Activate/Suspend By Process Definition Id
    // PUT /process-instance/suspended
    // Activate/Suspend By Process Definition Key
    // PUT /process-instance/suspended

    /**
     * Get Process Variables
     * GET /process-instance/{id}/variables
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getVriables($id)
    {
        return $this->getApi()
            ->execute("process-instance/$id/variables");
    }

    /**
     * Put Single Process Variable
     * PUT /process-instance/{id}/variables/{varId}
     * @param $id
     * @param $varId
     * @param $value
     * @param null $type
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function putVariable($id, $varId, $value, $type = null)
    {
        $type = is_null($type) ? gettype($value) : $type;
        return $this->getApi()
            ->postJson([
                'value' => $value,
                'type' => $type,
            ])
            ->methodPut()
            ->execute("process-instance/$id/variables/$varId");
    }
}