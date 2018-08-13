<?php
App::uses('AppController', 'Controller');
class NoticesController extends AppController
{
    public $uses = array('LongWay', 'CarTypePrice', 'RoadPrice','CatNotice','Notice','CatNoticeNotice','TagNotice','NoticeStatic');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_notice_static(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Danh sách bài viết tĩnh');
            $data = $this->NoticeStatic->find('all',array('order' => array('NoticeStatic.id' => 'desc')));
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 12;
            $count_data = count($data);
            $total_page = ceil($count_data/$limit);
            if($current_page >$total_page){
                $current_page = $total_page;
            }elseif($current_page < 1){
                $current_page = 1;
            }
            $offset = ($current_page - 1) * $limit;
            $data = $this->NoticeStatic->find('all',array(
                'limit' => $limit,
                'offset'=>$offset,
                'order' => array('NoticeStatic.id' => 'desc'),
            ));

            $this->set("total_page",$total_page);
            $this->set("current_page",$current_page);

            $this->set('data', $data);
        }else{
            return $this->redirect('/admin');
        }
    }
    public function edit_notice_static($id = null){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Sửa bài viết tĩnh');
            $data = $this->NoticeStatic->find('first',array('conditions'=>array('NoticeStatic.id'=>$id)));
            $listTag = $this->TagNotice->find('all',array('conditions'=>array('TagNotice.notice_id'=>$id,'TagNotice.type'=>1)));
            $this->set('listTag',$listTag);
            $this->set('data', $data);
            if ($this->request->is('post')) {
                $this->TagNotice->deleteAll(array('TagNotice.notice_id' => $this->request->data['id'],'TagNotice.type'=>1), true);
                if(!empty($this->request->data['alt'])){
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['alt']);
                }else{
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['title']);
                }
                $this->NoticeStatic->clear();
                if($this->NoticeStatic->save($this->request->data)){
                    $id_notice = $this->NoticeStatic->id;
                    if(!empty($this->request->data['tag'])){
                        $tags = $this->request->data['tag'];
                        $tags = explode(',',$tags);
                        if(!empty($tags)){
                            foreach ($tags as $tag){
                                if(!empty($tag)){
                                    $this->TagNotice->clear();
                                    $this->TagNotice->save(
                                        array(
                                            'TagNotice'=>array(
                                                'name'=>ucwords($tag),
                                                'slug'=>$this->Common->createSlug($tag),
                                                'notice_id'=>$id_notice,
                                                'type'=>1,
                                            )
                                        )
                                    );
                                }
                            }
                        }
                    }
                    $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice_static'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function add_notice_static(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm bài viết tĩnh');

            if ($this->request->is('post')) {
                if(!empty($this->request->data['alt'])){
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['alt']);
                }else{
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['title']);
                }
                $this->NoticeStatic->clear();
                if($this->NoticeStatic->save($this->request->data)){

                    $id_notice = $this->NoticeStatic->id;
                    if(!empty($this->request->data['tag'])){
                        $tags = $this->request->data['tag'];
                        $tags = explode(',',$tags);
                        if(!empty($tags)){
                            foreach ($tags as $tag){
                                if(!empty($tag)){
                                    $this->TagNotice->clear();
                                    $this->TagNotice->save(
                                        array(
                                            'TagNotice'=>array(
                                                'name'=>ucwords($tag),
                                                'slug'=>$this->Common->createSlug($tag),
                                                'notice_id'=>$id_notice,
                                                'type'=>1,
                                            )
                                        )
                                    );
                                }
                            }
                        }
                    }

                    $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice_static'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }

    public function add_notice(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm bài viết');
            $cat_notice_data = $this->CatNotice->find('all');
            $this->set('cat_notice_data',$cat_notice_data);

            if ($this->request->is('post')) {
                $cat_arr = !empty($this->request->data['cat_notice_id'])?$this->request->data['cat_notice_id']:'';
                    if(!empty($this->request->data['alt'])){
                        $this->request->data['slug'] = $this->Common->createSlug($this->request->data['alt']);
                    }else{
                        $this->request->data['slug'] = $this->Common->createSlug($this->request->data['title']);
                    }
                    $this->Notice->clear();
                    if($this->Notice->save($this->request->data)){

                        $id_notice = $this->Notice->id;
                        if(!empty($cat_arr)){
                            foreach ($cat_arr as $value){
                                $this->CatNoticeNotice->clear();
                                $this->CatNoticeNotice->save(
                                    array(
                                        'cat_notice_id' => $value,
                                        'notice_id' => $id_notice,
                                    )
                                );
                            }
                        }
                        if(!empty($this->request->data['tag'])){
                            $tags = $this->request->data['tag'];
                            $tags = explode(',',$tags);
                            if(!empty($tags)){
                                foreach ($tags as $tag){
                                    if(!empty($tag)){
                                        $this->TagNotice->clear();
                                        $this->TagNotice->save(
                                            array(
                                                'TagNotice'=>array(
                                                    'name'=>ucwords($tag),
                                                    'slug'=>$this->Common->createSlug($tag),
                                                    'notice_id'=>$id_notice,
                                                    'type'=>0,
                                                )
                                            )
                                        );
                                    }
                                }
                            }
                        }

                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'notices','action' => 'list_notice'));
                    }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function edit_notice($id = null){
        
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Sửa bài viết');
            $data = $this->Notice->find('first',array('conditions'=>array('Notice.id'=>$id)));
            $listTag = $this->TagNotice->find('all',array('conditions'=>array('TagNotice.notice_id'=>$id,'TagNotice.type'=>0)));
            $cat_notice_data = $this->CatNotice->find('all');
            $this->set('cat_notice_data',$cat_notice_data);
            $this->set('listTag',$listTag);
            $this->set('data', $data);
            if ($this->request->is('post')) {
                $this->TagNotice->deleteAll(array('TagNotice.notice_id' => $this->request->data['id'],'TagNotice.type'=>0), true);
                $this->CatNoticeNotice->deleteAll(array('CatNoticeNotice.notice_id' => $this->request->data['id']), true);
                if(!empty($this->request->data['cat_notice_id'])){
                    $cat_arr = $this->request->data['cat_notice_id'];
                }else{
                    $cat_arr = '';
                }
                if(!empty($this->request->data['alt'])){
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['alt']);
                }else{
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['title']);
                }
                $this->Notice->clear();
                if($this->Notice->save($this->request->data)){
                    $id_notice = $this->Notice->id;
                    if(!empty($cat_arr)){
                        foreach ($cat_arr as $value){
                            $this->CatNoticeNotice->clear();
                            $this->CatNoticeNotice->save(
                                array(
                                    'cat_notice_id' => $value,
                                    'notice_id' => $id_notice,
                                )
                            );
                        }
                    }
                    if(!empty($this->request->data['tag'])){
                        $tags = $this->request->data['tag'];
                        $tags = explode(',',$tags);
                        if(!empty($tags)){
                            foreach ($tags as $tag){
                                if(!empty($tag)){
                                    $this->TagNotice->clear();
                                    $this->TagNotice->save(
                                        array(
                                            'TagNotice'=>array(
                                                'name'=>ucwords($tag),
                                                'slug'=>$this->Common->createSlug($tag),
                                                'notice_id'=>$id_notice,
                                            )
                                        )
                                    );
                                }
                            }
                        }
                    }
                    $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function list_notice(){
        if ($this->Common->checkLoginAdmin()) {
        $this->set('title_for_layout', 'Danh sách bài viết');
        $data = $this->Notice->find('all',array('order' => array('Notice.id' => 'desc')));
        $cat_notice_data = $this->CatNotice->find('all');
        $this->set('cat_notice_data',$cat_notice_data);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
        $count_data = count($data);
        $total_page = ceil($count_data/$limit);
        if($current_page >$total_page){
            $current_page = $total_page;
        }elseif($current_page < 1){
            $current_page = 1;
        }
        $offset = ($current_page - 1) * $limit;
        $data = $this->Notice->find('all',array(
            'limit' => $limit,
            'offset'=>$offset,
            'order' => array('Notice.id' => 'desc'),
        ));

        $this->set("total_page",$total_page);
        $this->set("current_page",$current_page);

        $this->set('data', $data);
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_notice_static($id = null){
        if ($this->Common->checkLoginAdmin()) {
            if(isset($id)){
                if($this->NoticeStatic->delete(array('NoticeStatic.id' => $id), true)){
                    $this->TagNotice->deleteAll(array('TagNotice.notice_id' => $this->request->data['id'],'TagNotice.type'=>1), true);
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice_static'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice_static'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_notice($id = null){
        if ($this->Common->checkLoginAdmin()) {
            if(isset($id)){
                if($this->Notice->delete(array('Notice.id' => $id), true)){
                    $this->TagNotice->deleteAll(array('TagNotice.notice_id' => $this->request->data['id'],'TagNotice.type'=>0), true);
                    $this->CatNoticeNotice->deleteAll(array('CatNoticeNotice.notice_id' => $id), true);
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'notices','action' => 'list_notice'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}