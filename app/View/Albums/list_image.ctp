<div class="row accounts form white">

    <div class="col-xs-12 col-md-8">
        <form action="/albums/list_image?idAlbum=<?php echo $_GET['idAlbum'];?>"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['ImagesAlbum']['id'])){echo $data['ImagesAlbum']['id'];}?>">
            <div class="form-group col-md-6">
                <label>Ảnh</label>
                <div class="input text">
                    <?php $this->Function->showUploadFile('image','image',@$data['ImagesAlbum']['image'],1);?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-6">
                <label>Tên ảnh</label>
                <div class="input text">
                    <input name="title" value="<?php echo @$data['ImagesAlbum']['title'];?>" type="text" class="form-control">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-6">
                <label>Mô tả ảnh</label>
                <div class="input text">
                    <textarea class="form-control" rows="4" name="description"><?php echo @$data['ImagesAlbum']['description'];?></textarea>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-6">
                <label></label>
                <button style="margin-top: 26px;" class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
            </div>
        </form>
        <div class="content-auto">
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Lựa chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($listData)){
                    foreach ($listData as $key=>$value){
                        ?>
                        <tr>
                            <td style="width: 7%;"><?php echo $key+1;?></td>
                            <td style="word-break: break-all;"><img src="<?php echo $value['ImagesAlbum']['image'];?>" style="width: 70px;height: 70px;"></td>
                            <td style="width: 29%;">
                                <a href="/Albums/list_image?idAlbum=<?php echo $_GET['idAlbum'];?>&&idImage=<?php echo @$value['ImagesAlbum']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                <a href="/Albums/delete_image?idAlbum=<?php echo $_GET['idAlbum'];?>&&idImage=<?php echo @$value['ImagesAlbum']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
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