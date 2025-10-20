<?php
/**
 * Sidebar setup for footer full.
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>

<?php if ( is_active_sidebar( 'mailchimp' ) ) : ?>

	<?php dynamic_sidebar( 'mailchimp' ); ?>

<?php endif;
