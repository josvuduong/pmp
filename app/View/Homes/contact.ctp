<?php echo $this->element('banner')?>
<section id="content" class="   no-left no-right  block com_contact">
    <div class="container">
        <div class="row">
            <div id="content_main" class=" col-xs-12">
                <div class="wrap-contact-form">
                    <div class="container">
                        <div class="row">
                            <form id="contact-form" action="/lien-he" method="post" class="form-validate form-horizontal well">
                                <fieldset>
                                    <legend class="col-sm-4 col-xs-12"><span>Liên Hệ</span></legend>
                                    <div class="list-form col-sm-8 col-xs-12">
                                        <h3>Tin nhắn của bạn</h3>
                                        <input type="hidden" value="<?php echo date('d/m/Y h:i');?>" name="create_at">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" name="guest_name" value="" class="required" size="30" required="required" aria-required="true" placeholder="Họ và tên"></div>
                                        </div>
                                        <div class="control-group">
                                            <div class="control-label">
                                                <label  class="hasTooltip required" >phone</label>
                                            </div>
                                            <div class="controls"><input type="text" name="guest_phone" class="validate-email required" id="jform_contact_email" value="" size="30" autocomplete="email" required="required" aria-required="true" placeholder="Số điện thoại"></div>
                                        </div>
                                        <div class="control-group">
                                            <div class="control-label">
                                                <label  class="hasTooltip required" >Địa chỉ</label>
                                            </div>
                                            <div class="controls"><input type="text" name="guest_address" id="jform_contact_emailmsg" value="" class="required" size="60"  aria-required="true" placeholder="Địa chỉ"></div>
                                        </div>
                                        <div class="control-group">
                                            <div class="control-label">
                                                <label class="hasTooltip required">Yêu cầu</label>
                                            </div>
                                            <div class="controls"><textarea name="guest_notes" id="jform_contact_message" cols="50" rows="10" class="required" aria-required="true"></textarea></div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button class="btn btn-primary validate" type="submit">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</section>