<?php

namespace Sifoni\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sifoni\Engine;
use Symfony\Component\Security\Csrf\CsrfToken;

class Base {
    protected $app = null;
    protected $request = null;
    protected $response = null;

    public function __construct() {
        $this->app = $app = Engine::getInstance()->getApp();
        $this->request = $app['request'];
        $this->response = new Response(null, Response::HTTP_OK, array());
    }

    public function setTtl($time) {
        $this->response->setTtl($time);
    }

    public function setCache($time) {
        $this->response->setMaxAge($time);
    }

    public function setSharedCache($time) {
        $this->response->setSharedMaxAge($time);
    }

    public function render($view, array $parameters = array()) {
        return $this->app->render($view, $parameters, $this->response);
    }

    public function json($data = array(), $status = Response::HTTP_OK, array $headers = array()) {
        return $this->app->json($data, $status, $headers);
    }

    public function redirect($named_route, $params = array()) {
        return $this->app->redirect($this->app->url($named_route, $params));
    }

    public function redirectWithFlash($named_route, $params = array(), $flash_type, $flash_content) {
        $this->app['session']->getFlashBag()->add('message', array(
            'type' => $flash_type,
            'content' => $flash_content
        ));

        return $this->app->redirect($this->app->url($named_route, $params));
    }

    public function getPostData() {
        return $this->request->request->all();
    }

    public function isFormValid($action = '', $token_name = '_token') {
        $token = new CsrfToken($action, $this->request->get($token_name));
        return $this->app['form.csrf_provider']->isTokenValid($token);
    }

    public function isPostRequest() {
        return (strtolower($_SERVER['REQUEST_METHOD']) == 'post');
    }

    public function isLogged() {
        if (empty($_SESSION['logged'])) {
            return false;
        }
        
        return $_SESSION['logged'];
    }
}
