<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use borodulin\camunda\dto\TaskQuery;
use yii\helpers\ArrayHelper;

/**
 * Class Task
 * @package borodulin\camunda
 */
class Task extends Module
{
    /**
     * Retrieves a single task by its id.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function get($id)
    {
        return $this->getApi()
            ->execute("task/{$id}");
    }

    /**
     * Query for tasks that fulfill a given filter.
     * The size of the result set can be retrieved by using get tasks count method.
     * @param array|TaskQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getList($query = null)
    {
        return $this->getApi()
            ->execute('task', $query);
    }

    /**
     * Query for tasks that fulfill a given filter.
     * This method is slightly more powerful than the GET query because it allows filtering by multiple process
     * or task variables of types String, Number or Boolean. The size of the result set can be retrieved by
     * using get tasks count (POST) method.
     * @param array|TaskQuery $query
     * @param int $firstResult
     * @param int $maxResults
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListPost($query = null, $firstResult = 0, $maxResults = 20)
    {
        return $this->getApi()
            ->postJson($query)
            ->execute('task', [
                'firstResult' => $firstResult,
                'maxResults' => $maxResults
            ]);
    }

    /**
     * Get the number of tasks that fulfill a provided filter.
     * Corresponds to the size of the result set when using the get tasks method.
     * @param array|TaskQuery $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCount($query = null)
    {
        $result = $this->getApi()
            ->execute('task/count', $query);
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * Get the number of tasks that fulfill the given filter.
     * Corresponds to the size of the result set of the get tasks (POST) method and takes the same parameters.
     * @param array $query
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getListCountPost($query)
    {
        $result = $this->getApi()
            ->postJson($query)
            ->execute('task/count');
        return ArrayHelper::getValue($result, 'count');
    }

    /**
     * Retrieves the form key for a task. The form key corresponds to the FormData#formKey property in the engine.
     * This key can be used to do task-specific form rendering in client applications.
     * Additionally, the context path of the containing process application is returned.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getFormKey($id)
    {
        return $this->getApi()
            ->execute("task/{$id}/form");
    }

    /**
     * Claim a task for a specific user.
     * Note: The difference with set a assignee is that here a check is performed to see
     * if the task already has a user assigned to it.
     * @param $id
     * @param $userId
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function claim($id, $userId)
    {
        return $this->getApi()
            ->postJson(['userId' => $userId])
            ->execute("task/{$id}/claim");
    }

    /**
     * Resets a task’s assignee. If successful, the task is not assigned to a user.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function unclaim($id)
    {
        return $this->getApi()
            ->setPostData()
            ->execute("task/{$id}/unclaim");
    }

    /**
     * Complete a task and update process variables.
     * @param $id
     * @param array $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function complete($id, $variables = [])
    {
        return $this->getApi()->postJson([
            'variables' => $this::translateVariables($variables)
        ])
            ->execute("task/{$id}/complete");
    }

    /**
     * Complete a task and update process variables using a form submit.
     * There are two difference between this method and the complete method:
     * If the task is in state PENDING - ie. has been delegated before, it is not completed but resolved. Otherwise it will be completed.
     * If the task has Form Field Metadata defined, the process engine will perform backend validation for any form fields which have validators defined.
     * See the Generated Task Forms section of the User Guide for more information.
     * @param $id
     * @param array $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function submitForm($id, $variables = [])
    {
        return $this->getApi()->postJson([
            'variables' => $this::translateVariables($variables)
        ])
            ->execute("task/{$id}/submit-form");
    }


    /**
     * Resolve a task and update execution variables.
     * @param $id
     * @param array $variables
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function resolve($id, $variables = [])
    {
        return $this->getApi()->postJson([
            'variables' => $this::translateVariables($variables)
        ])
            ->execute("task/{$id}/resolve");
    }

    /**
     * Change the assignee of a task to a specific user.
     * Note: The difference with claim a task is that this method does not check if the task already has a user assigned to it.
     * @param $id
     * @param $userId
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function setAssignee($id, $userId)
    {
        return $this->getApi()->postJson([
            'userId' => $userId
        ])
            ->execute("task/{$id}/assignee");
    }

    /**
     * Delegate a task to another user.
     * @param $id
     * @param $userId
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function delegate($id, $userId)
    {
        return $this->getApi()->postJson([
            'userId' => $userId
        ])
            ->execute("task/{$id}/delegate");
    }

    /**
     * Retrieves the rendered form for a task. This method can be used for getting the HTML rendering of a Generated Task Form.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getRenderedForm($id)
    {
        return $this->getApi()
            ->execute("task/{$id}/rendered-form");
    }

    /**
     * Retrieves the form variables for a task (only if they are defined via the Generated Task Form approach).
     * The form variables take form data specified on the task into account.
     * If form fields are defined, the variable types and default values of the form fields are taken into account.
     * @param $id
     * @param null $variableNames
     * @param bool $deserializeValues
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getFormVariables($id, $variableNames = null, $deserializeValues = false)
    {
        return $this->getApi()
            ->execute("task/{$id}/form-variables", [
                'variableNames' => $variableNames,
                'deserializeValues' => $deserializeValues,
            ]);
    }

    /**
     * Create a new task.
     * @param $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function create($params)
    {
        return $this->getApi()
            ->postJson($params)
            ->execute('task/create');
    }

    /**
     * Updates a task.
     * @param $id
     * @param $params
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function update($id, $params)
    {
        return $this->getApi()
            ->postJson($params)
            ->methodPut()
            ->execute("task/{$id}/");
    }


    /**
     * Gets the comments for a task.
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getComments($id)
    {
        return $this->getApi()
            ->execute("task/{$id}/comment");
    }

    /**
     * Retrieves a single task comment by task id and comment id.
     * @param $id
     * @param $commentId
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getSingleComment($id, $commentId)
    {
        return $this->getApi()
            ->execute("task/{$id}/comment/{$commentId}");
    }

    /**
     * Create a comment for a task.
     * @param $id
     * @param $message
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function postComment($id, $message)
    {
        return $this->getApi()->postJson([
            'message' => $message
        ])
            ->execute("task/{$id}/comment/create");
    }

    /**
     * Retrieves a variable from the context of a given task. The variable must be visible from the task.
     * It is visible from the task if it is a local task variable or declared in a parent scope of the task.
     * See documentation on visiblity of variables.
     * @param $id
     * @param $varName
     * @param bool $deserializeValue
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getVariable($id, $varName, $deserializeValue = false)
    {
        return $this->getApi()
            ->execute("task/{$id}/variables/{$varName}", [
                'deserializeValue' => $deserializeValue
            ]);
    }

    /**
     * Retrieves a binary variable from the context of a given task. Applicable for byte array and file variables.
     * The variable must be visible from the task. It is visible from the task if it is a local task variable or
     * declared in a parent scope of the task. See documentation on visiblity of variables.
     * @param $id
     * @param $varName
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getVariableBinary($id, $varName)
    {
        return $this->getApi()
            ->execute("task/{$id}/variables/{$varName}");
    }

    /**
     * Retrieves all variables visible from the task. A variable is visible from the task if it is a local task
     * variable or declared in a parent scope of the task. See documentation on visiblity of variables
     * @param $id
     * @param bool $deserializeValues
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getVariables($id, $deserializeValues = false)
    {
        return $this->getApi()
            ->execute("task/{$id}/variables", [
                'deserializeValues' => $deserializeValues
            ]);
    }

    /**
     * Updates or deletes the variables visible from the task. Updates precede deletions.
     * So, if a variable is updated AND deleted, the deletion overrides the update.
     * A variable is visible from the task if it is a local task variable or declared in a parent scope of the task.
     * See documentation on visiblity of variables.
     * @param $id
     * @param $modifications
     * @param array $deletions
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function modifyVariables($id, $modifications, $deletions = [])
    {
        return $this->getApi()->postJson([
            'modifications' => $this::translateVariables($modifications),
            'deletions' => $deletions
        ])
            ->execute("task/{$id}/variables");
    }

    /**
     * Sets a visible from the task. A variable is visible from the task if it is a local task variable or declared
     * in a parent scope of the task. See documentation on visiblity of variables.
     * If a variable visible from the task with the given name already exists, it is overwritten.
     * Otherwise, the variable is created in the top-most scope visible from the task.
     * @param $id
     * @param $varName
     * @param $value
     * @param null $type
     * @param null $valueInfo
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function updateVariable($id, $varName, $value, $type = null, $valueInfo = null)
    {
        $type = $type ? $type : gettype($value);
        return $this->getApi()->postJson([
            'value' => $value,
            'type' => $type,
            'valueInfo' => $valueInfo,
        ])
            ->methodPut()
            ->execute("task/{$id}/variables/{$varName}");
    }

    /**
     * Sets the serialized value for a binary variable or the binary value for a file variable visible from the task.
     * A variable is visible from the task if it is a local task variable or declared in a parent scope of the task.
     * See documentation on visiblity of variables.
     * @param $id
     * @param $varName
     * @param $data
     * @param $valueType
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function postVariableBinary($id, $varName, $data, $valueType)
    {
        return $this->getApi()->postJson([
            'data' => $data,
            'valueType' => $valueType,
        ])
            ->execute("task/{$id}/variables/{$varName}");
    }

    /**
     * Removes a variable visible from a task. A variable is visible from a task if it is a local task variable or
     * declared in a parent scope of the task. See documentation on visiblity of variables.
     * @param $id
     * @param $varName
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function deleteVariable($id, $varName)
    {
        return $this->getApi()
            ->methodDelete()
            ->execute("task/{$id}/variables/{$varName}");
    }

    /**
     * Retrieves a variable from the context of a given task.
     * @param $id
     * @param $varName
     * @param bool $deserializeValue
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     * @throws Exception
     */
    public function getLocalVariable($id, $varName, $deserializeValue = false)
    {
        return $this->getApi()
            ->execute("task/{$id}/localVariables/{$varName}", [
                'deserializeValue' => $deserializeValue
            ]);
    }

    /**
     * Retrieves a binary variable from the context of a given task. Applicable for byte array and file variables.
     * @param $id
     * @param $varName
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getLocalVariableBinary($id, $varName)
    {
        return $this->getApi()
            ->execute("task/{$id}/localVariables/{$varName}/data");
    }

    /**
     * Retrieves all variables of a given task.
     * @param $id
     * @param bool $deserializeValues
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function getLocalVariables($id, $deserializeValues = false)
    {
        return $this->getApi()
            ->execute("task/{$id}/localVariables", [
                'deserializeValues' => $deserializeValues
            ]);
    }

    /**
     * Updates or deletes the variables in the context of a task. Updates precede deletions.
     * So, if a variable is updated AND deleted, the deletion overrides the update.
     * @param $id
     * @param $modifications
     * @param array $deletions
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function modifyLocalVariables($id, $modifications, $deletions = [])
    {
        return $this->getApi()->postJson([
            'modifications' => $this::translateVariables($modifications),
            'deletions' => $deletions
        ])
            ->execute("task/{$id}/localVariables");
    }

    /**
     * Sets a variable in the context of a given task.
     * @param $id
     * @param $varName
     * @param $value
     * @param null $type
     * @param null $valueInfo
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function updateLocalVariable($id, $varName, $value, $type = null, $valueInfo = null)
    {
        $type = $type ? $type : gettype($value);
        return $this->getApi()->postJson([
            'value' => $value,
            'type' => $type,
            'valueInfo' => $valueInfo,
        ])
            ->methodPut()
            ->execute("task/{$id}/localVariables/{$varName}");
    }

    /**
     * Sets the serialized value for a binary variable or the binary value for a file variable.
     * @param $id
     * @param $varName
     * @param $data
     * @param $valueType
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function postLocalVariableBinary($id, $varName, $data, $valueType)
    {
        return $this->getApi()->postJson([
            'data' => $data,
            'valueType' => $valueType,
        ])
            ->execute("task/{$id}/localVariables/{$varName}");
    }

    /**
     * Removes a local variable from a task.
     * @param $id
     * @param $varName
     * @return mixed
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function deleteLocalVariable($id, $varName)
    {
        return $this->getApi()
            ->methodDelete()
            ->execute("task/{$id}/localVariables/{$varName}");
    }
}
