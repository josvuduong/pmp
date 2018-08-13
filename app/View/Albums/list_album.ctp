<div class="row accounts form white">

    <div class="col-xs-12 col-md-8">
        <form action="/albums/list_album"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['Album']['id'])){echo $data['Album']['id'];}?>">
            <div class="form-group col-md-6">
                <label>Tên chuyên mục (*)</label>
                <div class="input text">
                    <input name="name" class="form-control" type="text" required="required" value="<?php if(isset($data['Album']['name'])){echo $data['Album']['name'];}?>" placeholder="Nhập tên album">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Ảnh minh họa</label>
                <div class="input text">
                    <?php $this->Function->showUploadFile('image','image',@$data['Album']['image'],1);?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-6">
                <label>Trạng thái albums</label>
                <div class="input text">
                    <select name="status" class="form-control" >
                        <option value="1">Kích hoạt</option>
                        <option value="0">Khóa</option>
                    </select>
                </div>
            </div>
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
                    <th>Tên album</th>
                    <th>Thêm ảnh</th>
                    <th>Trạng thái</th>
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
                            <td style="word-break: break-all;"><?php echo $value['Album']['name'];?></td>
                            <td style="word-break: break-all;"><a href="/Albums/list_image?idAlbum=<?php echo $value['Album']['id'];?>">Thêm ảnh vào album</a></td>
                            <td style="word-break: break-all;">
                                <?php
                                    if($value['Album']['status'] == 1){
                                        echo "Kích hoạt";
                                    }else{
                                        echo "Khóa";
                                    }
                                ?>
                            </td>
                            <td style="width: 29%;">
                                <a href="/Albums/list_album/<?php echo @$value['Album']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                <a href="/Albums/delete_album/<?php echo $value['Album']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
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