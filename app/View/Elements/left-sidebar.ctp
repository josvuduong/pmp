<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        if(!empty($_SERVER[ 'REQUEST_URI' ])){
            $url = $_SERVER[ 'REQUEST_URI' ];
        }
        ?>
        <ul class="fs-14 sidebar-menu">
            <li class="treeview <?php  if($url=='/dashboards/index'){echo 'active';}?>">
                <a href="/dashboards/index">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Dashboards</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/infoSites/setting'){echo 'active';}?>">
                <a href="/infoSites/setting">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Cài đặt chung</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/users/list_user' || $url=='/users/add'){echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Tài khoản</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/users/list_user">
                            <i class="fa fa-angle-right"></i>
                            <span>Danh sách tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users/add">
                            <i class="fa fa-angle-right"></i>
                            <span>Thêm tài khoản</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php  if($url=='/notices/list_notice' || $url=='/catNotices/list_cat_notice'){echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Quản lý tin tức</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/notices/list_notice">
                            <i class="fa fa-angle-right"></i>
                            <span>Danh sách tin tức</span>
                        </a>
                    </li>
                    <li>
                        <a href="/catNotices/list_cat_notice">
                            <i class="fa fa-angle-right"></i>
                            <span>Chuyên mục tin tức</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php  if($url=='/notices/list_notice_static'){echo 'active';}?>">
                <a href="/notices/list_notice_static">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Quản lý trang tĩnh</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/Albums/list_album'){echo 'active';}?>">
                <a href="/Albums/list_album">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Quản lý album ảnh</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/feedbacks/list_feedback'){echo 'active';}?>">
                <a href="/feedbacks/list_feedback">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Phản hồi khách hàng</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/Contacts/list_contact'){echo 'active';}?>">
                <a href="/contacts/list_contact">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Quản lý liên hệ</span>
                </a>
            </li>
            <li class="treeview <?php  if($url=='/themeSettings/add_theme_setting'){echo 'active';}?>">
                <a href="/themeSettings/add_theme_setting">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Cài đặt giao diện</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>