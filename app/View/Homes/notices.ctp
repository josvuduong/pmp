<?php echo $this->element('banner')?>
<section id="content" class="   no-left  block com_k2">
    <div class="container">
        <div class="row">
            <div id="content_main" class="col-lg-9 col-md-8  col-xs-12">
                <div id="system-message-container">
                </div>
                <div id="yt_component">
                    <!-- Start K2 Item Layout -->
                    <span id="startOfPageId158"></span>
                    <div id="k2Container" class="itemView ">
                        <div class="content-box">
                            <!-- Plugins: BeforeDisplay -->
                            <!-- K2 Plugins: K2BeforeDisplay -->
                            <div class="itemHeader">
                                <!-- Item title -->
                                <h1 class="itemTitle">
                                    <?php if(!empty($data['title'])){echo $data['title'];}?>
                                </h1>
                            </div>
                            <div class="itemToolbar11">
                                <ul class="list-toolbar1">
                                    <li>
                                        <span>Tác giả: </span><?php if(!empty($data['author'])){echo $data['author'];}?>
                                    </li>
                                    <li>
                                        <i class="fa fa fa-calendar"></i>
                                        <time datetime="2016-05-18T06:50:14+00:00" itemprop="datePublished">Được đăng: </span><?php if(!empty($data['create_at'])){echo date('d/m/Y h:i',strtotime($data['create_at']));}?></time>
                                    </li>
                                    <li>
                                        <i class="fa fa-user" aria-hidden="true"></i><span>Luợt xem: </span><?php if(isset($data['views'])){echo $data['views'];}?>
                                    </li>

                                </ul>
                            </div>
                            <div class="clearfix"></div>


                            <!-- Item Image -->
                            <div class="itemImageBlock">
                                <span class="itemImage">
                                <a href="<?php if(!empty($data['title'])){echo $data['title'];}?>" title="<?php if(!empty($data['title'])){echo $data['title'];}?>">
                                    <img src="<?php if(!empty($data['image'])){echo $data['image'];}?>" alt="<?php if(!empty($data['title'])){echo $data['title'];}?>">
                                </a>
                                </span>
                                <div class="clr"></div>
                            </div>
                            <div class="main-item">
                                <?php if(!empty($data['content'])){echo $data['content'];}?>
                            </div>
                            <div class="itemTagsBlock">
                                <span>Tags: </span>
                                <ul class="itemTags">
                                    <?php
                                    if(!empty($listTag)){
                                    foreach($listTag as $tag){
                                    ?>
                                    <li><a href="<?php echo $this->Function->getUrlTagNotice($tag['TagNotice']['slug']);?>"><?php echo $tag['TagNotice']['name'].' ';?></a></li>
                                    <?php }
                                    }?>
                                </ul>
                                <div class="clr"></div>
                            </div>
                            <div class="itemHeader">
                            <h1 class="itemTitle">CÁC TUYẾN LIÊN QUAN</h1>
                            <div class="bai-lien-quan">
                            <?php 
                                if(!empty($list_notice_other)){
                               ?>
                                <ul>
                                    <?php  
                                    foreach($list_notice_other as $other){
                                    ?>
                                    <li><a href="/xem-gia/<?php echo $other['Notice']['slug'];?>"><?php echo '> '.$other['Notice']['title'];?></a></li>
                                    <?php }?>
                                </ul>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                        </div>
                    </div>
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
                                    foreach($listTag as $key=>$tag) {
                                        if ($key >= 0 && $key < 10) {
                                            ?>
                                            <span class="items-tag">
                                        <a class="item-tag"
                                           href="<?php echo $this->Function->getUrlTagNotice($tag['TagNotice']['slug']); ?>">
                                            <span class="name-tag"><?php echo $tag['TagNotice']['name']; ?></span>
                                        </a>
                                    </span>
                                        <?php }
                                    }
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