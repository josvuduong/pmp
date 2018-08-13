<?php

App::uses('AppController', 'Controller');

class ThemeSettingsController extends AppController

{

    public $uses = array('ThemeSetting','Album');

    var $components = array('Common', 'Session');

    var $layout = 'admin';

    public function add_theme_setting($id = null){

        if ($this->Common->checkLoginAdmin()) {

            $this->layout = 'admin';

            $this->set('title_for_layout', 'Cài đặt giao diện');

            $data = $this->ThemeSetting->find('first',array('ThemeSetting.id'=>$id));
            $listAlbum = $this->Album->find('all');
            $this->set('listAlbum',$listAlbum);
            $this->set('data',$data);

            if ($this->request->is('post')) {
            
                if($this->ThemeSetting->save($this->request->data)){
                    $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');

                    $this->redirect(array('controller' => 'ThemeSettings','action' => 'add_theme_setting'));

                }else{

                    $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');

                    $this->redirect(array('controller' => 'ThemeSettings','action' => 'add_theme_setting'));

                }

            }

        }else{

            return $this->redirect('/admin');

        }

    }

}