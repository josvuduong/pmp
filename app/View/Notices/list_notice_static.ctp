<div class="row white " style="background: #fff;padding: 20px 20px;">
    <div class="add-new">
        <a href="/notices/add_notice_static"><span class="btn btn-primary btndf_button">Thêm</span></a>
    </div>
    <div class="content-auto">
        <table class="table table-hover" style="margin-top: 40px">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Lượt xem</th>
                <th>Lựa chọn</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($data)){
                foreach ($data as $key=>$value){
            ?>
            <tr>
                <td style="width: 7%;"><?php echo $key+1;?></td>
                <td style="word-break: break-all;"><a target="_blank" href="<?php echo "/dich-vu-taxi-gia-re/item/".$value['NoticeStatic']['slug'];?>"><?php echo @$value['NoticeStatic']['title'];?></a></td>
                <td style="word-break: break-all;"><?php echo @$value['NoticeStatic']['views'];?></td>
                <td >
                    <a href="/notices/edit_notice_static/<?php echo @$value['NoticeStatic']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                    <a href="/notices/delete_notice_static/<?php echo $value['NoticeStatic']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
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
                            echo '<li><a title="'.$i.'" href="/notices/list_notice_static?page='.$i.'" class="pagenav" >'.$i.'</a></li>';
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>