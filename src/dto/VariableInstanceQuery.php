<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class VariableInstanceQuery
 * @package borodulin\camunda\dto
 */
class VariableInstanceQuery extends BaseDto
{
    /**
     * Filter by variable instance name.
     * @var
     */
    public $variableName;

    /**
     * Filter by the variable instance name. The parameter can include the wildcard % to express like-strategy
     * such as: starts with (%name), ends with (name%) or contains (%name%).
     * @var
     */
    public $variableNameLike;

    /**
     * Only include variable instances which belong to one of the passed and comma-separated process instance ids.
     * @var
     */
    public $processInstanceIdIn;

    /**
     * Only include variable instances which belong to one of the passed and comma-separated execution ids.
     * @var
     */
    public $executionIdIn;

    /**
     *  Only include variable instances which belong to one of the passed case instance ids.
     * @var
     */
    public $caseInstanceIdIn;

    /**
     * Only include variable instances which belong to one of the passed case execution ids.
     * @var
     */
    public $caseExecutionIdIn;

    /**
     * Only include variable instances which belong to one of the passed and comma-separated task ids.
     * @var
     */
    public $taskIdIn;

    /**
     * Only include variable instances which belong to one of the passed and comma-separated activity instance ids.
     * @var
     */
    public $activityInstanceIdIn;

    /**
     * Only include variable instances which belong to one of the passed and comma-separated tenant ids.
     * @var
     */
    public $tenantIdIn;

    /**
     * Only include variable instances that have the certain values.
     * Value filtering expressions are comma-separated and are structured as follows:
     * A valid parameter value has the form key_operator_value. key is the variable name,
     * operator is the comparison operator to be used and value the variable value.
     *  Note: Values are always treated as String objects on server side.
     * Valid operator values are: eq - equal to; neq - not equal to; gt - greater than; gteq - greater than or equal to;
     * lt - lower than; lteq - lower than or equal to; like.
     * key and value may not contain underscore or comma characters.
     * @var
     */
    public $variableValues;

    /**
     * Sort the results lexicographically by a given criterion. Valid values are variableName, variableType,
     * activityInstanceId and tenantId. Must be used in conjunction with the sortOrder parameter.
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


    /**
     * Determines whether serializable variable values (typically variables that store custom Java objects) should be
     * deserialized on server side (default true).
     * If set to true, a serializable variable will be deserialized on server side and transformed to JSON using
     * Jackson's POJO/bean property introspection feature. Note that this requires the Java classes of the variable
     * value to be on the REST API's classpath.
     * If set to false, a serializable variable will be returned in its serialized format.
     * For example, a variable that is serialized as XML will be returned as a JSON string containing XML.
     * Note: While true is the default value for reasons of backward compatibility, we recommend setting this parameter
     * to false when developing web applications that are independent of the Java process applications deployed
     * to the engine.
     * @var bool
     */
    public $deserializeValues;
}
