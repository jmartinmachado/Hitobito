<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<!--

+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+-+-+
|J|u|a|n| |M|a|r|t|i|n| |M|a|c|h|a|d|o|
+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+-+-+

-->
<html>
	<head>
		<?
			if (!isset($meta_Description)){
				$meta_Description="Vomitando Alegria...";
			}
			if (!isset($meta_Keywords)){
				$meta_Keywords="Juan, Martin, Machado, Imagenes,Fun,Humor,Videos On-line,Videos, On-line,vomitando alegria,basura,internet,geek";
			}
			if (!isset($meta_Subject)){
				$meta_Subject="www.Hitobito.com.ar";
			}
			if (!isset($meta_Title)){
				$meta_Title="Hitobito";
			}
		?>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
		<meta name='title' content='<? echo $meta_Title ?>'>
		<meta name='author' content='Juan Martin Machado'>
		<meta name='subject' content='<? echo $meta_Subject ?>'>
		<meta name='description' content='<? echo $meta_Description ?>'>
		<meta name='keywords' content='<? echo $meta_Keywords ?>'>
		<meta name='language' content='spanish'>
		<meta name='revisit' content='1 day'>
		<meta name='distribution' content='global'>
		<meta name='robots' content='all'>
		<meta property="og:title" content="<? echo $meta_Title ?>"/> 
		<meta property="og:site_name" content="Hitobito"/> 
		<meta property="og:url" content="<? echo $meta_Subject ?>" /> 
		<meta property="fb:app_id" content="230506060318310"/> 
		<meta property="fb:admins" content="1577529904"/>
		<title><? echo $meta_Title ?> </title>
	</head>
	<link href="css/principal.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/principal.js" type="text/javascript"></script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-10387805-3']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>

	<body>
		<div id="header">
			<div id="Midleheader">
				<a href="http://www.Hitobito.com.ar">
					<div class="logo"></div>
					<div class="logo logoi" id="resplandor" ></div>
				</a>
			</div>
			<div id="Menus">
				<a href="<? echo traducir_url("inicio") ?>" class="Menus_Boton Menus_Boton_ini" title="" ></a>
				<a href="<? echo traducir_url("imagen") ?>" class="Menus_Boton Menus_Boton_img" title="" ></a>
				<a href="<? echo traducir_url("video") ?>" class="Menus_Boton Menus_Boton_vid" title="" ></a>
			</div>
		</div>
		<div id="container">
			<div class="C_Bordes"></div><div  class="C_Cuerpo"></div><div class="C_Bordes C_Bordes_2"></div>
			<div class="Container_Cuerpo">