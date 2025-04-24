<?php
if ( $hostim_query->have_posts() ) { ?>
    <section class="h4-blog-section pb-120 ds-bg">
        <div class="container">

            <div class="row g-4 justify-content-center">
                <div class="col-xxl-7 col-lg-10">
                    <div class="blog-left">
                        <div class="title-area mb-4 text-center text-sm-start">
                            <h2 class="mb-2">Latest Hosting Articles</h2>
                            <p class="mb-0">Contact one of our friendly technical advisors now Our team is available </p>
                        </div>
                        <?php
                        $i = 1;
                        while ( $hostim_query->have_posts() ) {
                            $hostim_query->the_post();

                            if ( $i == 1 ) { ?>
                                <div class="h4-blog-card bg-white deep-shadow rounded-2 position-relative">

                                    <a href="<?php the_permalink() ?>" class="feature-img">
                                        <?php the_post_thumbnail( 'blog_746x500', array('class' => 'img-fluid rounded-2') ); ?>
                                    </a>
                                    <?php \Hostim_Theme_Helper::hostim_entry_cat('category', 'position-absolute category-btn start-0 top-0'); ?>
                                    <div class="h4-blog-content bg-white">
                                        <a href="<?php the_permalink() ?>">
                                            <h3><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h3>
                                        </a>
                                        <div class="blog-author d-flex align-items-center mt-4">
                                            <?php
                                            if($author_img_switcher == 'yes') {
                                                echo get_avatar( get_the_author_meta( 'ID' ), 56, '', '', array('class'=>'rounded-circle flex-shrink-0') );
                                            }
                                            ?>
                                            <div class="author-info ms-3">
                                                <?php
                                                if($author_name_switcher =='yes' ) { ?>
                                                    <h6 class="mb-0"><?php the_author(); ?></h6>
                                                <?php
                                                }
                                                ?>
                                                <?php echo get_the_date(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div></div><div class="col-xxl-5 col-lg-10"><div class="row g-4">
                                 <?php
                            }
                            else{ ?>
                                <div class="col-xl-12">
                                    <div class="blog-card d-flex align-items-center bg-white deep-shadow p-25 rounded-2">
                                        <div class="feature-thumb position-relative">
                                            <a href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail( 'blog_155x134', array( 'class'=>'img-fluid rounded-left' ) ); ?>
                                            </a>
                                            <?php \Hostim_Theme_Helper::hostim_entry_cat('category', 'position-absolute category-btn'); ?>
                                        </div>
                                        <div class="blog-content ms-0 ms-sm-4 mt-3 mt-sm-0">
                                            <a href="<?php the_permalink() ?>">
                                                <h4 class="h5"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h4>
                                            </a>
                                            <div class="blog-author mt-4 d-flex align-items-start align-items-sm-center justify-content-between">
                                                <div class="author-left d-flex align-items-center">
                                                    <?php
                                                    if($author_img_switcher == 'yes') {
                                                        echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array('class'=>'img-fluid rounded-circle flex-shrink-0') );
                                                    }
                                                    ?>
                                                    <div class="author-info ms-3">
                                                        <?php
                                                        if($author_name_switcher == 'yes') { ?>
                                                            <h6 class="mb-0"><?php echo \Hostim_Theme_Helper::hostim_get_posted_by(); ?></h6>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php echo get_the_date(); ?>
                                                    </div>
                                                </div>
                                                <div class="blog-meta">
                                                    <?php
                                                    if($like_button_hide_on == 'yes') {
                                                        echo like_it_button_html( get_the_ID() );
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $i++;
                        }
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
} ?>
