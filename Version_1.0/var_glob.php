<?
	define( '_AUTOGAN',1);
	define( '_VALID_VVM',1);
	define("MUTEX", $_SERVER['PHP_SELF']);
	
	require_once("FGC.php");
	require_once("FDE.php");
	require_once("FBD.php");
	require_once("FMU.php");
	
	$DDU = array();
	$DDU['Id']   = 1;
	$DDU['Nick'] = "JMartinMachado";
	
	$GLOB_Pagina="http://".$_SERVER['HTTP_HOST']."/";
	$GLOB_Pagina_non_protocol="//".$_SERVER['HTTP_HOST']."/";
	$GLOB_NoSeleccionar="oncontextmenu='return false' ondragstart='return false' onmousedown='return false' onselectstart='return false'";

	if (function_exists('date_default_timezone_set')) {date_default_timezone_set(date_default_timezone_get());}

	if (headers_sent()) {
		echo Headers_Fallaron();
	} else {
		session_start();
		header("Content-Type: text/html; charset=UTF-8");
		header("Connection: close");
		// Prep settings
				/*
		ft_settings_load();
		// Load plugins
		ft_plugins_load();
		ft_invoke_hook('init');
		// Prep language.
		if (file_exists("locales/".LANG.".php")) {
		@include_once("locales/".LANG.".php");
		}
		// Only calculate total dir size if limit has been set.
		if (LIMIT > 0) {
		define('ROOTDIRSIZE', ft_get_dirsize(ft_get_root()));
		}

		$str = "";
		// Request is a file download.
		if (!empty($_GET['method']) && $_GET['method'] == 'getfile' && !empty($_GET['file'])) {
		if (ft_check_login()) {
		ft_sanitize_request();
		// Make sure we don't run out of time to send the file.
		@ignore_user_abort();
		@set_time_limit(0);
		@ini_set("zlib.output_compression", "Off");
		@session_write_close();
		// Open file for reading
		if(!$fdl=@fopen(ft_get_dir().'/'.$_GET['file'],'rb')){
		die("Cannot Open File!");
		} else {
		ft_invoke_hook('download', ft_get_dir(), $_GET['file']);
		header("Cache-Control: ");// leave blank to avoid IE errors
		header("Pragma: ");// leave blank to avoid IE errors
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".htmlentities($_GET['file'])."\"");
		header("Content-length:".(string)(filesize(ft_get_dir().'/'.$_GET['file'])));
		header ("Connection: close");
		sleep(1);
		fpassthru($fdl);
		}
		} else {
		// Authentication error.
		ft_redirect();
		}
		exit;
		} elseif (!empty($_POST['method']) && $_POST['method'] == "ajax") {
		if (ft_check_login()) {
		ft_sanitize_request();
		// Run the ajax hook for modules implementing ajax.
		echo implode('', ft_invoke_hook('ajax', $_POST['act']));
		} else {
		// Authentication error. Send 403.
		header("HTTP/1.1 403 Forbidden");
		echo "<dt class='error'>".t('Login error.')."</dt>";
		}
		exit;
		}
		if (Revisar_Login()) {/*
		// Run initializing functions.
		ft_sanitize_request();
		ft_do_action();
		$str = ft_make_header();
		$str .= ft_make_sidebar();
		$str .= ft_make_body();

		} else {
		/*
		$str .= ft_make_login();

		}
		/*
		$str .= ft_make_footer();
		*/
	}
?>