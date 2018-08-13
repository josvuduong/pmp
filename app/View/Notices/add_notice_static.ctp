<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/notices/add_notice_static"  method="post" accept-charset="utf-8">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả tiêu đề (*)</label>
                    <div class="input text">
                        <input name="alt" class="form-control" type="text" required="required" value=""> (Tạo đường dẫn Seo)
                    </div>
                </div>
                <div class="form-group">
                    <label>Tag (tag1,tag2)</label>
                    <div class="input text">
                        <input name="tag" class="form-control" type="text"  value="">
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float: left;">
                    <label>Trạng thái bài viết</label>
                    <div class="input text">
                        <select name="lock" class="form-control">
                            <option value="0" selected >Kích hoạt</option>
                            <option value="1">Khóa</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <div class="input text">
                        <input name="author" class="form-control" type="text" value="">
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <?php $this->Function->showUploadFile('image','image','',1);?>

                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <div class="input text">
                        <textarea name="description" class="form-control" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả nội dung Seo</label>
                    <div class="input text">
                        <textarea name="descriptionSeo" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword Seo</label>
                    <div class="input text">
                        <input type="text" name="keywordSeo" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <div class="input text required">
                        <?php $this->Function->showEditorInput('content','content','');?>
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