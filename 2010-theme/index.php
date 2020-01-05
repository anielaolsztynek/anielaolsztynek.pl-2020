<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
			                    <h1><a href="/">Parafia p.w. Bł. Anieli Salawy w Olsztynku</a></h1>

<?php
$iiwi = 0;
 if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
					<div class="postmeta"><?php the_time('j F Y'); ?></div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
				<?php if($iiwi == 0) echo("<div id=\"after-first-entry\">&nbsp;</div>"); ?>

<?php
$iiwi++;
 endwhile; ?>			                    
			                    
			                    
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
