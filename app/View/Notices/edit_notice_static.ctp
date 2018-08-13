<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/notices/edit_notice_static"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['NoticeStatic']['id'])){echo $data['NoticeStatic']['id'];}?>">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="<?php if(isset($data['NoticeStatic']['title'])){echo $data['NoticeStatic']['title'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả tiêu đề (*)</label>
                    <div class="input text">
                        <input name="alt" class="form-control" type="text" required="required" value="<?php if(isset($data['NoticeStatic']['alt'])){echo $data['NoticeStatic']['alt'];}?>"> (Tạo đường dẫn Seo)
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
                            <option value="0" <?php if(isset($data['NoticeStatic']['lock']) && $data['NoticeStatic']['lock'] == 0){echo "selected";}?> >Kích hoạt</option>
                            <option value="1" <?php if(isset($data['NoticeStatic']['lock']) && $data['NoticeStatic']['lock'] == 1){echo "selected";}?>>Khóa</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <div class="input text">
                        <input name="author" class="form-control" type="text"  value="<?php if(isset($data['NoticeStatic']['author'])){echo $data['NoticeStatic']['author'];}?>">
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <?php $this->Function->showUploadFile('image','image',@$data['NoticeStatic']['image'],1);?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <div class="input text">
                        <textarea name="description" class="form-control" rows="8"><?php if(isset($data['NoticeStatic']['description'])){echo $data['NoticeStatic']['description'];}?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả nội dung Seo</label>
                    <div class="input text">
                        <textarea name="descriptionSeo" class="form-control" rows="3"><?php if(isset($data['NoticeStatic']['descriptionSeo'])){echo $data['NoticeStatic']['descriptionSeo'];}?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword Seo</label>
                    <div class="input text">
                        <input type="text" name="keywordSeo" class="form-control" value="<?php if(isset($data['NoticeStatic']['keywordSeo'])){echo $data['NoticeStatic']['keywordSeo'];}?>">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <div class="input text required">
                        <?php $this->Function->showEditorInput('content','content',@$data['NoticeStatic']['content']);?>
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