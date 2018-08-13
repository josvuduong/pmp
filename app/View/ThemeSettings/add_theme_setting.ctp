<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/ThemeSettings/add_theme_setting"  method="post" accept-charset="utf-8">
        <input type="hidden" value="<?php echo @$data['ThemeSetting']['id'];?>" name="id">
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt Slide trang chủ (*)</label>
                    <div class="input text required">
                        <select name="slideindex">
                            <option>Lựa chọn album</option>
                            <?php if(!empty($listAlbum)){
                                foreach($listAlbum as $album){
                            ?>
                                <option value="<?php echo $album['Album']['id'];?>" <?php if($data['ThemeSetting']['slideindex'] == $album['Album']['id']){echo "selected";}?>><?php echo $album['Album']['name']?></option>
                                <?php }
                            }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt banner trang chủ (*)</label>
                    <div class="input text required">
                        <select name="slidebanner">
                            <option>Lựa chọn album</option>
                            <?php if(!empty($listAlbum)){
                                foreach($listAlbum as $album){
                            ?>
                                <option value="<?php echo $album['Album']['id'];?>" <?php if($data['ThemeSetting']['slidebanner'] == $album['Album']['id']){echo "selected";}?>><?php echo $album['Album']['name']?></option>
                                <?php }
                            }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt hotline 1 trang chủ (*)</label>
                    <div class="input text required">
                        <input type="text" name="phone1" value="<?php echo @$data['ThemeSetting']['phone1'];?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt hotline 2 trang chủ (*)</label>
                    <div class="input text required">
                        <input type="text" name="phone2" value="<?php echo @$data['ThemeSetting']['phone2'];?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt hotline 3 trang chủ (*)</label>
                    <div class="input text required">
                        <input type="text" name="phone3" value="<?php echo @$data['ThemeSetting']['phone3'];?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Cài đặt hotline 4 trang chủ (*)</label>
                    <div class="input text required">
                        <input type="text" name="phone4" value="<?php echo @$data['ThemeSetting']['phone4'];?>" class="form-control">
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