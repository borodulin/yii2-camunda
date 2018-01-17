<?php

namespace common\components\camunda;


class ProcessDefinition
{
    /**
     * @var CamundaApi
     */
    private $api;

    public function __construct(CamundaApi $api)
    {
        $this->api = $api;
    }

    /**
     * Get Activity Instance Statistics
     * GET /process-definition/{id}/statistics
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getStatisticsById($id)
    {
        return $this->api
            ->execute("process-definition/$id/statistics");
    }

    /**
     * GET /process-definition/key/{key}/statistics (returns statistics for the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getStatisticsByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/statistics");
    }

    /**
     * Get Diagram
     * GET /process-definition/{id}/diagram
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getDiagramById($id)
    {
        return $this->api
            ->execute("process-definition/$id/diagram");
    }

    /**
     * GET /process-definition/key/{key}/diagram (returns the diagram for the latest version of the process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getDiagramByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/diagram");
    }

    /**
     * Get Start Form Variables
     * GET /process-definition/{id}/form-variables
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getStartFormVariablesById($id)
    {
        return $this->api
            ->execute("process-definition/$id/form-variables");
    }

    /**
     * GET /process-definition/key/{key}/form-variables (returns the form variables for the latest process definition by key).
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getStartFormVariablesByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/form-variables");
    }

    /**
     * Get List Count
     * GET /process-definition/count
     * @return mixed
     * @throws Exception
     */
    public function getListCount()
    {
        return $this->api
            ->execute("process-definition/count");
    }

    /**
     * Get List
     * GET /process-definition
     * @param array $query
     * @return mixed
     * @throws Exception
     */
    public function getList($query = [])
    {
        $uri = "process-definition";
        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }
        return $this->api
            ->execute($uri);
    }

    /**
     * Get Rendered Start Form
     * GET /process-definition/{id}/rendered-form
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getRenderedStartFormById($id)
    {
        return $this->api
            ->execute("process-definition/$id/rendered-form");
    }

    /**
     * GET /process-definition/key/{key}/rendered-form (returns the rendered form for the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getRenderedStartFormByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/rendered-form");
    }

    /**
     * Get Start Form Key
     * GET /process-definition/{id}/startForm
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getStartFormKeyById($id)
    {
        return $this->api
            ->execute("process-definition/$id/startForm");
    }

    /**
     * GET /process-definition/key/{key}/startForm (returns the key of the start form for the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getStartFormKeyByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/startForm");
    }

    /**
     * Get Process Instance Statistics
     * GET /process-definition/statistics
     * @return mixed
     * @throws Exception
     */
    public function getProcessInstanceStatistics()
    {
        return $this->api
            ->execute("process-definition/statistics");
    }

    /**
     * Get XML
     * GET /process-definition/{id}/xml
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getXmlById($id)
    {
        return $this->api
            ->execute("process-definition/$id/xml");
    }

    /**
     * GET /process-definition/key/{key}/xml (returns the XML for the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getXmlByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key/xml");
    }

    /**
     * Get
     * GET /process-definition/{id}
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getDefinitionById($id)
    {
        return $this->api
            ->execute("process-definition/$id");
    }

    /**
     * GET /process-definition/key/{key} (returns the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getDefinitionByKey($key)
    {
        return $this->api
            ->execute("process-definition/key/$key");
    }

    /**
     * Start Instance
     * POST /process-definition/{id}/start
     * @param $id
     * @param $json
     * @return mixed
     * @throws Exception
     */
    public function startInstanceById($id, $json)
    {
        return $this->api
            ->postJson($json)
            ->execute("process-definition/$id/start");
    }

    /**
     * POST /process-definition/key/{key}/start (starts the latest version of process definition)
     * @param $key
     * @param $json
     * @return mixed
     * @throws Exception
     */
    public function startInstanceByKey($key, $json)
    {
        return $this->api
            ->postJson($json)
            ->execute("process-definition/key/$key/start");
    }

    /**
     * Submit Start Form
     * POST /process-definition/{id}/submit-form
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function submitStartFormById($id)
    {
        return $this->api
            ->setPostData()
            ->execute("process-definition/$id/submit-form");
    }

    /**
     * POST /process-definition/key/{key}/submit-form (starts the latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function submitStartFormByKey($key)
    {
        return $this->api
            ->setPostData()
            ->execute("process-definition/key/$key/submit-form");
    }

    /**
     * Activate/Suspend By Id
     * PUT /process-definition/{id}/suspended
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function suspendedById($id)
    {
        return $this->api
            ->methodPut()
            ->execute("process-definition/$id/suspended");
    }

    /**
     * PUT /process-definition/key/{key}/suspended (suspend latest version of process definition)
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function suspendedByKey($key)
    {
        return $this->api
            ->methodPut()
            ->execute("process-definition/key/$key/suspended");
    }

    //Activate/Suspend By Key
    //PUT /process-definition/suspended
}