<?php
/*
Plugin Name: Paletly Shop Similar
Plugin URI: http://paletly.com
Description: Paletly's 'Shop Similar' widget is the best way to monetize fashion images on your blog. The non-intrusive shopping carousel features similar products from over 600 global brands. The plugin enables fashion bloggers to activate the widget by simply putting in their unique blog and sub ID. After registering at http://bloggers.paletly.com/ bloggers can obtain their IDs and activate the widget.
Version: 1.0
Author: Paletly Designs Pvt. Ltd.
Author URI: http://paletly.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
if (!defined('P_PLUGIN_URL'))
      define( 'P_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename(  dirname( __FILE__ ) ) );



function activate_paletly() {
  //add_option('blog_id', 'UA-0000000-0');
  //add_option('sub_id', 'UA-0000000-0dgshgdhs');
}

function deactive_paletly() {
  //delete_option('blog_id');
  //delete_option('sub_id');
}

function admin_init_paletly() {
  register_setting('paletly', 'blog_id');
  register_setting('paletly', 'sub_id');
}

function admin_menu_paletly() {
  wp_enqueue_script('jquery');
  add_options_page('Paletly', 'Paletly', 'manage_options', 'paletly', 'options_page_paletly');
}

function options_page_paletly() {
  include(WP_PLUGIN_DIR.'/paletly-shop-similar/options.php');  
}

function paletly() {
  $blog_id = get_option('blog_id');
  $sub_id = get_option('sub_id');
?>

<script type="text/javascript" src="//paletly.com/blogembed.js"></script>
<script> 
jQuery(document).ready(function($) {showOnHome="enabled";subId="<?php echo $sub_id ?>";getMapping("<?php echo $blog_id ?>");});
</script>


<?php
}

register_activation_hook(__FILE__, 'activate_paletly');
register_deactivation_hook(__FILE__, 'deactive_paletly');

if (is_admin()) {
  add_action('admin_init', 'admin_init_paletly');
  add_action('admin_menu', 'admin_menu_paletly');
}

if (!is_admin()) {
  add_action('wp_head', 'paletly');
}

?>
