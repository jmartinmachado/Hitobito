<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?       require("VariablesGlobales.php")       ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	$CANT=3;
	$Fecha= date("Y-m-d");
	$Nbre_Archivo="sitemap/sitemap_".$CANT.".xml";
	
	if (!unlink("sitemap/sitemap_".$CANT.".xml")){ 
		echo 'no se pudo borrar el archivo :'."sitemap.xml"; 
	} else {
		$Contenido="<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
		/*$Contenido="
		<url>
			<loc>http://www.hitobito.com.ar/</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>
		<url>
			<loc>http://www.hitobito.com.ar/imagen</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>
		<url>
			<loc>http://www.hitobito.com.ar/video</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>
		<url>
			<loc>http://www.hitobito.com.ar/legal</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>
		<url>
			<loc>http://www.hitobito.com.ar/licencia</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>
		<url>
			<loc>http://www.hitobito.com.ar/beta</loc>
			<lastmod>2011-08-14</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>";*/
		Añadir($Nbre_Archivo,$Contenido);
		$FBD_CON=Conectar();
		$id=1000*($CANT-1);
		while ($id!=0 && $id<(1000*$CANT)){
			/*$Datos_Post=Obtener_Post($id);*/
			/*
			$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `id` =$id LIMIT 0 , 2",$FBD_CON);
			if(mysql_affected_rows()>0) {
				while($fila=mysql_fetch_array($sql)){
					$idx=$fila["id"];
					$titulo=$fila["titulo"];
					$valor=$fila["valor"];
					$tipo=$fila["tipo"];
					$tags=$fila["tags"];
					$fuente=$fila["fuente"];
					break;
				}
			}*/
			$Contenido_1="
		<url>
			<loc>http://www.hitobito.com.ar/post_".$id.".html</loc>
			<lastmod>".$Fecha."</lastmod>
			<changefreq>always</changefreq>
			<priority>1.0</priority>
		</url>";
			Añadir($Nbre_Archivo,$Contenido_1);
			$id=Art_Art_Siguiente($id);
		}
		}
		mysql_close($FBD_CON);
		Añadir($Nbre_Archivo,"	</urlset>");
?>