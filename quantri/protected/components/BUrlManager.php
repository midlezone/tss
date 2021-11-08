<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BUrlManager
 *
 * @author minhbn
 */
class BUrlManager extends CUrlManager {

    public $urlRuleClass = 'CUrlRule';
    private $_urlFormat = self::GET_FORMAT;
    private $_rules = array();
    private $_baseUrl;
    public $urlPrefix = '';

    public function removeUrlPrefix($pathInfo, $urlPrefix = '') {
        if ($urlPrefix !== '' && substr($pathInfo, 0, strlen($urlPrefix)) == $urlPrefix)
            return substr($pathInfo, strlen($urlPrefix));
        else
            return $pathInfo;
    }

    public function parseUrl($request) {
        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $rawPathInfo = $request->getPathInfo();
            $pathInfo = $this->removeUrlPrefix($rawPathInfo, $this->urlPrefix);
            $pathInfo = $this->removeUrlSuffix($pathInfo, $this->urlSuffix);
            foreach ($this->_rules as $i => $rule) {
                if (is_array($rule))
                    $this->_rules[$i] = $rule = Yii::createComponent($rule);
                if (($r = $rule->parseUrl($this, $request, $pathInfo, $rawPathInfo)) !== false)
                    return isset($_GET[$this->routeVar]) ? $_GET[$this->routeVar] : $r;
            }
            if ($this->useStrictParsing)
                throw new CHttpException(404, Yii::t('yii', 'Unable to resolve the request "{route}".', array('{route}' => $pathInfo)));
            else
                return $pathInfo;
        }
        elseif (isset($_GET[$this->routeVar]))
            return $_GET[$this->routeVar];
        elseif (isset($_POST[$this->routeVar]))
            return $_POST[$this->routeVar];
        else
            return '';
    }

    public function createUrl($route, $params = array(), $ampersand = '&') {
        unset($params[$this->routeVar]);
        foreach ($params as $i => $param)
            if ($param === null)
                $params[$i] = '';

        if (isset($params['#'])) {
            $anchor = '#' . $params['#'];
            unset($params['#']);
        } else
            $anchor = '';
        $route = trim($route, '/');
        foreach ($this->_rules as $i => $rule) {
            if (is_array($rule))
                $this->_rules[$i] = $rule = Yii::createComponent($rule);
            if (($url = $rule->createUrl($this, $route, $params, $ampersand)) !== false) {
                if ($rule->hasHostInfo)
                    return $url === '' ? $this->urlPrefix . '/' . $anchor : $this->urlPrefix . '/' . $url . $anchor;
                else
                    return $this->getBaseUrl() . '/' . $url . $anchor;
            }
        }
        return $this->createUrlDefault($route, $params, $ampersand) . $anchor;
    }

    protected function createUrlDefault($route, $params, $ampersand) {
        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $url = rtrim($this->getBaseUrl() . '/' . $route, '/');
            if ($this->appendParams) {
                $url = rtrim($url . '/' . $this->createPathInfo($params, '/', '/'), '/');
                return $route === '' ? $url : $url . $this->urlSuffix;
            } else {
                if ($route !== '')
                    $url.=$this->urlSuffix;
                $query = $this->createPathInfo($params, '=', $ampersand);
                return $query === '' ? $url : $url . '?' . $query;
            }
        }
        else {
            $url = $this->getBaseUrl();
            if (!$this->showScriptName)
                $url.='/';
            if ($route !== '') {
                $url.='?' . $this->routeVar . '=' . $route;
                if (($query = $this->createPathInfo($params, '=', $ampersand)) !== '')
                    $url.=$ampersand . $query;
            }
            elseif (($query = $this->createPathInfo($params, '=', $ampersand)) !== '')
                $url.='?' . $query;
            return $url;
        }
    }

    function getBaseUrl() {
        if ($this->_baseUrl !== null)
            return $this->_baseUrl.'/'.$this->urlPrefix;
        else {
            if ($this->showScriptName)
                $this->_baseUrl = Yii::app()->getRequest()->getScriptUrl() . $this->urlPrefix;
            else
                $this->_baseUrl = Yii::app()->getRequest()->getBaseUrl();
            return $this->_baseUrl;
        }
    }

}
