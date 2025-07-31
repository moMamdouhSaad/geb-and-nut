<?php 

//Register Meta box
function travelfic_page_meta_boxes() {
	add_meta_box( 'travelfic-page-meta', 'Page Settings', 'travelfic_page_meta_boxes_fields', 'page', 'normal' );
}
add_action( 'add_meta_boxes', 'travelfic_page_meta_boxes' );

//Meta callback function
function travelfic_page_meta_boxes_fields( $post ) {
    ?>
        <div class="travelfic-page-metabox-fields-wrapper">
            <div class="travelfic-page-metabox-item">
                <div class="travelfic-page-metabox-title">
                    <label for="tft-pmb-background-img"><?php echo esc_html__('Background Image', 'travelfic')?></label>
                </div>
                <div class="travelfic-page-metabox-field">
                    <?php 
                    $travelfic_page_banner = get_post_meta( $post->ID, 'tft-pmb-background-img', true );
                    ?>
                    <div class="travelfic-media-upload-wrapper">
                        <input type="text" class="travelfic-media-url-preview" value="<?php echo !empty($travelfic_page_banner) ? esc_url($travelfic_page_banner) : ''; ?>" disabled>
                        <input type="hidden" class="travelfic-media-url" value="<?php echo !empty($travelfic_page_banner) ? esc_url($travelfic_page_banner) : ''; ?>" name="tft-pmb-background-img">
                        <a href="#" class="travelfic-media-btn upload-btn"><?php echo esc_html__('Upload', 'travelfic')?></a>
                        <a href="#" class="travelfic-media-btn remove-btn"><?php echo esc_html__('Remove', 'travelfic')?></a>
                    </div>
                </div>
            </div>
            <div class="travelfic-page-metabox-item">
                <div class="travelfic-page-metabox-title">
                    <label for="tft-pmb-subtitle"><?php echo esc_html__('Subtitle ( When banner enabled )', 'travelfic')?></label>
                </div>
                <div class="travelfic-page-metabox-field">
                    <textarea name="tft-pmb-subtitle" id="tft-pmb-subtitle"><?php echo !empty( get_post_meta( $post->ID, 'tft-pmb-subtitle', true ) ) ? esc_html( get_post_meta( $post->ID, 'tft-pmb-subtitle', true ) ) : ''; ?></textarea>
                </div>
            </div>
            
            <div class="travelfic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'tft-pmb-disable-sidebar', true ) ) && get_post_meta( $post->ID, 'tft-pmb-disable-sidebar', true ) == 1){
                        $travelfic_pmb_sidebar = 'checked';
                    }else{
                        $travelfic_pmb_sidebar = '';
                    }
                ?>
                <div class="travelfic-page-metabox-title">
                    <label for="tft-pmb-disable-sidebar"><?php echo esc_html__('Disable Sidebar', 'travelfic')?></label>
                </div>
                <div class="travelfic-page-metabox-field">
                    <input type="checkbox" name="tft-pmb-disable-sidebar" id="tft-pmb-disable-sidebar" <?php echo !empty( $travelfic_pmb_sidebar ) ? esc_attr( $travelfic_pmb_sidebar ) : ''; ?>>
                </div>
            </div>

            <div class="travelfic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'tft-pmb-banner', true ) ) && get_post_meta( $post->ID, 'tft-pmb-banner', true ) == 1){
                        $travelfic_pmb_banner = 'checked';
                    }else{
                        $travelfic_pmb_banner = '';
                    }
                ?>
                <div class="travelfic-page-metabox-title">
                    <label for="tft-pmb-banner"><?php echo esc_html__('Disable Banner', 'travelfic')?></label>
                </div>
                <div class="travelfic-page-metabox-field">
                    <input type="checkbox" name="tft-pmb-banner" id="tft-pmb-banner" <?php echo !empty( $travelfic_pmb_banner ) ? esc_attr( $travelfic_pmb_banner ) : ''; ?>>
                </div>
            </div>
            
            <div class="travelfic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'tft-pmb-transfar-header', true ) ) && get_post_meta( $post->ID, 'tft-pmb-transfar-header', true ) == 1){
                        $travelfic_pmb_transfar_header = 'checked';
                    }else{
                        $travelfic_pmb_transfar_header = '';
                    }
                ?>
                <div class="travelfic-page-metabox-title">
                    <label for="tft-pmb-transfar-header"><?php echo esc_html__('Disable Transparent Header', 'travelfic')?></label>
                </div>
                <div class="travelfic-page-metabox-field">
                    <input type="checkbox" name="tft-pmb-transfar-header" id="tft-pmb-transfar-header" <?php echo !empty( $travelfic_pmb_transfar_header ) ? esc_attr( $travelfic_pmb_transfar_header ) : ''; ?>>
                </div>
            </div>
        </div>
    <?php
}

//save meta value with save post hook


function travelfic_page_meta_boxes_data_save( $post_id ) {
	if ( isset( $_POST['tft-pmb-background-img'] ) ) {
		update_post_meta( $post_id, 'tft-pmb-background-img', esc_url_raw(wp_unslash( $_POST['tft-pmb-background-img'] )) );
	}
	if ( isset( $_POST['tft-pmb-subtitle'] ) ) {
		update_post_meta( $post_id, 'tft-pmb-subtitle', sanitize_text_field(wp_unslash( $_POST['tft-pmb-subtitle'] )) );
	}

	if ( isset( $_POST['tft-pmb-disable-sidebar'] ) ) {
		update_post_meta( $post_id, 'tft-pmb-disable-sidebar', 1 );
	}else{
		update_post_meta( $post_id, 'tft-pmb-disable-sidebar', 0 );
    }

	if ( isset( $_POST['tft-pmb-banner'] ) ) {
		update_post_meta( $post_id, 'tft-pmb-banner', 1 );
	}else{
		update_post_meta( $post_id, 'tft-pmb-banner', 0 );
    }

	if ( isset( $_POST['tft-pmb-transfar-header'] ) ) {
		update_post_meta( $post_id, 'tft-pmb-transfar-header', 1 );
	}else{
        update_post_meta( $post_id, 'tft-pmb-transfar-header', 0 );
    }

}
add_action( 'save_post', 'travelfic_page_meta_boxes_data_save' ); 