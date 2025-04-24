<?php
$is_popular = $settings['is_popular'] == 'yes' ? 'popular_item' : '';
?>

<div class="price-card <?php echo esc_attr($is_popular) ?>">
    <div class="card-body">
        <?php
        if (!empty($settings['plan_title'])) { ?>
            <h4 class="price-card__title">
                <?php echo esc_html($settings['plan_title']); ?>
            </h4>
        <?php
        }
        if (!empty($settings['sub_title'])) { ?>
            <small class="d-block mb-4">
                <?php echo esc_html($settings['sub_title']); ?>
            </small>
        <?php
        }
        ?>
        <div class="price-card__box mb-4">
            <h2 class="price-card__price fw-bold">
                $<?php echo esc_html($settings['plan_price']); ?> <span class="price-card__price-sm fw-normal"><?php echo esc_html($settings['period']); ?></span>
            </h2>
            <?php
            if (!empty($settings['sale_badge'])) { ?>
                <span class="price-card__badge badge rounded-pill text-bg-primary fw-medium">
                    <?php echo esc_html($settings['sale_badge']); ?>
                </span>
            <?php
            }
            ?>

        </div>
        <div class="d-flex align-items-center gap-2 mb-4">
            <?php
            if (!empty($settings['feature_img_pri']['id'])) { ?>
                <div class="flex-shrink-0">
                    <?php echo wp_get_attachment_image($settings['feature_img_pri']['id'], 'full', '', ["class" => "img-fluid", "alt" => "image"]); ?>
                </div>
            <?php
            }
            if (!empty($settings['top_feature_title'])) { ?>
                <p class="mb-0 fw-bold top_feature_style__">
                    <?php echo esc_html($settings['top_feature_title']); ?>
                </p>
            <?php
            }
            ?>
        </div>
        <div class="vstack gap-2 mb-4">
            <?php
            $table_contents = preg_split('/\r\n|[\r\n]/', $settings['list_items']);
            if (!empty($table_contents)) {
                foreach ($table_contents as $list) {
                    echo '<div class="hstack gap-2 align-items-center">';
                    echo '<div class="check-mark bg-success text-white flex-shrink-0"><i class="fa fa-check"></i></div><p class="mb-0">' . hostim_kses_post($list) . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <?php
        if (!empty($settings['purchase_btn_label'])) { ?>
            <a href="<?php echo esc_url($settings['purchase_btn_url']['url']); ?>" class="price-card__btn">
                <?php echo esc_html($settings['purchase_btn_label']); ?>
            </a>
        <?php
        }
        if (!empty($settings['renew_title'])) { ?>
            <small class="price-card__caption"> <?php echo esc_html($settings['renew_title']); ?> </small>
        <?php
        }
        ?>
    </div>
    <?php
    if ($settings['is_popular'] == 'yes' && !empty($feature_popular_title)) { ?>
        <div class="price-card__tag">
            <?php echo esc_html($settings['feature_popular_title']); ?>
        </div>
    <?php
    }
    ?>
</div>