<?php
App::uses('AppController', 'Controller');
class FeedbacksController extends AppController
{
    public $uses = array('Feedback');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_feedback($id = null){
        $this->set('title_for_layout', 'Nhận xét của khách hàng');
        if($this->Common->checkLoginAdmin()){
            //list data
            $listData = $this->Feedback->find('all');
            $this->set('listData',$listData);
            if(!empty($id)){
                $data  = $this->Feedback->find('first',array('conditions'=>array('Feedback.id'=>$id)));
                $this->set('data',$data);
            }
            if ($this->request->is('post')) {

                $id_feedback = $this->request->data['id'];
                if(empty($id_feedback)){
                    //add
                    if($this->Feedback->save($this->request->data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                    }
                }else{
                    //edit
                    if($this->Feedback->save($this->request->data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                    }

                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_feedback($id = null){
        if($this->Common->checkLoginAdmin()){
            if(isset($id)){
                if($this->Feedback->delete(array('CarType.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'feedbacks','action' => 'list_feedback'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}