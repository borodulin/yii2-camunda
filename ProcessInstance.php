<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

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
     */
    public function delete($id)
    {
        return $this->api
            ->methodDelete()
            ->execute("process-instance/$id");
    }

    /**
     * Get Activity Instance
     * GET /process-instance/{id}/activity-instances
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getActivity($id)
    {
        return $this->api
            ->execute("process-instance/$id/activity-instances");
    }


    /**
     * Get List Count
     * GET /process-instance/count
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    public function getListCount($params = [])
    {
        return $this->api
            ->execute("process-instance/count", $params);
    }

    /**
     * Get List
     * GET /process-instance
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    public function getList($params = [])
    {
        return $this->api
            ->execute("process-instance", $params);
    }

    /**
     * Get
     * GET /process-instance/{id}
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getInstance($id)
    {
        return $this->api
            ->execute("process-instance/$id");
    }

    /**
     * Modify
     * POST /process-instance/{id}/modification
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function modify($id)
    {
        return $this->api
            ->setPostData()
            ->execute("process-instance/$id/modification");
    }

    /**
     * Get List Count (POST)
     * POST /process-instance/count
     * @return mixed
     * @throws Exception
     */
    public function getListCountFiltered()
    {
        return $this->api
            ->setPostData()
            ->execute("process-instance/count");
    }

    /**
     * Get List (POST)
     * POST /process-instance
     * @return mixed
     * @throws Exception
     */
    public function getListFiltered()
    {
        return $this->api
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
     */
    public function suspendedById($id, $suspended)
    {
        return $this->api
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
     */
    public function getVriables($id)
    {
        return $this->api
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
     */
    public function putVariable($id, $varId, $value, $type = null)
    {
        $type = is_null($type) ? gettype($value) : $type;
        return $this->api
            ->postJson([
                'value' => $value,
                'type' => $type,
            ])
            ->methodPut()
            ->execute("process-instance/$id/variables/$varId");
    }
    
    
}