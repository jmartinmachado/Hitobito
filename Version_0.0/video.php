<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?       require("VariablesGlobales.php")       ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	$meta_Description="Videos graciosos con Mucho Humor, Vomitando Alegria...";
	$meta_Keywords="Juan, Martin, Machado, Imagenes,Fun,Humor,Videos On-line,Videos, On-line,vomitando alegria,basura,internet,geek,jokes,interesting, cool,fun collection, fun portfolio, admire,fun,humor,humour";
	$meta_Subject="www.Hitobito.com.ar/Video";
	$meta_Title="Hitobito - Video"
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("partearriba.php")         ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	if (!isset($pagina)){ $pagina=0;}
	Escribir_Nuevos($pagina,"video");
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("parteabajo.php")          ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
