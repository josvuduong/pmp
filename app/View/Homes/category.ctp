<?php echo $this->element('banner')?>
<section id="content" class="no-left  block com_k2" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <div id="content_main" class="col-lg-9 col-md-8  col-xs-12">
                <div id="system-message-container">
                </div>
                <div id="yt_component">
                    <!-- Start K2 Category Layout -->
                    <div id="k2Container" class="itemListView ">
                        <!-- Blocks for current category and subcategories -->
                        <div class="itemListCategoriesBlock">
                        </div>
                        <!-- Item list -->
                        <div class="itemList">
                            <!-- Primary items -->
                            <div id="itemListPrimary">
                                <?php if(!empty($listNotice)){
                                    foreach ($listNotice as $notice){
                                        ?>
                                        <div class="itemContainer itemContainerLast" style="width:100.0%;">
                                            <div class="catItemView listing groupPrimary">
                                                <div class="catItemImageBlock col-sm-4 col-xs-12">
                                                    <a class="img" href="<?php echo $this->Function->getUrlNotice($notice['Notice']['slug']);?>" title="<?php if(!empty($notice['Notice']['title'])){echo $notice['Notice']['title'];}?>">
                                                        <img src="<?php if(!empty($notice['Notice']['image'])){echo $notice['Notice']['image'];}?>" alt="<?php if(!empty($notice['Notice']['title'])){echo $notice['Notice']['title'];}?>">		    </a>
                                                </div>
                                                <div class="main-item col-sm-8 col-xs-12">
                                                    <div class="catItemHeader">
                                                        <h3 class="catItemTitle">
                                                            <a href="<?php echo $this->Function->getUrlNotice($notice['Notice']['slug']);?>">
                                                                <?php if(!empty($notice['Notice']['title'])){echo $notice['Notice']['title'];}?></a>
                                                        </h3>
                                                    </div>
                                                    <div class="clr"></div>
                                                    <ul class="catToolbar">
                                                        <li class="catItemHits">
                                                            <i class="fa fa-eye"></i>
                                                            <?php if(!empty($notice['Notice']['views'])){echo $notice['Notice']['views'];}?>&nbsp;views
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-folder-open-o"></i>
                                                            <a href="<?php echo $this->Function->getUrlNotice($notice['Notice']['slug']);?>" title="Blog">Blog</a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-comments-o"></i>
                                                            <a class="itemCommentsLink k2Anchor" href="<?php echo $this->Function->getUrlNotice($notice['Notice']['slug']);?>">
                                                                0 comment</a>
                                                        </li>
                                                        <li class="catItemDateCreated">
                                                            <?php
                                                            $time = date('d/m/Y',strtotime($notice['Notice']['create_at']));
                                                            echo $time;
                                                            ?>
                                                        </li>
                                                    </ul>
                                                    <div class="clr"></div>
                                                    <div class="catItemBody">
                                                        <div class="catItemIntroText">
                                                            <?php if(!empty($notice['Notice']['description'])){echo $notice['Notice']['description'];}?>
                                                        </div>
                                                        <div class="clr"></div>
                                                        <a class="read-more" href="<?php echo $this->Function->getUrlNotice($notice['Notice']['slug']);?>" title="Xem thêm">Xem thêm</a>

                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="clr"></div>
                                                    <div class="clr"></div>
                                                </div>
                                            </div>
                                            <!-- End K2 Item Layout -->
                                        </div>
                                        <div class="clr"></div>
                                    <?php }
                                }?>
                            </div>

                        </div>
                        <!-- Pagination -->
                        <div class="k2_Pagination global_pagination">
                            <ul class="pagination">
                                <?php
                                if($total_page>=1){
                                    for ($i=1;$i<=$total_page;$i++){
                                        if($i == $current_page){
                                            echo '<li class="active"><span >'.$i.'</span></li>';
                                        }else{
                                            echo '<li><a title="'.$i.'" href="/tin-tuc?page='.$i.'" class="pagenav" >'.$i.'</a></li>';
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End K2 Category Layout -->
                    <!-- JoomlaWorks "K2" (v2.7.0) | Learn more about K2 at http://getk2.org -->
                </div>
            </div>
            <aside id="content_left" class="col-md-3 col-sm-12 col-xs-12 hidden"></aside>
            <aside id="content_right" class="col-lg-3 col-md-4 col-xs-12">
                <div id="right" class="col-sm-12">
                    <div class="module  list-cate ">
                        <h3 class="modtitle">
                     <span class="title">
                     <span class="title-color">Danh mục tin tức</span>
                     </span>
                        </h3>
                        <div class="modcontent clearfix">
                            <div id="sj_k2_categories_4785745141514449003" class="sj_k2_categories preset01-1 preset02-1 preset03-1 preset04-1 preset05-1">
                                <div class="cat-wrap theme1">
                                    <div class="content-box">
                                        <div class="child-cat">
                                            <?php
                                            if(!empty($listCategory)){
                                                foreach ($listCategory as $category){
                                                    ?>
                                                    <div class="child-cat-title">
                                                        <a href="<?php echo $this->Function->getUrlCatNotice($category['CatNotice']['slug']);?>">
                                                            <?php if(!empty($category['CatNotice']['name'])){echo $category['CatNotice']['name'];}?>						</a>
                                                    </div>
                                                    <?php
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <!-- END sub_content -->
                                    <div class="clr1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module  tinnoibat ">
                        <h3 class="modtitle">
                     <span class="title">
                     <span class="title-color"><a href="/">Tin nổi bật</a></span>
                     </span>
                        </h3>
                        <div class="modcontent clearfix">
                            <div id="k2ModuleBox159" class="k2ItemsBlock  tinnoibat">
                                <ul>
                                    <?php
                                    if(!empty($listHotNotice)) {
                                        foreach ($listHotNotice as $hot) {
                                            ?>
                                            <li class="even">
                                                <div class="image">
                                                    <a class="moduleItemImage" href="<?php echo $this->Function->getUrlNotice($hot['Notice']['slug']);?>"
                                                       title="<?php if(!empty($hot['Notice']['title'])){echo $hot['Notice']['title'];}?>">
                                                        <img src="<?php if(!empty($hot['Notice']['image'])){echo $hot['Notice']['image'];}?>"
                                                             alt="<?php if(!empty($hot['Notice']['title'])){echo $hot['Notice']['title'];}?>">
                                                    </a>
                                                </div>
                                                <div class="item-content">
                                                    <a class="moduleItemTitle"
                                                       href="<?php echo $this->Function->getUrlNotice($hot['Notice']['slug']);?>"><?php if(!empty($hot['Notice']['title'])){echo $hot['Notice']['title'];}?></a>
                                                    <div class="moduleItemIntrotext">
                                                    </div>
                                                    <div class="clr"></div>
                                                    <div class="clr"></div>
                                                </div>
                                                <div class="clr"></div>
                                            </li>
                                            <li class="clearList"></li>
                                        <?php }
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="module  k2-tags ">
                        <h3 class="modtitle">
                     <span class="title">
                     <span class="title-color">Tags</span>
                     </span>
                        </h3>
                        <div class="modcontent clearfix">
                            <div id="k2ModuleBox164" class="k2TagCloudBlock">
                                <strong class="title-tag">Popular Tags:</strong>
                                <?php
                                         if(!empty($listTag)){
                                            foreach($listTag as $tag){
                                    ?>
                                    <span class="items-tag">
                                        <a class="item-tag" href="<?php echo $this->Function->getUrlTagNotice($tag['TagNotice']['slug']);?>">
                                            <span class="name-tag"><?php echo $tag['TagNotice']['name'];?></span>
                                        </a>
                                    </span>
                                <?php }
                                    }?>
                            </div>
                        </div>
                    </div>
                    <div class="module  ">
                        <div class="modcontent clearfix">
                            <div class="sj_facebook-nav">
                                <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Xe-Ti%E1%BB%87n-Chuy%E1%BA%BFn-633261803525477/&amp;show_facepile=false&amp;height=600&amp;width=270" style="overflow:auto;background-color: transparent;border:1px solid #cccccc;height:600px;width:270px;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
