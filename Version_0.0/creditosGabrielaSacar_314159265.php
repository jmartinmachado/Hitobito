<?
require("VariablesGlobales.php");
if (file_exists("bandera/gabi")){
	rename("bandera/gabi","bandera/gab_i");
}
Añadir("SI_ENTRO_6180339887498948",$_SERVER['REMOTE_ADDR']." Saco los creditos  ".Obtener_Fecha()."\n");

echo "<script type='text/javascript'>window.location='http://www.hitobito.com.ar/beta';</script>";
?>
