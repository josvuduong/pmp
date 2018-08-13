<?php
App::uses('AppController', 'Controller');

class InfoSitesController extends AppController
{
    public $uses = array('User','InfoSite');
    var $components = array('Common');
    public function setting($id = null){

        if ($this->Common->checkLoginAdmin()) {
            $this->layout = 'admin';
            $this->set('title_for_layout', 'Cài đặt chung');
            $data = $this->InfoSite->find('first',array('InfoSite.id'=>$id));
            $this->set('data',$data);
            if ($this->request->is('post')) {
                if($this->InfoSite->save($this->request->data)){
                    $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'infoSites','action' => 'setting'));
                }else{
                    $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'infoSites','action' => 'setting'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}


?>