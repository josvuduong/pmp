<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/notices/edit_notice"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['Notice']['id'])){echo $data['Notice']['id'];}?>">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="<?php if(isset($data['Notice']['title'])){echo $data['Notice']['title'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả tiêu đề (*)</label>
                    <div class="input text">
                        <input name="alt" class="form-control" type="text" required="required" value="<?php if(isset($data['Notice']['alt'])){echo $data['Notice']['alt'];}?>"> (Tạo đường dẫn Seo)
                    </div>
                </div>
                <div class="form-group">
                    <label>Tag (tag1,tag2)</label>
                    <?php
                        if(!empty($listTag)){
                            $chuoi = '';
                            foreach($listTag as $tag){
                                $chuoi .=$tag['TagNotice']['name'].',';
                            }
                        }
                    ?>
                    <div class="input text">
                        <input name="tag" class="form-control" type="text"  value="<?php if(!empty($chuoi)){echo rtrim($chuoi,',');}?>">
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float: left;">
                    <label>Trạng thái bài viết</label>
                    <div class="input text">
                        <select name="lock" class="form-control">
                            <option value="0" <?php if(isset($data['Notice']['lock']) && $data['Notice']['lock'] == 0){echo "selected";}?> >Kích hoạt</option>
                            <option value="1" <?php if(isset($data['Notice']['lock']) && $data['Notice']['lock'] == 1){echo "selected";}?>>Khóa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float: left;margin-left: 20px;">
                    <label>Đánh dấu nổi bật</label>
                    <div class="input text">
                        <select name="status" class="form-control">
                            <option value="0" <?php if(isset($data['Notice']['status']) && $data['Notice']['status'] == 0){echo "selected";}?> >Không</option>
                            <option value="1" <?php if(isset($data['Notice']['status']) && $data['Notice']['status'] == 1){echo "selected";}?>>Có</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <div class="input text">
                        <input name="author" class="form-control" type="text"  value="<?php if(isset($data['Notice']['author'])){echo $data['Notice']['author'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <?php $this->Function->showUploadFile('image','image',@$data['Notice']['image'],1);?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Chuyên mục tin tức (*)</label>
                    <div class="input text">
                        <?php
                        if(!empty($cat_notice_data)){
                            foreach ($cat_notice_data as $cat){
                                $checked ='';
                                foreach ($data['CatNoticeNotice'] as $cat_notice) {
                                    if($cat_notice['cat_notice_id'] == $cat['CatNotice']['id']){
                                        $checked = 'checked';
                                    }
                                }
                                echo '<input type="checkbox" name="cat_notice_id[]"   '.$checked.' value="'.$cat['CatNotice']['id'].'"> '.$cat['CatNotice']['name'].' ';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <div class="input text">
                        <textarea name="description" class="form-control" rows="8"><?php if(isset($data['Notice']['description'])){echo $data['Notice']['description'];}?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả nội dung Seo</label>
                    <div class="input text">
                        <textarea name="descriptionSeo" class="form-control" rows="3"><?php if(isset($data['Notice']['descriptionSeo'])){echo $data['Notice']['descriptionSeo'];}?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword Seo</label>
                    <div class="input text">
                        <input type="text" name="keywordSeo" class="form-control" value="<?php if(isset($data['Notice']['keywordSeo'])){echo $data['Notice']['keywordSeo'];}?>">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <div class="input text required">
                        <?php $this->Function->showEditorInput('content','content',@$data['Notice']['content']);?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">
                <button class="btn btn-primary" id="submit" type="submit">Lưu</button>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>