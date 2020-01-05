<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
/*
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php

	get_sidebar( 'footer' );
?>

			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'twentyten_credits' ); ?>
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">
					<?php printf( __('Proudly powered by %s.', 'twentyten'), 'WordPress' ); ?>
				</a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->
*/
?>
<div id="footer">&copy; Copyright <?php echo(date("Y")) ?> by Parafia Rzymskokatolicka pod wezwaniem Błogosławionej Anieli Salawy w Olsztynku&nbsp;&nbsp;|&nbsp;&nbsp;Administrator: <u>Danuta Lewandowska</u>&nbsp;&nbsp;|&nbsp;&nbsp;Designed by: <a href="http://jblew.pl/">Jędrzej Lewandowski</a>&nbsp;&nbsp;|&nbsp;&nbsp;Strona używa <a href="http://pl.wordpress.org/">Wordpress-a</a>, udostępnianego na licencji GNU General Public License</div>
<?php
	wp_footer();
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32816447-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
