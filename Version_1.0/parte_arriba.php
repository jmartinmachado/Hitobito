<? 	if( !defined( '_AUTOGAN' ) && !defined( '_VALID_VVM' ) ) die( 'Restricted access' ); ?>
<? 
	$meta_Keywords="Juan, Martin, Machado, Juan Martin Machado, ".$meta_Keywords;
	$meta_Subject=$GLOB_Pagina.$meta_Subject;
	$meta_canonical=$GLOB_Pagina.$meta_canonical;
	$meta_Title="Hitobito".$meta_Title;
	$meta_revisit="1 day";
	if($Facebook_Pic=="")$Facebook_Pic="img/FB-Pic.jpg";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Blog">
	<!--
	
	+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+-+-+
	|J|u|a|n| |M|a|r|t|í|n| |M|a|c|h|a|d|o|
	+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+-+-+
	
	--> 
	<head>
		<meta name="msvalidate.01" content="F62B435AC3D987645717634BB208D6AB"/> 
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"/>
		<meta name='title' content='<? echo $meta_Title ?>' />
		<meta name='author' content='Juan Martin Machado' />
		<meta name='subject' content='<? echo $meta_Subject ?>' />
		<meta name='description' content='<? echo $meta_Description ?>' />
		<meta name='keywords' content='<? echo $meta_Keywords ?>' />
		<meta name='language' content='spanish' />
		<meta name='revisit' content='1 day' />
		<meta name='distribution' content='global' />
		<meta name='robots' content='all' />
		
		<link rel='canonical' href='<? echo $meta_canonical ?>' /> 
		<link rel="shortcut icon" href="<? echo traducir_url('favicon.ico') ?>" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" type="text/css" href="<? echo traducir_url('css/principal.css') ?>" />

		<meta property="fb:app_id" content="230506060318310"/> 
		<meta property="fb:admins" content="256891047692699"/>

		<meta property="og:title" content="<? echo $meta_Title ?>"/>
		<meta property="og:site_name" content="Movieteka"/>
		<meta property="og:url" content="<? echo $meta_canonical ?>"/>
		<meta property="og:description"  content="<? echo $meta_Description ?>"/>
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="<? echo traducir_url($Facebook_Pic) ?>" />

		<meta itemprop="name" content="<? echo $meta_Title ?>">
		<meta itemprop="description" content="<? echo $meta_Description ?>">
		<meta itemprop="image" content="<? echo traducir_url($Facebook_Pic) ?>">
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript">window.jQuery || document.write('<script src="<? echo traducir_url('js/jquery.min.js') ?>"><\/script>')</script>

		<script src="<? echo traducir_url('js/jQuery.ScrollTo.js') ?>" type="text/javascript"></script>
		<script src="<? echo traducir_url('js/jquery.cookie.js') ?>" type="text/javascript"></script>
		<script src="<? echo traducir_url('js/principal.js') ?>" type="text/javascript"></script>
		
		<title><? echo $meta_Title ?></title>
			
	</head>
	<body>
		
		<? if (bandera("online") || bandera("social")) {?>
		
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-10387805-3']);
			_gaq.push(['_setDomainName', '.hitobito.com.ar']);
			_gaq.push(['_deleteCustomVar', 1]);
			_gaq.push(['_trackPageview']);
		</script>
		
		<? } ?>

		<? if (bandera("online")) {?>

		<script type="text/javascript">
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>

		<? } ?>
		
		<? if (bandera("social")) {?>
		
		<div id="fb-root"></div>
		<script type="text/javascript">
			window.fbAsyncInit = function() {FB.init({appId: '230506060318310', status: true, cookie: true,xfbml: true});FB.api('/me', function(response) {console.log(response.name);});};
			(function() {var e = document.createElement('script'); e.async = true; e.src = document.location.protocol + '//connect.facebook.net/es_LA/all.js';document.getElementById('fb-root').appendChild(e);}());
		</script>
		<script  type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<script type="text/javascript"> 
			if (!window.console) { window.console = {log: function(){}} };
			function rmt(l) { var img = new Image(); img.src = l; document.getElementById('tmp-img').appendChild(img); } 
			function fbWindow(location, address, gaCategory, gaAction, entryLink) { _gaq.push(['_trackEvent', gaCategory, gaAction, entryLink, 1]); var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
			function twttrWindow(location, address, gaCategory, gaAction, entryLink) { _gaq.push(['_trackEvent', gaCategory, gaAction, entryLink, 1]); var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
		</script>
		<script type="text/javascript">
			window.___gcfg = {lang: 'es-419'};
			(function () {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
		
		<? } ?>
		
		<div id="cabecera">
			<a href="<? echo traducir_url('inicio') ?>" class="logo" title="">Hitobito</a>
			<? if (Revisar_Login()) { ?>
				<a href="<? echo traducir_url($DDU['Nick']) ?>" class="menu_item menu_item_config" title=""><? echo $DDU['Nick'] ?></a>
			<? }else{ ?>
				<a href="<? echo traducir_url('pics') ?>" class="menu_item menu_item_sesion " title="">Iniciar sesión</a>
			<? }?>
			<a href="<? echo traducir_url('subir') ?>" class="menu_item menu_item_subir " title="">Subir</a>
			<a href="<? echo traducir_url('azar') ?>" class="menu_item menu_item_azar " title="">Post Al Azar</a>
			<a href="<? echo traducir_url('videos') ?>" class="menu_item menu_item_video " title="">Videos</a>
			<a href="<? echo traducir_url('pics') ?>" class="menu_item menu_item_img " title="">Imagenes</a>
			</div>
		<div id="cuerpo">