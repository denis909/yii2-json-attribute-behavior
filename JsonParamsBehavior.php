<?php

namespace denis909\yii;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class JsonParamsBehavior extends \yii\base\Behavior
{

    public $attribute = 'params_json';

    public function getParam($name, $default = null)
    {
        return ArrayHelper::getValue($this->getParams(), $name, $default);
    }

    public function getParams() : array
    {
        if ($this->owner->{$this->attribute})
        {
            return Json::decode($this->owner->{$this->attribute}, true);
        }

        return [];
    }

    public function setParams(array $params)
    {
        $this->owner->{$this->attribute} = Json::encode($params);
    }

    public function setParam($name, $value)
    {
        $params = $this->getParams();

        $params[$name] = $value;

        $this->setParams($params);
    }

}