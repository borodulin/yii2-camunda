<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda\dto;

/**
 * Class SignalBody
 * @package borodulin\camunda\dto
 */
class SignalBody extends BaseDto
{
    /**
     * The name of the signal to deliver.
     * Note: This property is mandatory.
     * @var
     */
    public $name;

    /**
     * Optionally specifies a single execution which is notified by the signal.
     * Note: If no execution id is defined the signal is broadcasted to all subscribed handlers.
     * @var
     */
    public $executionId;

    /**
     * A JSON object containing variable key-value pairs.
     * Each key is a variable name and each value a JSON variable value object.
     * @var
     */
    public $variables;

    /**
     * Specifies a tenant to deliver the signal. The signal can only be received on executions or process definitions which belongs to the given tenant.
     * Note: Cannot be used in combination with executionId.
     * @var
     */
    public $tenantId;

    /**
     * If true the signal can only be received on executions or process definitions which belongs to no tenant. Value may not be false as this is the default behavior.
     * Note: Cannot be used in combination with executionId.
     * @var
     */
    public $withoutTenantId;
}