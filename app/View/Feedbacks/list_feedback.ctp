<div class="row accounts form white">

    <div class="col-xs-12 col-md-12">
        <form action="/feedbacks/list_feedback"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['Feedback']['id'])){echo $data['Feedback']['id'];}?>">
            <div class="form-group col-md-3">
                <label>Tên khách hàng(*)</label>
                <div class="input text">
                    <input name="full_name" class="form-control" type="text" required="required" value="<?php if(isset($data['Feedback']['full_name'])){echo $data['Feedback']['full_name'];}?>" >
                </div>
            </div>
            <div class="form-group col-md-3">
                <label>Vị trí chức vụ</label>
                <div class="input text">
                    <input name="position" class="form-control" type="text" required="required" value="<?php if(isset($data['Feedback']['position'])){echo $data['Feedback']['position'];}?>" >
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Avartar</label>
                <div class="input text">
                    <?php $this->Function->showUploadFile('avatar','avatar',@$data['Feedback']['avatar'],1);?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-9">
                <label>Nội dung nhận xét</label>
                <div class="input text">
                    <textarea class="form-control" name="content" rows="10"><?php if(isset($data['Feedback']['content'])){echo $data['Feedback']['content'];}?></textarea>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">
                <button class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
            </div>
        </form>
        <div class="content-auto">
            <table class="table table-hover" style="margin-top: 40px">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Avatar</th>
                    <th>Khách hàng</th>
                    <th>Chức vụ</th>
                    <th>Nội dung</th>
                    <th>Lựa chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($listData)){
                    foreach ($listData as $key=>$value){
                ?>
                <tr>
                    <td style="width: 2%;"><?php echo $key+1;?></td>
                    <td style="word-break: break-all;"><img src="<?php echo $value['Feedback']['avatar'];?>" style="width: 100px;height: 100px;"></td>
                    <td style="word-break: break-all;"><?php echo $value['Feedback']['full_name'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Feedback']['position'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Feedback']['content'];?></td>
                    <td style="width: 22%;">
                        <a href="/feedbacks/list_feedback/<?php echo @$value['Feedback']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                        <a href="/feedbacks/delete_feedback/<?php echo $value['Feedback']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                    </td>

                </tr>
                <?php }
                }?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>