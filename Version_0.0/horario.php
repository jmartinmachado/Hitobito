<html>
<head>
	<title>Horarios</title>
</head>
	<script language="JavaScript">
	function sumaTiempos(t1, t2){
		var dot1 = t1.indexOf(":");
		var dot2 = t2.indexOf(":");
		var m1 = t1.substr(0, dot1);
		var m2 = t2.substr(0, dot2);
		var s1 = t1.substr(dot1 + 1);
		var s2 = t2.substr(dot2 + 1);
		var sRes = (Number(s1) + Number(s2));
		var mRes;
		var addMinute = false;
		if (sRes >= 60){
			addMinute = true;
			sRes -= 60;
		}
		mRes = (Number(m1) + Number(m2) + (addMinute? 1: 0));
		
		if (mRes>=24){
			mRes=0;
		}
		return Agregar_Cero(String(mRes)) + ":" + Agregar_Cero(String(sRes));
	}
	function Agregar_Cero(var1){
		if (var1.length==1){
			var1="0"+var1;
		}
		return var1;
	}
	function calculaT3(){
		document.getElementById("Horario").innerHTML= sumaTiempos(document.getElementById("Horario").innerHTML,"00:30");
	}
	</script>
	<style>
		TD{
			text-align: center;
			font-weight: bold;
		}
		#Horario{
			font-size: 110pt;
			font-family: "Trebuchet MS";
			color: #E00A0A;
		}
		BUTTON{
			font-weight: bold;
			font-size: 85pt;
			font-family: "Trebuchet MS";
		}
	</style>
	<body>
		<table border=0 width="100%" height="100%">
			<tr><td id="Horario">00:00</td></tr>
			<tr><td><button type="button"  onclick="calculaT3()" >OKS</button></td></tr>
		</table>
	</body>
</html>