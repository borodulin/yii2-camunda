<?php

namespace borodulin\camunda\dto;


/**
 * Class TaskQuery
 * @package borodulin\camunda\dto
 */
class TaskQuery extends BaseDto
{
    /**
     * Restrict to tasks that belong to process instances with the given id.
     * @var
     */
    public $processInstanceId;

    /**
     * Restrict to tasks that belong to process instances with the given business key.
     * @var
     */
    public $processInstanceBusinessKey;

    /**
     * Restrict to tasks that belong to process instances with one of the give business keys. The keys need to be in a comma-separated list.
     * @var
     */
    public $processInstanceBusinessKeyIn;

    /**
     * Restrict to tasks that have a process instance business key that has the parameter value as a substring.
     * @var
     */
    public $processInstanceBusinessKeyLike;

    /**
     * Restrict to tasks that belong to a process definition with the given id.
     * @var
     */
    public $processDefinitionId;

    /**
     * Restrict to tasks that belong to a process definition with the given key.
     * @var
     */
    public $processDefinitionKey;

    /**
     * Restrict to tasks that belong to a process definition with one of the given keys. The keys need to be in a comma-separated list.
     * @var
     */
    public $processDefinitionKeyIn;

    /**
     * Restrict to tasks that belong to a process definition with the given name.
     * @var
     */
    public $processDefinitionName;

    /**
     * Restrict to tasks that have a process definition name that has the parameter value as a substring.
     * @var
     */
    public $processDefinitionNameLike;

    /**
     * Restrict to tasks that belong to an execution with the given id.
     * @var
     */
    public $executionId;

    /**
     * Restrict to tasks that belong to case instances with the given id.
     * @var
     */
    public $caseInstanceId;

    /**
     * Restrict to tasks that belong to case instances with the given business key.
     * @var
     */
    public $caseInstanceBusinessKey;

    /**
     * Restrict to tasks that have a case instance business key that has the parameter value as a substring.
     * @var
     */
    public $caseInstanceBusinessKeyLike;

    /**
     * Restrict to tasks that belong to a case definition with the given id.
     * @var
     */
    public $caseDefinitionId;

    /**
     * Restrict to tasks that belong to a case definition with the given key.
     * @var
     */
    public $caseDefinitionKey;

    /**
     * Restrict to tasks that belong to a case definition with the given name.
     * @var
     */
    public $caseDefinitionName;

    /**
     * Restrict to tasks that have a case definition name that has the parameter value as a substring.
     * @var
     */
    public $caseDefinitionNameLike;

    /**
     * Restrict to tasks that belong to a case execution with the given id.
     * @var
     */
    public $caseExecutionId;

    /**
     * Only include tasks which belong to one of the passed and comma-separated activity instance ids.
     * @var
     */
    public $activityInstanceIdIn;

    /**
     * Only include tasks which belong to one of the passed and comma-separated tenant ids.
     * @var
     */
    public $tenantIdIn;

    /**
     * Only include tasks which belongs to no tenant. Value may only be true, as false is the default behavior.
     * @var
     */
    public $withoutTenantId;

    /**
     * Restrict to tasks that the given user is assigned to.
     * @var
     */
    public $assignee;

    /**
     * Restrict to tasks that the user described by the given expression is assigned to.
     * See the user guide for more information on available functions.
     * @var
     */
    public $assigneeExpression;

    /**
     * Restrict to tasks that have an assignee that has the parameter value as a substring.
     * @var
     */
    public $assigneeLike;

    /**
     * Restrict to tasks that have an assignee that has the parameter value described by the given expression
     * as a substring. See the user guide for more information on available functions.
     * @var
     */
    public $assigneeLikeExpression;

    /**
     * Restrict to tasks that the given user owns.
     * @var
     */
    public $owner;

    /**
     * Restrict to tasks that the user described by the given expression owns.
     * See the user guide for more information on available functions.
     * @var
     */
    public $ownerExpression;

    /**
     * Only include tasks that are offered to the given group.
     * @var
     */
    public $candidateGroup;

    /**
     * Only include tasks that are offered to the group described by the given expression.
     * See the user guide for more information on available functions.
     * @var
     */
    public $candidateGroupExpression;

    /**
     * Only include tasks that are offered to the given user or to one of his groups.
     * @var
     */
    public $candidateUser;

    /**
     * Only include tasks that are offered to the user described by the given expression.
     * See the user guide for more information on available functions.
     * @var
     */
    public $candidateUserExpression;

    /**
     * Also include tasks that are assigned to users in candidate queries.
     * Default is to only include tasks that are not assigned to any user if you query by candidate user or group(s).
     * @var
     */
    public $includeAssignedTasks;

    /**
     * Only include tasks that the given user is involved in. A user is involved in a task if an identity link
     *  exists between task and user (e.g. the user is the assignee).
     * @var
     */
    public $involvedUser;

    /**
     * Only include tasks that the user described by the given expression is involved in. A user is involved in
     *  a task if an identity link exists between task and user (e.g., the user is the assignee).
     * See the user guide for more information on available functions.
     * @var
     */
    public $involvedUserExpression;

    /**
     * If set to true, restricts the query to all tasks that are unassigned.
     * @var
     */
    public $unassigned;

    /**
     * Restrict to tasks that have the given key.
     * @var
     */
    public $taskDefinitionKey;

    /**
     * Restrict to tasks that have one of the given keys. The keys need to be in a comma-separated list.
     * @var
     */
    public $taskDefinitionKeyIn;

    /**
     * Restrict to tasks that have a key that has the parameter value as a substring.
     * @var
     */
    public $taskDefinitionKeyLike;

    /**
     * Restrict to tasks that have the given name.
     * @var
     */
    public $name;

    /**
     * Restrict to tasks that have a name with the given parameter value as substring.
     * @var
     */
    public $nameLike;

    /**
     * Restrict to tasks that have the given description.
     * @var
     */
    public $description;

    /**
     * Restrict to tasks that have a description that has the parameter value as a substring.
     * @var
     */
    public $descriptionLike;

    /**
     * Restrict to tasks that have the given priority.
     * @var
     */
    public $priority;

    /**
     * Restrict to tasks that have a lower or equal priority.
     * @var
     */
    public $maxPriority;

    /**
     * Restrict to tasks that have a higher or equal priority.
     * @var
     */
    public $minPriority;

    /**
     * Restrict to tasks that are due on the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $dueDate;

    /**
     * Restrict to tasks that are due on the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $dueDateExpression;

    /**
     * Restrict to tasks that are due after the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $dueAfter;

    /**
     * Restrict to tasks that are due after the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $dueAfterExpression;

    /**
     * Restrict to tasks that are due before the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $dueBefore;

    /**
     * Restrict to tasks that are due before the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $dueBeforeExpression;

    /**
     * Restrict to tasks that have a followUp date on the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $followUpDate;

    /**
     * Restrict to tasks that have a followUp date on the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $followUpDateExpression;

    /**
     * Restrict to tasks that have a followUp date after the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $followUpAfter;

    /**
     * Restrict to tasks that have a followUp date after the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $followUpAfterExpression;

    /**
     * Restrict to tasks that have a followUp date before the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $followUpBefore;

    /**
     * Restrict to tasks that have a followUp date before the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $followUpBeforeExpression;

    /**
     * Restrict to tasks that have no followUp date or a followUp date before the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * The typical use case is to query all "active" tasks for a user for a given date.
     * @var
     */
    public $followUpBeforeOrNotExistent;

    /**
     * Restrict to tasks that have no followUp date or a followUp date before the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $followUpBeforeOrNotExistentExpression;

    /**
     * Restrict to tasks that were created on the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * Note: if the used database saves dates with milliseconds precision this query only will return tasks created
     * on the given timestamp with zero milliseconds.
     * @var
     */
    public $createdOn;

    /**
     * Restrict to tasks that were created on the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $createdOnExpression;

    /**
     * Restrict to tasks that were created after the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $createdAfter;

    /**
     * Restrict to tasks that were created after the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $createdAfterExpression;

    /**
     * Restrict to tasks that were created before the given date.
     * The date must have the format yyyy-MM-dd'T'HH:mm:ss, e.g., 2013-01-23T14:42:45.
     * @var
     */
    public $createdBefore;

    /**
     * Restrict to tasks that were created before the date described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to a java.util.Date or org.joda.time.DateTime object.
     * @var
     */
    public $createdBeforeExpression;

    /**
     * Restrict to tasks that are in the given delegation state. Valid values are PENDING and RESOLVED.
     * @var
     */
    public $delegationState;

    /**
     * Restrict to tasks that are offered to any of the given candidate groups.
     * Takes a comma-separated list of group names, so for example developers,support,sales.
     * @var
     */
    public $candidateGroups;

    /**
     * Restrict to tasks that are offered to any of the candidate groups described by the given expression.
     * See the user guide for more information on available functions.
     * The expression must evaluate to java.util.List of Strings.
     * @var
     */
    public $candidateGroupsExpression;

    /**
     * Only include active tasks. Value may only be true, as false is the default behavior.
     * @var
     */
    public $active;

    /**
     * Only include suspended tasks. Value may only be true, as false is the default behavior.
     * @var
     */
    public $suspended;

    /**
     * Only include tasks that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *   A valid parameter value has the form key_operator_value.
     *   key is the variable name, operator is the comparison operator to be used and value the variable value.
     *   Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     *  lt - lower than; lteq - lower than or equal to; like.
     * key and value may not contain underscore or comma characters.
     * @var
     */
    public $taskVariables;

    /**
     * Only include tasks that belong to process instances that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *   A valid parameter value has the form key_operator_value. key is the variable name, operator is the comparison
     *   operator to be used and value the variable value.
     *     Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     *   lt - lower than; lteq - lower than or equal to; like.
     *  key and value may not contain underscore or comma characters.
     * @var
     */
    public $processVariables;

    /**
     * Only include tasks that belong to case instances that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *   A valid parameter value has the form key_operator_value. key is the variable name, operator is the comparison
     *    operator to be used and value the variable value.
     *   Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     *  lt - lower than; lteq - lower than or equal to; like.
     *  key and value may not contain underscore or comma characters.
     * @var
     */
    public $caseInstanceVariables;

    /**
     * Restrict query to all tasks that are sub tasks of the given task. Takes a task id.
     * @var
     */
    public $parentTaskId;

    /**
     * Sort the results lexicographically by a given criterion. Valid values are instanceId, caseInstanceId, dueDate,
     *  executionId, caseExecutionId,assignee, created, description, id, name, nameCaseInsensitive and priority.
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