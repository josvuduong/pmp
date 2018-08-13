<?php
App::uses('AppHelper', 'View/Helper');
App::import('Model', 'CarType');
App::import('Model', 'Notice');
App::import('Model', 'Feedback');
App::import('Model', 'InfoSite');
App::import('Model', 'CatLongWay');
App::import('Model', 'ThemeSetting');
App::uses('ComponentCollection', 'Controller');
App::uses("CommonComponent", "Controller/Component");
class FunctionHelper extends AppHelper {

    var $components = array('Common');
    public function getThemeSetting(){
        $this->ThemeSetting = new ThemeSetting();
        $data = $this->ThemeSetting->find('first');
        return $data;
    }
    public function getUrlHome(){
        return $_SERVER['HTTP_HOST'];
    }
    public function getUrlTagNotice($slug){
        $url = '/tin-tuc/itemlist/tag/'.$slug;
        return $url;
    }

    public function getUrlProduct($slug){
        $url = '/chi-tiet-san-pham/'.$slug;
        return $url;
    }
    public function getUrlNotice($slug){
        $url = '/tin-tuc/item/'.$slug;
        return $url;
    }

    public function getAlbum($id){
        $this->Album = new Album();
        $data = $this->Album->find('first',array('conditions'=>array('Album.status'=>1,'Album.id'=>$id)));
        return $data;
    }
    public function listNewNotices($limit){
        $this->Notice = new Notice();
        $data = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0),'order' => array('Notice.id' => 'desc'),'limit'=>$limit,'offset'=>0));
        return $data;
    }
    public function listFeedbacks(){
        $this->Feedback = new Feedback();
        $data = $this->Feedback->find('all');
        return $data;
    }
    public function getInfoSite(){
        $this->InfoSite = new InfoSite();
        $data = $this->InfoSite->find('first');
        return $data;
    }

    public function showUploadFile($idInput = '', $nameInput = '', $value = '', $number = ''){
        echo '<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
              <script type="text/javascript">
              function BrowseServer'.$number.'() {
                var finder = new CKFinder();
                finder.selectActionFunction = SetFileField'.$number.';
                finder.popup();
              }
              function SetFileField'.$number.'(fileUrl) {
                document.getElementById("'.$idInput.'").value = fileUrl;
              }
              </script>
              </script>';
        echo '
            <input style="padding:4px 0px;width:300px;border: 1px solid #dadada;" name="'.$nameInput.'" type="text"  value="'.$value.'" id="'.$idInput.'" >
            <input style="padding:3px 10px;" type="button" value="Upload" onclick="BrowseServer'.$number.'();" style="float: left"/>
        ';
    }

    public function showEditorInput($idEditor = '', $nameEditor = '', $content = ''){
        echo '<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
              <textarea style="width: 100%;" name="'.$nameEditor.'" id="'.$idEditor.'">'.$content.'</textarea>
              <script type="text/javascript">CKEDITOR.replace('.$idEditor.');</script>
        ';
    }



}

?>

