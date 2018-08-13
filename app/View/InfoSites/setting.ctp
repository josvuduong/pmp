<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/infoSites/setting"  method="post" accept-charset="utf-8">
            <button class="btn btn-primary" id="submit" type="submit" style="padding: 8px 26px;margin-bottom: 15px;">Lưu</button>
            <input name="id" type="hidden" value="<?php if(isset($data['InfoSite']['id'])){echo $data['InfoSite']['id'];}?>">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Cài đặt chung</a></li>
                <li><a data-toggle="tab" href="#menu1">Cài đặt SMTP</a></li>
            </ul>
            <div class="tab-content" style="margin-top: 15px;">
                <div id="home" class="tab-pane fade in active">
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Tên website (*)</label>
                            <div class="input text">
                                <input name="title" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['title'])){echo $data['InfoSite']['title'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Tên miền (*)</label>
                            <div class="input text">
                                <input name="domain" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['domain'])){echo $data['InfoSite']['domain'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <div class="input text">
                                <textarea class="form-control" name="address"><?php if(isset($data['InfoSite']['address'])){echo $data['InfoSite']['address'];}?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input text">
                                <input name="email" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['email'])){echo $data['InfoSite']['email'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <div class="input text">
                                <input name="phone" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['phone'])){echo $data['InfoSite']['phone'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Số hotline</label>
                            <div class="input text">
                                <input name="fax" class="form-control" type="number" required="required" value="<?php if(isset($data['InfoSite']['fax'])){echo $data['InfoSite']['fax'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Tài khoản email server (*)</label>
                            <div class="input text">
                                <input name="server_email" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['server_email'])){echo $data['InfoSite']['server_email'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Mật khẩu (*)</label>
                            <div class="input text">
                                <input name="password_email" class="form-control" type="password" required="required" value="<?php if(isset($data['InfoSite']['password_email'])){echo $data['InfoSite']['password_email'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Tên hiển thị (*)</label>
                            <div class="input text">
                                <input name="display_email" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['display_email'])){echo $data['InfoSite']['display_email'];}?>" placeholder="Taxigo">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Phương thức (*)</label>
                            <div class="input text">
                                <input name="server_mail" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['server_mail'])){echo $data['InfoSite']['server_mail'];}?>" placeholder="ssl://smtp.gmail.com">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label>Cổng kết nối (*)</label>
                            <div class="input text">
                                <input name="port_mail" class="form-control" type="text" required="required" value="<?php if(isset($data['InfoSite']['port_mail'])){echo $data['InfoSite']['port_mail'];}?>" placeholder="465">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>