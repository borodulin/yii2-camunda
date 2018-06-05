<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class AuthorizationCreateBody
 * @package borodulin\camunda\dto
 */
class AuthorizationCreateBody extends BaseDto
{
    /**
     * The type of the authorization. (0=global, 1=grant, 2=revoke).
     * @var integer
     */
    public $type;

    /**
     * An array of Strings holding the permissions provided by this authorization.
     * @var string
     */
    public $permissions;

    /**
     * The id of the user this authorization has been created for. The value "\*" represents a global
     * authorization ranging over all users.
     * @var string
     */
    public $userId;

    /**
     * The id of the group this authorization has been created for.
     * @var string
     */
    public $groupId;

    /**
     * An integer representing the resource type. See the User Guide for a list of integer representations of resource types.
     * @var integer
     */
    public $resourceType;

    /**
     * The resource Id. The value "\*" represents an authorization ranging over all instances of a resource.
     * @var string
     */
    public $resourceId;
}
