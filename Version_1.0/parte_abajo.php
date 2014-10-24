<? 	if( !defined( '_AUTOGAN' ) && !defined( '_VALID_VVM' ) ) die( 'Restricted access' ); ?>
		</div>
		<div class="clear"></div>
		<div id="pie" class="clear documentacion"><a href="" title="">Legal</a> &middot; <a href="" title="">Licencia</a> &middot; <a href="" title="">Version 1.0</a></div>
		<script type='text/javascript'>
			$(document).ready (function(){
				$(".menu_item").fadeTo(0, 0.9);
			});
			$(".menu_item").hover(function () {$(this).fadeTo('fast', 1.0);},function () {$(this).fadeTo('fast', 0.9);});
			function votar(post,cuanto) {
				$("#post_"+post+" .post_votar_botones SPAN").fadeTo("slow",0.5).removeClass("pointer").removeAttr("onclick");;
				var L_D = 'ajx=' + encodeURIComponent("voto") + '&' + 'voto=' + encodeURIComponent(cuanto) + '&' + 'id_p=' + encodeURIComponent(post) ;
				$.ajax({
					type: 'POST',
					url: "ajx.php",
					cache: false,
					data:L_D,
					success: function(data) {
						var obj = jQuery.parseJSON(data);
						switch (obj.OK) {
							case 0:
								error();
							break;
							case 1:
								$("#post_"+post+" .post_datos SPAN.post_datos_gusta").text(obj.tt).attr("title","+"+obj.v_p+"/"+"-"+obj.v_n);
								$("#post_"+post+" .post_votar_barra DIV").removeClass("empty").animate({"left": obj.prcj}, 500 );
								$("#post_"+post+" .post_votar_botones SPAN."+cuanto).fadeTo("slow",0.9);
							break;
							case 2:
								alert("NO LOGIN"); // ARREGLAR
							break;
						}
					},
					error: function () {
						error()
					},
				});
				function error () {
					$("#post_"+post+" .post_votar_botones SPAN").fadeTo("slow",1.0).addClass("pointer");
				}
			}
		</script>
	</body>
</html>