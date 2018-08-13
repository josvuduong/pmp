<?php
App::uses('AppController', 'Controller');
class ContactsController extends AppController
{
    public $uses = array('Contact');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_contact(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Quản lý liên hệ từ khách hàng');
            $listData = $this->Contact->find('all');
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 12;
            $count_data = count($listData);
            $total_page = ceil($count_data/$limit);
            if($current_page >$total_page){
                $current_page = $total_page;
            }elseif($current_page < 1){
                $current_page = 1;
            }
            $offset = ($current_page - 1) * $limit;

            $listData = $this->Contact->find('all',array(
                'limit' => $limit,
                'offset'=>$offset,
                'order' => array('id' => 'desc'),
            ));

            $this->set("total_page",$total_page);
            $this->set("current_page",$current_page);
            $this->set('listData',$listData);
        }else{
            return $this->redirect('/admin');
        }
    }

}