<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class AuthorizationQuery
 * @package borodulin\camunda\dto
 */
class AuthorizationQuery extends BaseDto
{
    /**
     * Filter by the id of the authorization.
     * @var
     */
    public $id;

    /**
     * Filter by the type of the authorization.
     * @var
     */
    public $type;

    /**
     * Filter by a comma-separated list of userIds
     * @var
     */
    public $userIdIn;

    /**
     * Filter by a comma-separated list of groupIds
     * @var
     */
    public $groupIdIn;

    /**
     * Filter by an integer representation of the resource type. See the User Guide for a list of integer
     * representations of resource types.
     * @var
     */
    public $resourceType;

    /**
     * Filter by resource id.
     * @var
     */
    public $resourceId;

    /**
     * Sort the results lexicographically by a given criterion. Valid values are resourceType and resourceId.
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
