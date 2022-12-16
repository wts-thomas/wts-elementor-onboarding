<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="dns-prefetch" href="//code.jquery.com">
	
	<link rel="preconnect" href="https://use.typekit.net" crossorigin />
    <link rel="preconnect" href="https://p.typekit.net" crossorigin />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ---------------------------------------------------------------------
Start of body ID
------------------------------------------------------------------------ -->

<?php
	$current_page = $post->ID;
	$parent = 1;

	while($parent) {
		$page_query = $wpdb->get_row("SELECT post_name, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
		$parent = $current_page = $page_query->post_parent;
		if(!$parent) $parent_name = $page_query->post_name;
	}
?>

<body <?php body_class( $class ); ?>>

<!-- ---------------------------------------------------------------------
End of body ID
------------------------------------------------------------------------ -->

<?php
// Elementor `header` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	get_template_part( 'template-parts/header' );
}