<? /*~~~~~~~~~~~~~~	~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'var_glob.php'        ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<? 	if( !defined( '_AUTOGAN' ) && !defined( '_VALID_VVM' ) ) die( 'Restricted access' ); ?>
<? 
	switch ($_POST['ajx']) {
		case "mp":
			switch ($_POST['tp']) { 
				case "t":
					echo json_encode(Escribir_Post($_POST['p'],"todo",$DDU['Id']));
				break;
				case "p":
					echo json_encode(Escribir_Post($_POST['p'],"p",$DDU['Id']));
				break;
				case "v":
					echo json_encode(Escribir_Post($_POST['p'],"v",$DDU['Id']));
				break;
			}
		break;
		case "voto":
			if (Revisar_Login()){
				echo json_encode(Votar($_POST['id_p'],$DDU['Id'],$_POST['voto']));
			}else{
				echo json_encode(array("OK" => 2));
			}
		break;
		case "acm":
			echo Actualizar_Comentarios($_POST['id_p'],$_POST['v']);
		break;
		
	}
	
?>