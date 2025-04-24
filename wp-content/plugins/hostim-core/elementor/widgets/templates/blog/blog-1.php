<?php
if ( $hostim_query->have_posts() ) { ?>
    <section class="blog-section light-bg ">
        <div class="container">

            <div class="blog-bottom mt-5 position-relative zindex-1">
                <?php
                if( !empty( $bg_shape_left['url'] ) ){
                    echo '<img src="'.esc_url( $bg_shape_left['url'] ).'" alt="frame" class="position-absolute circle-frame">';
                }
                if( !empty( $bg_shape_right['url'] ) ){
                    echo '<img src="'.esc_url( $bg_shape_right['url'] ).'" alt="frame" class="position-absolute circle-blue">';
                }
                ?>
                <div class="row g-4 justify-content-center">
                    <div class="col-xl-6 col-lg-10">
                        <?php
                        $i = 1;
                        while ( $hostim_query->have_posts() ) {
                            $hostim_query->the_post();

                            if ( $i == 1 ) { ?>
                                <div class="blog-card bg-white deep-shadow rounded">
                                    <div class="feature-thumb rounded-5 overflow-hidden position-relative">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail( 'blog_580x340' ); ?>
                                        </a>
                                        <?php \Hostim_Theme_Helper::hostim_entry_cat('category', 'position-absolute category-btn'); ?>

                                    </div>
                                    <div class="blog-content-wrapper mt-4">
                                        <a href="<?php the_permalink() ?>">
                                            <h3><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h3>
                                        </a>
                                        <p class="mt-3">
	                                        <?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length') ?>
                                        </p>
                                        <div class="blog-author mt-4 d-flex align-items-start align-items-sm-center justify-content-between">
                                            <div class="author-left d-flex align-items-center">
                                                <?php
                                                if($author_img_switcher == 'yes') {
                                                    echo get_avatar( get_the_author_meta( 'ID' ), 56, '', '', array('class'=>'img-fluid rounded-circle flex-shrink-0') );
                                                }
                                                ?>
                                                <div class="author-info ms-3">
                                                <?php
                                                if($author_name_switcher == 'yes') { ?>
                                                    <h6 class="mb-0"><?php the_author(); ?></h6>
                                                <?php
                                            } ?>
                                                    <?php echo get_the_date(); ?>

                                                </div>
                                            </div>
                                            <div class="blog-meta">
                                                <?php
                                                if($like_button_hide_on == 'yes') {
                                                    echo like_it_button_html( get_the_ID() );
                                                }
                                                echo \Hostim_Theme_Helper::hostim_get_comment_number();
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div><div class="col-xl-6 col-lg-10"><div class="row g-4">
                                <?php
                            }
                            else{ ?>
                                <div class="col-xl-12">
                                    <div class="blog-card d-flex align-items-center bg-white deep-shadow p-25 rounded-2">
                                        <div class="feature-thumb position-relative">
                                            <a href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail( 'blog_175x150', array( 'class'=>'img-fluid rounded-left' ) ); ?>
                                            </a>
                                            <?php  \Hostim_Theme_Helper::hostim_entry_cat('category', 'position-absolute category-btn'); ?>
                                        </div>
                                        <div class="blog-content ms-0 ms-sm-4 mt-3 mt-sm-0">
                                            <a href="<?php the_permalink() ?>">
                                                <h4><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h4>
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
        </div>
    </section>

    <?php
}
