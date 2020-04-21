<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<script>
		var theme_path = '<?php echo FS_THEME_URL; ?>';
	</script>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_content"><?php _e('Go to main content', 'fs-onepage'); ?></a>
	</div>
	
	
	<header role="banner" id="site_head">
		<div class="inner">
			
		<?php if ( ! is_front_page() ) { ?>
		<?php get_template_part('template-parts/header', 'brand'); ?>			
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-home" title="<?php _e('Go to Home Page', 'fs-onepage'); ?>">
			<img src="<?php echo FS_THEME_URL; ?>/img/icon-arrow-black.svg" alt="">
		</a>
		<?php } ?>

		
		<?php if ( is_front_page() && ! is_home()  ) { ?>
		<nav class="site-nav onepage-nav" role="navigation" aria-label="<?php _e('Main menu', 'fs-onepage'); ?>">

			<?php $frontpage = get_the_id();
				
				$pageargs = array(
					'posts_per_page' 	=> -1,
					'post_type' 		=> 'page',
					'post__not_in'		=> array($frontpage),
					'meta_query'		=> array(
						'relation' 		=> 'OR',
						array(
							'key'		=> '_wp_page_template',
							'value'		=> 'pagecustom-standalone.php',
							'compare'	=> '!=',
						),
					    array(
					        'key'       => '_wp_page_template',
					        'compare'   => 'NOT EXISTS',
					    ),
					),
				);
				$onepage = new WP_Query($pageargs);
	
				if ($onepage->have_posts()) : ?>
				
				<ul class="onepage-menu">
				<?php while ($onepage->have_posts()) : $onepage->the_post(); ?>
			
					<li><a href="#<?php fs_slug(); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; wp_reset_postdata(); ?>
				</ul>
				
				<?php endif; ?>
		</nav>
		<?php } ?>
		
		</div>		
	</header>

		<main class="content-area" role="main" id="site_content">