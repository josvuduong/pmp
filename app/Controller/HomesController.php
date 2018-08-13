<?php

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');

class HomesController extends AppController
{
    public $uses = array('Contact','User','NoticeStatic','CatNotice','Notice','CatNoticeNotice','TagNotice','CatProduct','Product');
    var $components = array('Common');
    var $layout = 'home';

    public function detail_product($slug){
        $this->set('title_for_layout', 'Chi tiết sản phẩm');
        $product = $this->Product->find('first',array('conditions'=>array('Product.slug'=>$slug)));
        $product_other = $this->Product->find('all',array('conditions'=>array('Product.cat_product_id'=>$product['CatProduct']['id'],'Product.id !='=>$product['Product']['id']),'limit'=>8));
        pr($product_other);die;
        $this->set('product',$product);
    }
    public function list_product($slug){
        $this->set('title_for_layout', 'Danh sách sản phẩm');
        $listProduct = $this->CatProduct->find('all',array('conditions'=>array('CatProduct.slug'=>$slug),'order'=>array('CatProduct.id'=>'desc')));
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
        $count_data = count($listProduct);
        $total_page = ceil($count_data/$limit);
        if($current_page >$total_page){
            $current_page = $total_page;
        }elseif($current_page < 1){
            $current_page = 1;
        }
        $offset = ($current_page - 1) * $limit;

        $listProduct = $this->CatProduct->find('all',array(
            'conditions'=>array('CatProduct.slug'=>$slug),
            'limit' => $limit,
            'offset'=>$offset,
            'order'=>array('CatProduct.id'=>'desc')
        ));

        $this->set('listProduct',$listProduct);
    }
    public function news(){

        $this->set('title_for_layout', 'Thông tin dịch vụ đưa đón bằng Taxi Sân Bay Nội Bài - Hà Nội');

        $listNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0),'order' => array('Notice.id' => 'desc')));

        $listTag = $this->TagNotice->find('all',array('group'=>array('TagNotice.name')));

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        $limit = 12;

        $count_data = count($listNotice);

        $total_page = ceil($count_data/$limit);

        if($current_page >$total_page){

            $current_page = $total_page;

        }elseif($current_page < 1){

            $current_page = 1;

        }

        $offset = ($current_page - 1) * $limit;



        $listNotice = $this->Notice->find('all',array(

            'conditions'=>array('Notice.lock'=>0),

            'limit' => $limit,

            'offset'=>$offset,

            'order' => array('id' => 'desc'),

        ));

        $listHotNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0,'Notice.status'=>1),'order' => array('Notice.id' => 'desc')));

        $listCategory = $this->CatNotice->find('all');

        $this->set('listTag',$listTag);

        $this->set('listHotNotice',$listHotNotice);

        $this->set('listCategory',$listCategory);

        $this->set('listNotice',$listNotice);

        $this->set("total_page",$total_page);

        $this->set("current_page",$current_page);

    }

    public function tag_notice($slug){

        $this->set('title_for_layout', 'Thông tin dịch vụ đưa đón bằng Taxi Sân Bay Nội Bài - Hà Nội');

        $data = $this->TagNotice->find('all',array('conditions'=>array('TagNotice.slug'=>$slug)));

        $listNotice = array();

        if(!empty($data)){
            foreach ($data as $item){
                $notices = $this->Notice->find('first', array('conditions' => array('Notice.lock'=>0,'Notice.id' => $item['TagNotice']['notice_id'])));

                if(!empty($notices)){
                    array_push($listNotice,$notices);
                }

            }

        }

        $listHotNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0,'Notice.status'=>1),'order' => array('Notice.id' => 'desc')));

        $listCategory = $this->CatNotice->find('all');

        $listTag = $this->TagNotice->find('all',array('group'=>array('TagNotice.name')));

        $this->set('listTag',$listTag);

        $this->set('listHotNotice',$listHotNotice);

        $this->set('listCategory',$listCategory);

        $this->set('listNotice',$listNotice);

    }

    public function notice_static($slug){
        $data = $this->NoticeStatic->find('first',array('conditions'=>array('NoticeStatic.lock'=>0,'NoticeStatic.slug'=>$slug)));
        if(!empty($data)){
            $titleSeo = $data['NoticeStatic']['title'];
            $desciptionSeo =$data['NoticeStatic']['descriptionSeo'];
            $keyWordSeo =$data['NoticeStatic']['keywordSeo'];

            $this->set('title_for_layout', $data['NoticeStatic']['title']);

            $views = $data['NoticeStatic']['views'];

            $notice_id = $data['NoticeStatic']['id'];

            $views = $views+1;

            $update = array(

                'NoticeStatic' =>array(
                    'id'=>$notice_id,
                    'views'=>$views,
                ),

            );

            $this->NoticeStatic->save($update);

            $data = array(

                'title'=> $data['NoticeStatic']['title'],

                'alt'=> $data['NoticeStatic']['alt'],

                'lock'=> $data['NoticeStatic']['lock'],

                'status'=> $data['NoticeStatic']['status'],

                'slug'=> $data['NoticeStatic']['slug'],

                'image'=> $data['NoticeStatic']['image'],

                'author'=> $data['NoticeStatic']['author'],

                'create_at'=> $data['NoticeStatic']['create_at'],

                'content'=> $data['NoticeStatic']['content'],

                'description'=> $data['NoticeStatic']['description'],

                'views'=> $data['NoticeStatic']['views'],

            );
            $listTag = $this->TagNotice->find('all',array('group'=>array('TagNotice.name')));

            $listHotNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0,'Notice.status'=>1),'order' => array('Notice.id' => 'desc')));
            $listCategory = $this->CatNotice->find('all');

            $this->set('titleSeo',$titleSeo);

            $this->set('desciptionSeo',$desciptionSeo);

            $this->set('keyWordSeo',$keyWordSeo);
            $this->set('listTag',$listTag);
            $this->set('listHotNotice',$listHotNotice);
            $this->set('listCategory',$listCategory);
            $this->set('data',$data);
        }
    }

    public function notices($slug){

        if(!empty($slug)){

            $data = $this->Notice->find('first',array('conditions'=>array('Notice.lock'=>0,'Notice.slug'=>$slug)));
            if(!empty($data['CatNoticeNotice'])){
                foreach ($data['CatNoticeNotice'] as  $cat_notice) {
                    $cat_id = $cat_notice['cat_notice_id'];
                    $list_notice_other = $this->CatNoticeNotice->find('all',array('conditions'=>array('CatNoticeNotice.cat_notice_id'=>$cat_id),'limit'=>6));
                    $this->set('list_notice_other', $list_notice_other);
                }

            }
            if(!empty($data)){


                $titleSeo = $data['Notice']['title'];

                $desciptionSeo =$data['Notice']['descriptionSeo'];

                $keyWordSeo =$data['Notice']['keywordSeo'];

                $this->set('title_for_layout', $data['Notice']['title']);

                $views = $data['Notice']['views'];

                $notice_id = $data['Notice']['id'];

                $views = $views+1;

                $update = array(

                    'Notice' =>array(

                        'id'=>$notice_id,

                        'views'=>$views,

                    ),

                );

                $this->Notice->save($update);

                $data = array(

                    'title'=> $data['Notice']['title'],

                    'alt'=> $data['Notice']['alt'],

                    'lock'=> $data['Notice']['lock'],

                    'status'=> $data['Notice']['status'],

                    'slug'=> $data['Notice']['slug'],

                    'image'=> $data['Notice']['image'],

                    'author'=> $data['Notice']['author'],

                    'create_at'=> $data['Notice']['create_at'],

                    'content'=> $data['Notice']['content'],

                    'description'=> $data['Notice']['description'],

                    'views'=> $data['Notice']['views'],

                );

            }



            $listHotNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0,'Notice.status'=>1),'order' => array('Notice.id' => 'desc')));

            $listCategory = $this->CatNotice->find('all');

            $listTag = $this->TagNotice->find('all',array('group'=>array('TagNotice.name')));

            $this->set('titleSeo',$titleSeo);

            $this->set('desciptionSeo',$desciptionSeo);

            $this->set('keyWordSeo',$keyWordSeo);

            $this->set('listTag',$listTag);

            $this->set('listHotNotice',$listHotNotice);

            $this->set('listCategory',$listCategory);

            $this->set('data',$data);

        }

    }

    public function contact(){

        $this->set('title_for_layout', 'Liên hệ Taxi Sân Bay Nội Bài - Hà Nội giá rẻ (04)22.678.666');

        if ($this->request->is('post')) {

            if($this->Contact->save($this->request->data)){

                $guest_name = !empty($this->request->data['guest_name'])?$this->request->data['guest_name']:'';

                $guest_phone = !empty($this->request->data['guest_phone'])?$this->request->data['guest_phone']:'';

                $guest_address = !empty($this->request->data['guest_address'])?$this->request->data['guest_address']:'';

                $guest_notes = !empty($this->request->data['guest_notes'])?$this->request->data['guest_notes']:'';

                $to = 'xetienchuyen247@gmail.com';

                $subject = "[Liên hệ] TaxiGo.vn : ".$guest_name.' - '.$guest_phone;

                $template = 'message';

                $mailContent = "<b style='color:red;'>THÔNG TIN LIÊN HỆ</b><br/>";

                $mailContent .= "<b>Họ và tên khách hàng:</b> ".$guest_name."<br/>";

                $mailContent .= "<b>Số điện thoại:</b> ".$guest_phone."<br/>";

                $mailContent .= "<b>Địa chỉ: </b>".$guest_address."<br/>";

                $mailContent .= "<b>Nội dung khách gửi:</b> ".$guest_notes."<br/>";

                $this->Common->__send($to, $subject, $template,array('content' => $mailContent));

                $this->redirect('/lien-he-thanh-cong');

            }

        }

    }

    public function category($slug){

        if(!empty($slug)){

            $this->set('title_for_layout', 'Tin tức');

            $cat = $this->CatNotice->find('first',array('conditions'=>array('CatNotice.slug'=>$slug)));

            $listNotice = $this->CatNoticeNotice->find('all',array('conditions'=>array('CatNoticeNotice.cat_notice_id'=>$cat['CatNotice']['id'])));

            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

            $limit = 12;

            $count_data = count($listNotice);

            $total_page = ceil($count_data/$limit);

            if($current_page >$total_page){

                $current_page = $total_page;

            }elseif($current_page < 1){

                $current_page = 1;

            }

            $offset = ($current_page - 1) * $limit;

            $listNotice = $this->CatNoticeNotice->find('all',array(

                'conditions'=>array('cat_notice_id'=>$cat['CatNotice']['id']),

                'limit' => $limit,

                'offset'=>$offset,

                'order' => array('notice_id' => 'desc'),

            ));

            $listHotNotice = $this->Notice->find('all',array('conditions'=>array('Notice.lock'=>0,'Notice.status'=>1),'order' => array('Notice.id' => 'desc')));

            $listCategory = $this->CatNotice->find('all');

            $listTag = $this->TagNotice->find('all',array('group'=>array('TagNotice.name')));

            $this->set('listTag',$listTag);

            $this->set('listHotNotice',$listHotNotice);

            $this->set('listCategory',$listCategory);

            $this->set('listNotice',$listNotice);

            $this->set("total_page",$total_page);

            $this->set("current_page",$current_page);

        }

    }

    public function index(){

        $this->set('title_for_layout', 'Đệ nhất cổng');
        $listCatProduct = $this->CatProduct->find('all');
        $listNews = $this->Notice->find('all',array('limit'=>3,'order'=>array('Notice.id'=>'desc')));

        $this->set('listNews ',$listNews );
        $this->set('listCatProduct',$listCatProduct);

    }

    public function contact_success(){

        $this->set('title_for_layout', 'Giới thiệu Dịch Vụ Taxi Nội Bài Giá Rẻ - TaxiGo.vn');

    }
}





?>