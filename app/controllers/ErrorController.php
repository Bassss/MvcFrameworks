<?php

class ErrorController extends \Phalcon\Mvc\Controller


{
    public function show404Action()
    {
        $this->response->setStatusCode(404, 'Not Found, sucks mate');
        $this->view->pick('404/404');
    }
}

