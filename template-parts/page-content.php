<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-wrap">
						
						<?php get_template_part( 'template-parts/page', 'banner' ); ?>

						<div class="page-content">
							<?php the_content(); ?>
						</div>

					</div>