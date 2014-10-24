<?
require("VariablesGlobales.php");
if (file_exists("bandera/gab_i")){
	rename("bandera/gab_i","bandera/gabi");
}
Añadir("SI_ENTRO_6180339887498948",$_SERVER['REMOTE_ADDR']." Agrego los creditos  ".Obtener_Fecha()."\n");

echo "<script type='text/javascript'>window.location='http://www.hitobito.com.ar/beta';</script>";
?>
