<section class="h5-blog">
    <div class="container">
        <div class="h5-blog-bottom">
            <div class="row g-4 justify-content-center">
                <?php
				while ( $hostim_query->have_posts() ) {
					$hostim_query->the_post();
                    ?>
                    <div class="col-xl-4 col-lg-6">
                        <article class="h5-blog-card bg-white deep-shadow rounded-top overflow-hidden">
                            <div class="feature-img overflow-hidden">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('blog_420x250') ?>
                                </a>
                            </div>
                            <div class="h5-blog-article-content">
                                <div class="h5-blog-author d-flex align-items-center mb-4">
                                    <?php
                                    if($author_img_switcher == 'yes') {
                                        echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array('class'=>'flex-shrink-0 rounded-circle') );  
                                    }
                                    ?>
                                    <div class="h5-blog-author-content ms-3">
                                        <?php
                                        if($author_name_switcher == 'yes') { ?>
                                            <h6 class="mb-1"><?php the_author(); ?></h6>
                                        <?php
                                        }
                                        ?>
                                        <p class="mb-0"><?php echo get_the_date(); ?></p>
                                    </div>
                                </div>
                                <a href="<?php the_permalink() ?>">
                                    <h4 class="mb-3"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h4>
                                </a>
                                <p><?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length') ?></p>
                                <hr class="mt-4 mb-4">
                                <div class="h5-blog-card-bottom d-flex align-items-center justify-content-between">
                                    <?php \Hostim_Theme_Helper::hostim_post_tags( 'share-btn' ); ?>

                                    <a href="<?php the_permalink() ?>" class="explore-btn"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
</section>
