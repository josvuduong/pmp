<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <div class="content-auto">
            <table class="table table-hover" style="margin-top: 40px">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày gửi</th>
                    <th>Họ và tên khách</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
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
                    <td style="word-break: break-all;"><?php echo $value['Contact']['create_at'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Contact']['guest_name'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Contact']['guest_phone'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Contact']['guest_address'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['Contact']['guest_notes'];?></td>
                    <td style="width: 10%;">
                        <a href="/contacts/delete_contact/<?php echo $value['Contact']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                    </td>

                </tr>
                <?php }
                }?>
                </tbody>
            </table>
            <div class="k2_Pagination global_pagination">
                <ul class="pagination">
                    <?php
                    if($total_page>=1){
                    for ($i=1;$i<=$total_page;$i++){
                    if($i == $current_page){
                    echo '<li class="active"><span >'.$i.'</span></li>';
                    }else{
                    echo '<li><a title="'.$i.'" href="/contacts/list_contact?page='.$i.'" class="pagenav" >'.$i.'</a></li>';
                    }
                    }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>