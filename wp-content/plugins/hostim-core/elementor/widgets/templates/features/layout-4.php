<div class="hds-single-info-card bg-white ptb-40 pl-40 pr-40 hds-shadow-hover rounded-8 feature_section__">
    <div class="hds-info-card-top d-flex align-item-center justify-content-between">
        <div class="hds-info-icons position-relative">
            <div class="hds-info-icon d-flex align-items-center justify-content-center hds-dotted-border hds-border-color">
                <?php \Elementor\Icons_Manager::render_icon( $settings['feature_ly_04_sub_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>
            <div class="hds-info-icon style-two position-absolute d-flex align-items-center justify-content-center hds-dotted-border hds-border-color">
                <?php \Elementor\Icons_Manager::render_icon( $settings['feature_ly_04_currency_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>
        </div>
        <div class="hds-info-card-btn d-flex align-items-center justify-content-center isb-border hds-border-color">
            <span class="hds-body-color-two fs-14">
                <?php \Elementor\Icons_Manager::render_icon( $settings['feature_ly_04'], [ 'aria-hidden' => 'true' ] ); ?>
            </span>
        </div>
    </div>
    <?php
    if($settings['fea_3_title']){?>
        <h5 class="card-title-color fs-24 mt-40">
            <?php echo esc_html($settings['fea_3_title']); ?>
        </h5>
    <?php
    }
    ?>
    <?php
    if($settings['fea_3_description']){?>
        <p class="hds-body-color-three ff-inter fw-400 fs-16 lh-24 mt-10 mb-0">
            <?php echo esc_html($settings['fea_3_description']); ?>
        </p>
    <?php
    }
    ?>
</div>