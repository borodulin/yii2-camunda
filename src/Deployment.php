<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use yii\helpers\ArrayHelper;

/**
 * Class Deployment
 * @package borodulin\camunda
 */
class Deployment extends Module
{
    /**
     * Query Parameters
     * Name    Description
     * id    Filter by deployment id.
     * name    Filter by the deployment name. Exact match.
     * nameLike    Filter by the deployment name that the parameter is a substring of. The parameter can include the wildcard % to express like-strategy such as: starts with (%name), ends with (name%) or contains (%name%).
     * after    Restricts to all deployments after the given date. The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45
     * before    Restricts to all deployments before the given date. The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45
     * sortBy    Sort the results lexicographically by a given criterion. Valid values are id, name and deploymentTime. Must be used in conjunction with the sortOrder parameter.
     * sortOrder    Sort the results in a given order. Values may be asc for ascending order or desc for descending order. Must be used in conjunction with the sortBy parameter.
     * firstResult    Pagination of results. Specifies the index of the first result to return.
     * maxResults    Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left.
     * @param array $params
     * @return array
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDeployments($params = [])
    {
        return $this->getApi()
            ->execute('deployment', $params);
    }

    /**
     * @see Deployment::getDeployments()
     * @param array $params
     * @return integer
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDeploymentsCount($params = [])
    {
        $result = $this->getApi()
            ->execute('deployment/count', $params);
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * @param string $id The id of the deployment
     * @return array
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDeployment($id)
    {
        return $this->getApi()
            ->execute('deployment/' . $id);
    }

    /**
     * @param string $id
     * @param boolean $cascade
     * @param boolean $skipCustomListeners
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function deleteDeployment($id, $cascade = true, $skipCustomListeners = false)
    {
        return $this->getApi()
            ->methodDelete()
            ->execute('deployment/' . $id, [
                'cascade' => $cascade ? 'true' : 'false',
                'skipCustomListeners' => $skipCustomListeners ? 'true' : 'false'
            ]);
    }

    /**
     * @param string $id The id of the deployment to retrieve the deployment resources for.
     * @return array
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getDeploymentResources($id)
    {
        return $this->getApi()
            ->execute("deployment/$id/resources");
    }

    /**
     * @param string $id The id of the deployment.
     * @param string $resourceId The id of the deployment resource.
     * @return array
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getResource($id, $resourceId)
    {
        return $this->getApi()
            ->execute("deployment/$id/resources/$resourceId");
    }

    /**
     * @param string $deploymentName The name for the deployment to be created.
     * @param string $filename The file of model to create the deployment resource.
     * @param boolean $enableDuplicateFiltering A flag indicating whether the process engine should perform duplicate checking for the deployment or not. This allows you to check if a deployment with the same name and the same resouces already exists and if true, not create a new deployment but instead return the existing deployment. The default value is false.
     * @param boolean $deployChangedOnly A flag indicating whether the process engine should perform duplicate checking on a per-resource basis. If set to true, only those resources that have actually changed are deployed. Checks are made against resources included previous deployments of the same name and only against the latest versions of those resources. If set to true, the option enable-duplicate-filtering is overridden and set to true.
     * @return array
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function create($deploymentName, $filename, $enableDuplicateFiltering = false, $deployChangedOnly = false)
    {
        $api = $this->getApi();
        $api->request
            ->setMethod('POST')
            ->addFile($deploymentName, $filename)
            ->setData([
                'deployment-name' => $deploymentName,
                'enable-duplicate-filtering' => $enableDuplicateFiltering ? 'true' : 'false',
                'deploy-changed-only' => $deployChangedOnly ? 'true' : 'false',
            ]);
        return $api
            ->execute("deployment/create");

    }
}