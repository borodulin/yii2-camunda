<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class ProcessDefinitionQuery
 * @package borodulin\camunda\dto
 */
class ProcessDefinitionQuery extends BaseDto
{
    /**
     * Filter by process definition id.
     * @var
     */
    public $processDefinitionId;

    /**
     * Filter by process definition ids.
     * @var
     */
    public $processDefinitionIdIn;

    /**
     * Filter by process definition name.
     * @var
     */
    public $name;

    /**
     * Filter by process definition names that the parameter is a substring of.
     * @var
     */
    public $nameLike;

    /**
     * Filter by the deployment the id belongs to.
     * @var
     */
    public $deploymentId;

    /**
     * Filter by process definition key, i.e. the id in the BPMN 2.0 XML. Exact match.
     * @var
     */
    public $key;

    /**
     * Filter by process definition keys that the parameter is a substring of.
     * @var
     */
    public $keyLike;

    /**
     * Filter by process definition category. Exact match.
     * @var
     */
    public $category;

    /**
     * Filter by process definition categories that the parameter is a substring of.
     * @var
     */
    public $categoryLike;

    /**
     * Filter by process definition version.
     * @var
     */
    public $version;

    /**
     * Only include those process definitions that are latest versions.
     * Value may only be true, as false is the default behavior.
     * @var
     */
    public $latestVersion;

    /**
     * Filter by the name of the process definition resource. Exact match.
     * @var
     */
    public $resourceName;

    /**
     * Filter by names of those process definition resources that the parameter is a substring of.
     * @var
     */
    public $resourceNameLike;

    /**
     * Filter by a user name who is allowed to start the process.
     * @var
     */
    public $startableBy;

    /**
     * Only include active process definitions. Value may only be true, as false is the default behavior.
     * @var
     */
    public $active;

    /**
     * Only include suspended process definitions. Value may only be true, as false is the default behavior.
     * @var
     */
    public $suspended;

    /**
     * Filter by the incident id.
     * @var
     */
    public $incidentId;

    /**
     * Filter by the incident type.
     * @var
     */
    public $incidentType;

    /**
     * Filter by the incident message. Exact match.
     * @var
     */
    public $incidentMessage;

    /**
     * Filter by the incident message that the parameter is a substring of.
     * @var
     */
    public $incidentMessageLike;

    /**
     * Filter by a comma-separated list of tenant ids. A process definition must have one of the given tenant ids.
     * @var
     */
    public $tenantIdIn;

    /**
     * Only include process definitions which belongs to no tenant.
     * Value may only be true, as false is the default behavior.
     * @var
     */
    public $withoutTenantId;

    /**
     * Include process definitions which belongs to no tenant. Can be used in combination with tenantIdIn.
     * Value may only be true, as false is the default behavior.
     * @var
     */
    public $includeProcessDefinitionsWithoutTenantId;

    /**
     * Filter by the version tag.
     * @var
     */
    public $versionTag;

    /**
     * Filter by the version tag that the parameter is a substring of.
     * @var
     */
    public $versionTagLike;
}
