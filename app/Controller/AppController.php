<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $uses = array('User');

     public $components = array('Session');
    public function beforeFilter()
    {
        $this->response->disableCache();
    }


}
