<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
function startsWith($Haystack, $Needle){
    // Recommended version, using strpos
    return strpos($Haystack, $Needle) === 0;
}

if(startsWith($_SERVER['REQUEST_URI'], "/galeria")):
?>
<script type="text/javascript" src="/js/highslide-with-gallery.packed.js"></script> 
<link rel="stylesheet" type="text/css" href="/js/highslide.css" /> 
<script type="text/javascript"> 
hs.lang = {
   loadingText :     'Ładowanie...',
   loadingTitle :    'Kliknij, aby anulować',
   focusTitle :      'Kliknij, aby przenieść na wierzch',
   fullExpandTitle : 'Rozszerz do pełnego rozmiaru',
   fullExpandText :  'Pełny rozmiar',
   creditsText :     'Korzysta z Highslide JS',
   creditsTitle :    'Przejdź do strony domowej Highslide JS',
   previousText :    'Wstecz',
   previousTitle :   'Wstecz (lewa strzałka)',
   nextText :        'Dalej',
   nextTitle :       'Dalej (prawa strzałka)',
   moveTitle :       'Przesuń',
   moveText :        'Przesuń',
   closeText :       'Zamknij',
   closeTitle :      'Zamknij (esc)',
   resizeTitle :     'Zmień rozmiar',
   playText :        'Uruchom',
   playTitle :       'Uruchom pokaz slajdów (spacja)',
   pauseText :       'Pauza',
   pauseTitle :      'Wstrzymaj pokaz slajdów (spacja)',
   restoreTitle :    'Kliknij, aby zamknąć obrazek; kliknij i przeciągnij, aby przesunąć. Użyj klawiszy strzałek, aby przejść dalej lub wstecz.',
   number :          'Zdjęcie %1/%2'
};
	hs.graphicsDir = 'http://www.anielaolsztynek.pl/js/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.numberPosition = 'caption';
	hs.dimmingOpacity = 0.75;
 
	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 3000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .75,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>
<?php
endif;
?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php

if(date("m") == 12) {
    if(in_array(date("j"), array("20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"))):
    ?>
    <!--swieta-->
    <style type="text/css">
            #anheader {
            	background: url(/wp-content/themes/twentyten/images/header_swieta.jpg) no-repeat !important;
          	}
    </style>
    <?php
    endif;
}
?>

<style type="text/css">
span.nd_liturgia_skrot_tytul {color:green;}
span.nd_liturgia_skrot_tytul_swieto {color:red;font-weight:bold;}
span.nd_liturgia_skrot_sigla {font-weight:bold;}
a.nd_liturgia_skrot_link {text-decoration:none;}
p.nd_liturgia_skrot_baner {margin:2px;padding:0;text-align:center;}
.textwidget p {
	margin: 0;
	width: 200px !important;
}
</style>

</head>

<body <?php body_class(); ?>>
<div id="headerline">
<a id="headera" href="/"><div id="anheader">&nbsp;</div></a>
</div>
<?php
if(false):
?>
<!--<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						
					</span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
					<?php endif; ?>
			</div>

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div>
		</div>
	</div>

	<div id="main">
	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>-->
<?php
endif;
?>
