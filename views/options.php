<div class="wrap">
    <form method="post" action="options.php">
        <?php settings_fields('adsense_page_level_ads'); ?>
        <?php do_settings_sections('adsense_page_level_ads'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">Publisher</th>
                <td><input type="number" placeholder="123456789" name="adsense_page_level_ads_publisher"
                           value="<?php echo esc_attr(get_option('adsense_page_level_ads_publisher')); ?>"/></td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>