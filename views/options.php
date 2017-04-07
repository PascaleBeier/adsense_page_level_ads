<?php
/**
 * Admin Options Page
 *
 * @package AdSense_Page_Level_Ads
 */

defined( 'ABSPATH' ) || die;
?>

<div class="wrap">
	<h1><?php esc_html_e( 'AdSense Page Level Ads Settings', 'page-level-ads-adsense' ); ?></h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'adsense_page_level_ads' ); ?>
		<?php do_settings_sections( 'adsense_page_level_ads' ); ?>

		<table class="form-table">
			<tr>
				<th scope="row"><label for="publisher">Publisher</label></th>
				<td><input name="adsense_page_level_ads_publisher" type="number" id="publisher"
						   aria-describedby="publisher-description" placeholder="1234567890"
						   value="<?php echo esc_attr( get_option( 'adsense_page_level_ads_publisher' ) ); ?>">
					<p class="description"
					   id="publisher-description">
						<?php
						esc_html_e( 'Your AdSense Publisher ID. This is a large number.', 'page-level-ads-adsense' );
						?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">Display</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span><?php esc_html_e('Display AdSense Page Level Ads on selected post types above.',
							'page-level-ads-adsense'); ?></span></legend>

						<?php foreach ( get_post_types( array(
							'public' => true,
						) ) as $post_type ) { ?>

							<label for="<?php echo esc_html( $post_type ); ?>">
								<input name="adsense_page_level_ads_display[]" type="checkbox"
									   id="<?php echo esc_html( $post_type ); ?>"
									   value="<?php echo esc_html( $post_type ); ?>"
									<?php echo in_array(esc_html( $post_type ),
									(get_option( 'adsense_page_level_ads_display' )), true) ? 'checked' : ''; ?>>
								<?php echo esc_html( $post_type ); ?>
							</label>
							<br>

						<?php } ?>

						<p class="description"><?php esc_html_e('Display AdSense Page Level Ads on selected post types above.',
						'page-level-ads-adsense'); ?></p>
					</fieldset>
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>
	</form>
</div>
