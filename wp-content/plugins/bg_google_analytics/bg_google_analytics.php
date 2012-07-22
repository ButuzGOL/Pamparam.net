<?php
/*
Plugin Name: BG Google Analytics
Plugin URI: http://www.pamparam.net
Description: Add google analytics to bottom.
Version: 2.0
Author: ButuzGOL
Author URI: http://www.pamparam.net
*/

add_action('admin_menu', 'gaip_create_menu');
function gaip_create_menu() {
	add_options_page('Google Analytics Settings', 'Google Analytics Setting', 'administrator', __FILE__, 'bgga_settings_page');
	add_action( 'admin_init', 'bgga_register_settings' );
}	
function bgga_register_settings() {
	register_setting( 'bgga-settings-group', 'new_option_name' );
}
function bgga_settings_page() {
?>
    <div class="wrap">
        <h2>Google Analytics.</h2>
        <p>
    This is a very simple, but problem solver tool. Allowing you to add your google analytics code into wordpress. All you need is your google analytics id, type this into the box below.. click save and your ready to go! This plugin will not track logged in users because doing so would give you invaild results. Everything else gets tracked!
        </p>
        <form method="post" action="options.php">
            <?php settings_fields( 'bgga-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Put your Google Analytics ID here</th>
                    <td><input type="text" name="new_option_name" value="<?php echo get_option('new_option_name'); ?>"> An example; UA-0000000-0.</td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>

<?php } ?>
<?php
add_action('wp_footer', 'bgga_function');

function bgga_function() {
	//if ( !is_user_logged_in() ) { ?>
		
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("<?php echo get_option('new_option_name'); ?>");
	pageTracker._trackPageview();
	} catch(err) {}</script>

<?php 
//}
}
?>