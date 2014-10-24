<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?       require("VariablesGlobales.php")       ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	$meta_Description="Imagenes graciosas con Mucho Humor, Vomitando Alegria...";
	$meta_Keywords="Juan, Martin, Machado, Imagenes,Fun,Humor,Videos On-line,Videos, On-line,vomitando alegria,basura,internet,geek,jokes,interesting, cool,fun collection, fun portfolio, admire,fun,humor,humour";
	$meta_Subject="www.Hitobito.com.ar/imagen";
	$meta_Title="Hitobito - Img's"
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("partearriba.php")         ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	if (!isset($pagina)){ $pagina=0;}
	Escribir_Nuevos($pagina,"img");
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("parteabajo.php")          ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
