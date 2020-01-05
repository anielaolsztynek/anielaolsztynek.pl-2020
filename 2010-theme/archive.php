<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="wcontent">
			    <div id="topcontent">&nbsp;</div>
                <div id="content">
                    <table id="maincontent">
                        <tr>
                            <td id="contentwrap" role="main">

<h1>
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Archiwum, <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Archiwum, <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Archiwum, <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Archiwum', 'twentyten' ); ?>
<?php endif; ?>
			</h1>			                    

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<h2 class="entry-title"><?php the_title(); ?></h2>
						<div class="postmeta"><?php the_time('j F Y'); ?></div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; ?>			                    
			                    
			                    
			                </td>
			                <?php get_sidebar(); ?>
			            </tr>
			        </table>
			    </div>
			    <div id="bottomcontent">&nbsp;</div>
			</div>
		</div>

<?php get_footer(); ?>

<?php
/*
		<div id="container">
			<div id="content" role="main">
			




<?php get_sidebar(); ?>
<?php get_footer(); ?>
*/
?>
