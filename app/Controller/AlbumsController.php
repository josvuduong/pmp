<?php
App::uses('AppController', 'Controller');
class AlbumsController extends AppController
{
    public $uses = array('Album','ImagesAlbum');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_album($id=null){
        if($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Album ảnh');
            $listData = $this->Album->find('all');
            $this->set('listData', $listData);
            if(!empty($id)){
                $data  = $this->Album->find('first',array('conditions'=>array('Album.id'=>$id)));
                $this->set('data',$data);
            }
            if ($this->request->is('post')) {
                $this->request->data['slug'] = $this->Common->createSlug($this->request->data['name']);
                $id_album = $this->request->data['id'];
                if(empty($id_album)){
                    //add
                    if($this->Album->save($this->request->data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                    }
                }else{
                    //edit
                    if($this->Album->save($this->request->data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                    }

                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_image(){
        if ($this->Common->checkLoginAdmin()) {

            $id = !empty($_GET['idImage'])?$_GET['idImage']:'';
            if(isset($id)){
                if($this->ImagesAlbum->delete(array('ImagesAlbum.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_album($id = null){
        if ($this->Common->checkLoginAdmin()) {
            if(isset($id)){
                if($this->Album->delete(array('Album.id' => $id), true)){
                    $this->ImagesAlbum->deleteAll(array('ImagesAlbum.album_id' => $id), false);
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'Albums','action' => 'list_album'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function list_image(){
        if($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Ảnh của album');
            $id_album = !empty($_GET['idAlbum'])?$_GET['idAlbum']:'';
            $listData = $this->ImagesAlbum->find('all',array('conditions'=>array('ImagesAlbum.album_id'=>$id_album)));
            $this->set('listData', $listData);
            $id_image = !empty($_GET['idImage'])?$_GET['idImage']:'';
            if(!empty($id_image)){
                $data  = $this->ImagesAlbum->find('first',array('conditions'=>array('ImagesAlbum.id'=>$id_image)));
                $this->set('data',$data);
            }
            if ($this->request->is('post')) {
                $id_image = $this->request->data['id'];
                if(empty($id_image)){
                    //add
                    $this->request->data['album_id'] = $id_album;
                    if($this->ImagesAlbum->save($this->request->data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                    }
                }else{
                    $this->request->data['album_id'] = $id_album;
                    //edit
                    if($this->ImagesAlbum->save($this->request->data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'Albums','action' => 'list_image?idAlbum='.$_GET['idAlbum']));
                    }

                }
            }
        }else{
            return $this->redirect('/admin');
        }


    }

}
?>