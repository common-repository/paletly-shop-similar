<div class="wrap">
<h2><img style="float:left; margin: 0px 10px 0 0;height:30px;" src="<?php echo P_PLUGIN_URL ?>/assets/paletly_logo.png" />Settings</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('paletly'); ?>

<table class="form-table">
<p>
<a target="_blank" href="http://paletly.com/bloggers#/page_id=page4">Register with paletly.com to obtain your blogid and subid</a>
</p>

<tr valign="top">
<th scope="row">Blog ID:</th>
<td><input type="text" name="blog_id" value="<?php echo get_option('blog_id'); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Sub ID:</th>
<td><input type="text" name="sub_id" value="<?php echo get_option('sub_id'); ?>" /></td>
</tr>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>


</form>
</div>
