<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class ProcessInstanceQuery
 * @package borodulin\camunda\dto
 */
class ProcessInstanceQuery extends BaseDto
{
    /**
     * Filter by a comma-separated list of process instance ids.
     * @var
     */
    public $processInstanceIds;

    /**
     * Filter by process instance business key.
     * @var
     */
    public $businessKey;

    /**
     * Filter by case instance id.
     * @var
     */
    public $caseInstanceId;

    /**
     * Filter by the process definition the instances run on.
     * @var
     */
    public $processDefinitionId;

    /**
     * Filter by the key of the process definition the instances run on.
     * @var
     */
    public $processDefinitionKey;

    /**
     * Filter by the deployment the id belongs to.
     * @var
     */
    public $deploymentId;

    /**
     * Restrict query to all process instances that are sub process instances of the given process instance.
     * Takes a process instance id.
     * @var
     */
    public $superProcessInstance;

    /**
     * Restrict query to all process instances that have the given process instance as a sub process instance.
     * Takes a process instance id.
     * @var
     */
    public $subProcessInstance;

    /**
     * Restrict query to all process instances that are sub process instances of the given case instance.
     * Takes a case instance id.
     * @var
     */
    public $superCaseInstance;

    /**
     * Restrict query to all process instances that have the given case instance as a sub case instance.
     * Takes a case instance id.
     * @var
     */
    public $subCaseInstance;

    /**
     * Only include active process instances. Value may only be true, as false is the default behavior.
     * @var
     */
    public $active;

    /**
     * Only include suspended process instances. Value may only be true, as false is the default behavior.
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
     * Filter by a comma-separated list of tenant ids. A process instance must have one of the given tenant ids.
     * @var
     */
    public $tenantIdIn;

    /**
     * Only include process instances which belongs to no tenant.
     * Value may only be true, as false is the default behavior.
     * @var
     */
    public $withoutTenantId;

    /**
     * Filter by a comma-separated list of activity ids.
     * A process instance must currently wait in a leaf activity with one of the given activity ids.
     * @var
     */
    public $activityIdIn;

    /**
     * Only include process instances that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *  A valid parameter value has the form key_operator_value. key is the variable name, operator
     *   is the comparison operator to be used and value the variable value.
     *     Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     * lt - lower than; lteq - lower than or equal to; like.
     * key and value may not contain underscore or comma characters.
     * @var
     */
    public $variables;

    /**
     * Sort the results lexicographically by a given criterion.
     * Valid values are instanceId, definitionKey, definitionId and tenantId.
     * Must be used in conjunction with the sortOrder parameter.
     * @var
     */
    public $sortBy;

    /**
     * Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     * @var
     */
    public $sortOrder;

    /**
     * Pagination of results. Specifies the index of the first result to return.
     * @var
     */
    public $firstResult;

    /**
     * Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     * @var
     */
    public $maxResults;
}