<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class CommonComponent extends Component
{
    public $components = array('Session');

    public function checkLoginAdmin()
    {
        $user = $this->Session->read('Auth.User.user_id');
        if (!empty($user)) {
            return True;
        } else {
            return False;
        }
    }

    public function __send($to, $subject, $template, $vars = array()) {
        $email = new CakeEmail();
        $email->template($template, 'mail_layout');
        $email->viewVars($vars);
        $email->emailFormat('html');
        $email->from(array('no.reply.taxigo@gmail.com'=> 'TaxiGo System'));
        $email->to($to);
        $email->subject($subject);
        $email->send($vars);
    }
    public function stripUnicode($str){
        if (!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i",$nonUnicode,$str);
            return $str;
        }
    }
    public function getCityByApiMap($address){
        $result = '';
        $prepAddr = str_replace(' ', '+',$this->stripUnicode($address));
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&language=vi&region=vi');
        $output = json_decode($geocode);
        if(!empty($output->results[0])){
            $count_result = count($output->results[0]->address_components);
            for ($i = 0; $i < $count_result; $i++) {
                $count_type = count($output->results[0]->address_components[$i]->types);
                for ($j = 0; $j < $count_type; $j++) {
                    if($output->results[0]->address_components[$i]->types[$j] == 'administrative_area_level_1'){
                        $result = $output->results[0]->address_components[$i]->long_name;
                        break;
                    }
                }
            }
            return $result;
        }
    }
    
    public function listCity(){
        $data = array(
            'City'=>array(
                '1'=>array('id'=>1,'name'=>'Hà Nội'),
                '2'=>array('id'=>2,'name'=>'Sân Bay Nội Bài'),
                '3'=>array('id'=>3,'name'=>'Hà Nam'),
                '4'=>array('id'=>4,'name'=>'Nam Định'),
                '5'=>array('id'=>5,'name'=>'Ninh Bình'),
                '6'=>array('id'=>6,'name'=>'Thái Bình'),
                '7'=>array('id'=>7,'name'=>'Hải Dương'),
                '8'=>array('id'=>8,'name'=>'Hải Phòng'),
                '9'=>array('id'=>9,'name'=>'Bắc Ninh'),
                '10'=>array('id'=>10,'name'=>'Bắc Giang'),
                '11'=>array('id'=>11,'name'=>'Thái Nguyên'),
                '12'=>array('id'=>12,'name'=>'Tuyên Quang'),
                '13'=>array('id'=>13,'name'=>'Hưng Yên'),
                '14'=>array('id'=>14,'name'=>'Thanh Hoá'),
                '15'=>array('id'=>15,'name'=>'Vĩnh Phúc'),
                '16'=>array('id'=>16,'name'=>'Phú Thọ'),
                '17'=>array('id'=>17,'name'=>'Yên Bái'),
                '18'=>array('id'=>18,'name'=>'Lào Cai'),
                '19'=>array('id'=>19,'name'=>'Hòa Bình'),
                '20'=>array('id'=>20,'name'=>'Quảng Ninh'),
                '21'=>array('id'=>21,'name'=>'An Giang'),
                '22'=>array('id'=>22,'name'=>'Bà Rịa - Vũng Tàu'),
                '23'=>array('id'=>23,'name'=>'Bắc Kạn'),
                '24'=>array('id'=>24,'name'=>'Bến Tre'),
                '25'=>array('id'=>25,'name'=>'Bình Định'),
                '26'=>array('id'=>26,'name'=>'Bình Dương'),
                '27'=>array('id'=>27,'name'=>'Bình Phước'),
                '28'=>array('id'=>28,'name'=>'Bình Thuận'),
                '29'=>array('id'=>29,'name'=>'Cà Mau'),
                '30'=>array('id'=>30,'name'=>'Cao Bằng'),
                '31'=>array('id'=>31,'name'=>'Đắk Lắk'),
                '32'=>array('id'=>32,'name'=>'Đắk Nông'),
                '33'=>array('id'=>33,'name'=>'Điện Biên'),
                '34'=>array('id'=>34,'name'=>'Đồng Nai'),
                '35'=>array('id'=>35,'name'=>'Đồng Tháp'),
                '36'=>array('id'=>36,'name'=>'Gia Lai'),
                '37'=>array('id'=>37,'name'=>'Hà Giang'),
                '38'=>array('id'=>38,'name'=>'Hà Tĩnh'),
                '39'=>array('id'=>39,'name'=>'Hậu Giang'),
                '40'=>array('id'=>40,'name'=>'Khánh Hòa'),
                '41'=>array('id'=>41,'name'=>'Kiên Giang'),
                '42'=>array('id'=>42,'name'=>'Kon Tum'),
                '43'=>array('id'=>43,'name'=>'Lai Châu'),
                '44'=>array('id'=>44,'name'=>'Lâm Đồng'),
                '45'=>array('id'=>45,'name'=>'Lạng Sơn'),
                '46'=>array('id'=>46,'name'=>'Long An'),
                '47'=>array('id'=>47,'name'=>'Nghệ An'),
                '48'=>array('id'=>48,'name'=>'Quảng Bình'),
                '49'=>array('id'=>49,'name'=>'Quảng Nam'),
                '50'=>array('id'=>50,'name'=>'Quảng Ngãi'),
                '51'=>array('id'=>51,'name'=>'Quảng Trị'),
                '52'=>array('id'=>52,'name'=>'Sóc Trăng'),
                '53'=>array('id'=>53,'name'=>'Sơn La'),
                '54'=>array('id'=>54,'name'=>'Tây Ninh'),
                '55'=>array('id'=>55,'name'=>'Ninh Thuận'),
                '56'=>array('id'=>56,'name'=>'Thừa Thiên Huế'),
                '57'=>array('id'=>57,'name'=>'Tiền Giang'),
                '58'=>array('id'=>58,'name'=>'Trà Vinh'),
                '59'=>array('id'=>59,'name'=>'Vĩnh Long'),
                '60'=>array('id'=>60,'name'=>'Phú Yên'),
                '61'=>array('id'=>61,'name'=>'Cần Thơ'),
                '62'=>array('id'=>62,'name'=>'Đà Nẵng'),
                '63'=>array('id'=>63,'name'=>'Hồ Chí Minh'),
                '64'=>array('id'=>64,'name'=>'Bạc Liêu'),
            )
        );
        return $data;
    }
    public function createSlug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );
        $options = array_merge($defaults, $options);
        $char_map = array(
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            '©' => '(c)',
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);
        $kq =  $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
        foreach($unicode as $not_stamped=>$stamped) {
            $arr_key=explode("|",$stamped);
            $kq = str_replace($arr_key,$not_stamped,$kq);
        }
        return $kq;
    }

    //đệ quy category
    public function cate_parent($data,$parent=0,$str="",$select=0){
        foreach($data as $item){
            $id = $item['id'];
            $name = $item['name'];
            if($item['parent_id'] == $parent){
                if($select!=0 && $id == $select ){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                cate_parent($data,$id,$str."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;",$select);
            }
        }
    }

}
?>