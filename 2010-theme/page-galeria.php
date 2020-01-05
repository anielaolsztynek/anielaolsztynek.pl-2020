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
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 ini_set("display_errors", "1");

$page = 1;
if(!empty($_GET['page'])) $page = $_GET['page'];

get_header(); ?>

<div id="container">
	<div id="wcontent">
		<div id="topcontent">&nbsp;</div>
			<div id="content">
				<table id="maincontent">
					<tr>
						<td id="contentwrap" role="main">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h1>Galeria zdjęć</h1>
								<div class="entry-content">
									
									
									
<?php
$liczba_zdjec_w_poziomie = 4;

$mysql = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error($mysql));
$database = mysql_select_db(DB_NAME, $mysql);
mysql_query("SET NAMES 'utf8';", $mysql);

$resultFotos = mysql_query("SELECT * FROM fotos INNER JOIN dzial ON fotos.dzial_id = dzial.id ORDER BY fotos.dzial_id DESC", $mysql) or die(mysql_error($mysql));
$resultDzialy = mysql_query("SELECT * FROM  dzial ORDER BY id DESC", $mysql) or die(mysql_error($mysql));

$fotos = array();
$last_id = -1;
$count = 0;
while($row = mysql_fetch_assoc($resultFotos)) {
	$dzialId = $row['dzial_id'];
	if($dzialId != $last_id) $count++;
	if($count > ($page-1)*3 && $count <= $page*3) $fotos[] = $row;
    $last_id = $dzialId;
}
$ile = mysql_num_rows($resultDzialy);
$strony = ceil($ile / 3);
        $strony_text = '<div style="width: 100%; padding-bottom: 10px; text-align: center;" class="strony">';
        $i = 1;
        $color = "";
        $prew = $page - 1;
        $next = $page + 1;
        if ($page > 1)
            $strony_text .= '<a class="page_select" href="/galeria?page=' . $prew .
                '">&laquo;</a>&nbsp;&nbsp;';
        while ($i < $strony + 1) {
            if ($i == $page)
                $color = "page_select_selected";
            else
                $color = "";
            $strony_text .= '&nbsp;<a class="page_select '.$color.'" href="/galeria?page=' . $i . '">' . $i .
                '</a>&nbsp;';
            $i++;
        }
        $color = "#ddd";
        if ($page < $strony)
            $strony_text .= '&nbsp;&nbsp;<a class="page_select" href="/galeria?page=' . $next .
                '">&raquo;</a>';
        $strony_text .= "</div>";$_SERVER["DOCUMENT_ROOT"] . '/zdjffeecia/' . $foto['nazwa'] . '.jpg'
?>
<h2>Kategorie</h2>
<ul>

<?php
	
	$num = 0;
	$pages = ceil(mysql_num_rows($resultDzialy) / 3);
	while ($row = mysql_fetch_assoc($resultDzialy)) {
		$num++;
		$pageNum = ceil($num / 3);
		if($pageNum == $page) echo("<li><a href=\"#cat_".$row['id']."\">".$row['tekst']."</a></li>\n");
		else echo("<li><a href=\"?page=".$pageNum."#cat_".$row['id']."\">".$row['tekst']."</a></li>\n");
	}
?>
</ul>
<?php
echo($strony_text);
?>
<div class="highslide-gallery"> 
<?php
$maxtd = $liczba_zdjec_w_poziomie;
$last_dzial = "-";
$tr = 0;
$max = $maxtd - 1;
$style = 'width: 150px; height: 150px; background-color: black; padding: 0; margin: 0; text-align: center; vertical-align: middle;';
$numm = -1;
$dzialNum = 0;
foreach ($fotos as $f) {
    $numm++;
    $zm = false;
    if ($f['tekst'] != $last_dzial) {
    	if($numm != 0) {
    		if($tr != 0) echo("</tr>");
    		echo("</table>");
   		}
   		echo('<h2><a name="cat_' . $f['dzial_id'] .
            '">' . $f['tekst'] . '</a></h2> <table width="504" cellspacing="18">');
        $tr = 0;
        $last_dzial = $f['tekst'];
    }
    $dopisek = "_small";
    $podpis = "";
    $foto = $f;
    //print_r($foto);
    //echo($_SERVER["DOCUMENT_ROOT"]);
    $bigFotoFile = $_SERVER["DOCUMENT_ROOT"] . '/zdjffeecia/' . $foto['nazwa'] . '.jpg';
        if (file_exists($bigFotoFile)) {
            $wielkosc = getimagesize($bigFotoFile);
            $width = $wielkosc[0];
            $height = $wielkosc[1];
            if ($width > $height) {
                $poziomo = true;
                $pionowo = false;
            } else {
                $poziomo = false;
                $pionowo = true;
            }
            if ($poziomo) $wk = 'width="150"';
            else $wk = 'height="150"';
            if ($tr == 0) echo ('<tr><td width="150" height="150" style="' . $style . '">');
            else echo ('<td width="150" height="150" style="' . $style . '">');
            if (!file_exists($_SERVER["DOCUMENT_ROOT"] . '/zdjffeecia/' . $foto['nazwa'] . $dopisek . '.jpg')) {
                $dopisek = "";
                $podpis = "my.php?obr=";
            }
            $src = '/zdjffeecia/' . $podpis . $foto['nazwa'] . $dopisek . '.jpg';
            echo ('<a href="/zdjffeecia/' . $foto['nazwa'] . '.jpg" class="highslide" onclick="return hs.expand(this, { slideshowGroup: ' . $foto['dzial_id'] .
                '});" ><img ' . $wk . ' style="border: 0;" src="' . $src . '" title="' . $f['tekst'] . ' | ID:' .  $foto['id'] . '" alt="' . $f['tekst'] . '" /> </a><div class="highslide-caption"> 
	<b style="font-size: 1.3em;">' . $f['tekst'] . '</b><br /></div>' . "\n");
            if ($tr == $max)
                echo ("</td></tr>");
            else
                echo ("</td>");
            if ($tr == $max)
                $tr = 0;
            else
                $tr++;

            if ($zm)
                $tr = 0;
        }
        echo ("\n<!--tr: " . $tr . "-->");
    }
    if ($tr != 0)
        echo ("</tr>");

?>
</table>
</div>
<?php
echo($strony_text);
?>
<?php
mysql_close($mysql);
?>									
									
									
									
								</div><!-- .entry-content -->
						</div><!-- #post-## -->							
					</td>
					<?php get_sidebar(); ?>
					</tr>
				</table>
			</div>
		<div id="bottomcontent">&nbsp;</div>
	</div>
</div>
<?php get_footer(); ?>
