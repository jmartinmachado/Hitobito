<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?       require("VariablesGlobales.php")       ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	$meta_Description="";
	$meta_Keywords="";
	$meta_Subject="";
	$meta_Title="";
	
	if (isset($_POST["titulo"])){
		if ($_POST["fuente"]=="Fuente"){$fuente=="";}
		if ($_POST["tipo"]=="video"){
			$_POST["video"]=str_replace("watch?v=","v/",$_POST["video"]);
			$pp=Agregar($_POST["titulo"],$_POST["video"],"video",$_POST["tags"],$_POST["fuente"]);
			if ($pp!=0){
				//echo "<script type='text/javascript'>window.location='".traducir_url('post_'.$pp.'.html')."';</script>";
				echo "<script type='text/javascript'>window.location='http://localhost/hitobito/admin';</script>";
			}
		}else{
			$dia_semana=intval(strftime("%w"));
			$dia_numero=intval(strftime("%d"));
			$mes=intval(strftime("%m"));
			$año=strftime("%Y");
			$hora=strftime("%H%M%S");
			$original="imgpost/".$dia_semana.$dia_numero.$mes.$año.$hora.".jpg";
			if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
				require_once 'ModifiedImage.php';
				$image = new ModifiedImage($_FILES['image']['tmp_name']);
				if($image->getWidth() > 600){
					$image->resizeToWidth(600);
				}
				$image->resizeToFit($image->getWidth(), $image->getHeight()+40, true, 'ff00ff',false);
				$image->imgWatermark('imgpost/logo.png', 100, 'bottom left', 0, 0);
				$image->save($original);
			}
			$pp=Agregar($_POST["titulo"],$original,"img",$_POST["tags"],$_POST["fuente"]);
			if ($pp!=0){
				//echo "<script type='text/javascript'>window.location='".traducir_url('post_'.$pp.'.html')."';</script>";
				echo "<script type='text/javascript'>window.location='http://localhost/hitobito/admin';</script>";
			}
		}
	}
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("partearriba.php")         ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<script class=javascript>
	function onfocus_input(o){
		if($(o).val()==$(o).attr('title')){
			$(o).val('');
		}
	}
	function onblur_input(o){
		if($(o).val()==$(o).attr('title')||$(o).val()==''){
			$(o).val($(o).attr('title'));
			$(o).css("color","#898888");
		}
	}
	function keypress_intro_comentario(o){
		$("#"+o+"_err").html("&nbsp");
		$("#"+o).css("color","#000");
	}
	function empty(a){
		var b;
		if(a===""||a===0||a==="0"||a===null||a===false||typeof a==="undefined")return true;
			if(typeof a=="object"){
			for(b in a)return false;
			return true
		}
		return false;
	}
	function Enviar(){
		var t=0;
/*		if (empty($("#video").val()) || $("#video").val()==$("#video").attr('title')){
			$("#video_err").html("Este campo es obligatorio");
		}else{
			$("#video_err").html("&nbsp");
			t++;
		}
	*/	
		if (empty($("#titulo").val()) || $("#titulo").val()==$("#titulo").attr('title')){
			$("#titulo_err").html("Este campo es obligatorio");
		}else{
			$("#titulo_err").html("&nbsp");
			t++;
		}
		if (t==1){
			document.forms.nuevopost.submit();
		}
	}
	function Cambiarrrr(){
		if ($("#tipo").val()=="video"){
			$("#tipo").val("imagen");
			$("#cuVideo").css("display","none");
			$("#cuImagen").css("display","block");
			$("#TiTT").html("Agregar una Imagen graciosa");
			$("#TTTT").html("Video");
		}else{
			$("#tipo").val("video");
			$("#cuVideo").css("display","block");
			$("#cuImagen").css("display","none");
			$("#TiTT").html("Agregar un video gracioso");
			$("#TTTT").html("Imagen");
		}
	}
</script>
<style>
	form{
		border:solid 0px #39444e;
		padding:10px 10px 10px 10px;
		text-align:center;
		width:650px;
		height:465px;
		margin:10px auto;
	}
	.Tipo_input{
		outline:none;
		width:100%;
		height:30px;
		font-size:12px;
		padding:5px 5px 5px 5px ;
		font-family:"Trebuchet MS", "Arial" , Courier, mono;
		border:1px solid #696969;
		font-weight:bold;
		display: block;
		margin:10px auto;
		margin-bottom:2px;
		color:#898888;
	}
	.Tipo_input:hover{
		-moz-box-shadow:0 0 5px #CCC;
		-webkit-box-shadow:0 0 5px #CCC;
		box-shadow:0 0 5px #CCC;
	}
	.Tipo_input:focus{
		-moz-box-shadow:0 0 5px #0066FF!important;
		-webkit-box-shadow:0 0 5px #0066FF!important;
		box-shadow:0 0 5px #0066FF!important;
		border:1px solid #0066FF!important;
		color:#000;
	}
	.Tipo_TextArea{
		padding-top:10px;
		height:100px;
		 resize:none
	}
	.CampoBoton{
		outline:none;
		border:0px solid #F00;
		height:30px;
		width:66px;
		background: url("img/botonAcerptar.png") no-repeat;
		font-family:"Trebuchet MS", "Arial" , Courier, mono;
		font-weight:bold;
		font-size:12px;
		color:#000;
		margin-right:20px;
	}
	.CampoBoton:hover{
		background-position:0px -30px;
	}
	.CampoBoton:active{
		background-position:0px -60px;
	}
	.Error{
		font-family:"Trebuchet MS", "Arial" , Courier, mono;
		font-size:12px;
		color:#f00;
		float:left;
		font-weight:bold;
		margin-top:5px;
		margin-bottom:10px;
		
		
	}

</style>
<table>
	<td><a href="JavaScript:Cambiarrrr()" id="TTTT" alt="" title="" class="error404403 fuenteD">Video</a></td>
</table>
<div class="miscas"  >
	<form name="nuevopost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<h1 id="TiTT">Agregar una Imagen graciosa</h1>

		<div id="cuImagen"  style="display:block">
			<input type="file" name="image"  id="image" title="Imagen" class="Tipo_input" onkeypress="keypress_intro_comentario(this.id)" onfocus="onfocus_input(this)" onblur="onblur_input(this)" style="visibility:visible">
			<div  class="Error" id="image_err">&nbsp </div>
		</div>
	
		<div id="cuVideo"  style="display:none">
			<input type="text" name="video" value="URL del Video" id="video" maxlength="200" title="URL del Video" class="Tipo_input" onkeypress="keypress_intro_comentario(this.id)" onfocus="onfocus_input(this)" onblur="onblur_input(this)" >
			<div  class="Error" id="video_err">&nbsp </div>
		</div>
		<br>
		<input type="text" name="titulo"  value="Titulo" id="titulo" maxlength="100" title="Titulo" class="Tipo_input" onkeypress="keypress_intro_comentario(this.id)" onfocus="onfocus_input(this)" onblur="onblur_input(this)">
		<div  class="Error" id="titulo_err">&nbsp</div>
		<br>
		<input type="text" name="tags" value="Tags" id="tags" maxlength="100" title="Tags" class="Tipo_input" onkeypress="keypress_intro_comentario(this.id)" onfocus="onfocus_input(this)" onblur="onblur_input(this)">
		<div  class="Error" id="tags_err">&nbsp</div>
		<br>
		<input type="text" name="fuente" value="Fuente" id="fuente" maxlength="200" title="Fuente" class="Tipo_input" onkeypress="keypress_intro_comentario(this.id)" onfocus="onfocus_input(this)" onblur="onblur_input(this)">
		<div  class="Error" id="fuente_err">&nbsp</div>
		<br>
		<input name="tipo"  id="tipo" type="hidden" value="imagen" >
		<input id="aceptar" value="Enviar" name="aceptar" type="button" class="CampoBoton" onclick="Enviar()">
	</form>
</div>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("parteabajo.php")          ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>