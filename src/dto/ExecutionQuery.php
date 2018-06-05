<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class ExecutionQuery
 * @package borodulin\camunda\dto
 */
class ExecutionQuery extends BaseDto
{
    /**
     * Filter by the business key of the process instances the executions belong to.
     * @var
     */
    public $businessKey;

    /**
     * Filter by the process definition the executions run on.
     * @var
     */
    public $processDefinitionId;

    /**
     * Filter by the key of the process definition the executions run on.
     * @var
     */
    public $processDefinitionKey;

    /**
     * Filter by the id of the process instance the execution belongs to.
     * @var
     */
    public $processInstanceId;

    /**
     * Filter by the id of the activity the execution currently executes.
     * @var
     */
    public $activityId;

    /**
     * Select only those executions that expect a signal of the given name.
     * @var
     */
    public $signalEventSubscriptionName;

    /**
     * Select only those executions that expect a message of the given name.
     * @var
     */
    public $messageEventSubscriptionName;

    /**
     * Only include active executions. Value may only be true, as false is the default behavior.
     * @var
     */
    public $active;

    /**
     * Only include suspended executions. Value may only be true, as false is the default behavior.
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
     * Filter by a comma-separated list of tenant ids. An execution must have one of the given tenant ids.
     * @var
     */
    public $tenantIdIn;

    /**
     * Only include executions that have variables with certain values. Variable filtering expressions are
     * comma-separated and are structured as follows:
     * A valid parameter value has the form key_operator_value. key is the variable name, operator is the comparison
     * operator to be used and value the variable value.
     *  Note: Values are always treated as String objects on server side.
     *  Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     *  lt - lower than; lteq - lower than or equal to; like.
     * key and value may not contain underscore or comma characters.
     * @var
     */
    public $variables;

    /**
     * Only include executions that belong to a process instance with variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *  A valid parameter value has the form key_operator_value. key is the variable name, operator is the comparison
     * operator to be used and value the variable value.
     *  Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to.
     * key and value may not contain underscore or comma characters.
     * @var
     */
    public $processVariables;

    /**
     * Sort the results lexicographically by a given criterion. Valid values are instanceId, definitionKey,
     * definitionId and tenantId. Must be used in conjunction with the sortOrder parameter.
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
