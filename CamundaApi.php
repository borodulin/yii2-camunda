<?php
/**
 * @link https://github.com/borodulin/yii2-camunda
 * @copyright Copyright (c) 2018 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-camunda/blob/master/LICENSE
 */
namespace borodulin\camunda;

use yii\base\Component;
use yii\helpers\Json;
use yii\httpclient\Client;
use yii\httpclient\Request;

/**
 * @property Request $request
 *
 * Class CamundaApi
 * @package common\components\camunda
 */
class CamundaApi extends Component
{
    public $apiUrl = 'http://localhost:8080/engine-rest';

    /**
     * @var Request
     */
    private $_request;

    public function init()
    {
        parent::init();
        $this->apiUrl = rtrim($this->apiUrl, '/') . '/';
        $this->_request = (new Client())->createRequest();
    }

    public function getRequest()
    {
        return $this->_request;
    }

    /**
     *
     * @param string|array $json
     * @return CamundaApi
     */
    public function postJson($json)
    {
        $json = is_array($json) ? Json::encode($json) : $json;
        $this->_request
            ->addHeaders(['content-type' => 'application/json'])
            ->setMethod('POST')
            ->setContent($json);
        return $this;
    }

    /**
     * @return $this
     */
    public function methodDelete()
    {
        $this->_request->setMethod('DELETE');
        return $this;
    }

    /**
     * @return $this
     */
    public function methodPut()
    {
        $this->_request->setMethod('PUT');
        return $this;
    }

    public function methodGet()
    {
        $this->_request->setMethod('GET');
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setPostData($data = [])
    {
        $this->_request->setMethod('POST')->addData($data);
        return $this;
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    public function execute($endpoint, $params = [])
    {
        $url = $this->apiUrl . $endpoint;
        if (count($params)) {
            $url .= '?' . http_build_query($params);
        }
        $this->_request->setUrl($url);

        $response = $this->_request->send();

        if ($response->isOk) {
            return Json::decode($response->content);
        }

        throw new Exception(json_decode($response->content, true) ?: $response->content);

    }

}