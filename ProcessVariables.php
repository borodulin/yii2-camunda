<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

/**
 * Class ProcessVariables
 * @package borodulin\camunda
 */
class ProcessVariables extends Module
{
    /**
     * Delete
     * DELETE /process-instance/{id}/variables/{varId}
     * @param $id
     * @param $varId
     * @return mixed
     * @throws Exception
     */
    public function delete($id, $varId)
    {
        return $this->api
            ->methodDelete()
            ->execute("process-instance/$id/variables/$varId");
    }

    /**
     * Get (Binary)
     * POST /process-instance/{id}/variables/{varId}/data
     * @param $id
     * @param $varId
     * @return mixed
     * @throws Exception
     */
    public function getValueBinary($id, $varId)
    {
        return $this->api
            ->setPostData()
            ->execute("process-instance/$id/variables/$varId/data");
    }

    /**
     * Get
     * GET /process-instance/{id}/variables/{varId}
     * @param $id
     * @param $varId
     * @return mixed
     * @throws Exception
     */
    public function getValue($id, $varId)
    {
        return $this->api
            ->execute("process-instance/$id/variables/$varId");
    }

    /**
     * Get List
     * GET /process-instance/{id}/variables
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getList($id)
    {
        return $this->api
            ->execute("process-instance/$id/variables");
    }

    /**
     * Post (Binary)
     * POST /process-instance/{id}/variables/{varId}/data
     * Modify
     * POST /process-instance/{id}/variables
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function modify($id)
    {
        return $this->api
            ->setPostData()
            ->execute("process-instance/$id/variables");
    }

    /**
     * Update
     * PUT /process-instance/{id}/variables/{varId}
     * @param $id
     * @param $varId
     * @return mixed
     * @throws Exception
     */
    public function update($id, $varId)
    {
        return $this->api
            ->methodPut()
            ->execute("process-instance/$id/variables/$varId");
    }
}