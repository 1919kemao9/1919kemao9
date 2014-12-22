<?php
$reminder_images = trim(nimbus_get_option('reminder_images'));
?>

<div class="banner">
    <?php 
    if (is_front_page()) {
        if (nimbus_get_option('nimbus_banner_option') == 'static_banner') {
            if (nimbus_get_option('banner_image') != '') {
            ?>
                <img src="<?php echo nimbus_get_option('banner_image'); ?>" />
            <?php                                     
            } else {
                if ($reminder_images == "on" ) {
                    get_template_part( 'parts/image', '1170_315');    
                }
            }
        } 
    } else {
        // No layout
    }
    ?>
</div>