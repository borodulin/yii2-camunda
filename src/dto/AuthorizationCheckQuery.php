<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class AuthorizationCheckQuery
 * @package borodulin\camunda\dto
 */
class AuthorizationCheckQuery extends BaseDto
{
    /**
     * String value representing the permission name to check for.
     * Yes
     * @var
     */
    public $permissionName;

    /**
     * String representation of an integer value representing the permission value to check for.
     * Yes
     * @var
     */
    public $permissionValue;

    /**
     * String value for the name of the resource to check permissions for.
     * Yes
     * @var
     */
    public $resourceName;

    /**
     * An integer representing the resource type to check permissions for. See the User Guide for a list of integer
     * representations of resource types.
     * Yes
     * @var
     */
    public $resourceType;

    /**
     * The id of the resource to check permissions for.
     * If left blank, a check for global permissions on the resource is performed.
     * @var
     */
    public $resourceId;
}
