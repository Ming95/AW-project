		function showContent() {
			element = document.getElementById("content");
			check = document.getElementById("check");
			if (check.checked) {
				element.style.display='block';
			}
			else {
				element.style.display='none';
			}
		}
		function valida(e){
			tecla = (document.all) ? e.keyCode : e.which;

			//Tecla de retroceso para borrar, siempre la permite
			if (tecla==8){
				return true;
			}

			// Patron de entrada, en este caso solo acepta numeros
			patron =/[0-9-.]/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}
		

		function myfunction1(e){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'block';
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'none';

			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'none';

			document.getElementById("lista2").className = 'nactive';
			document.getElementById("lista1").className = 'active';
			document.getElementById("lista3").className = 'nactive';
		}

		function insertaComentario(){
			var parent = document.getElementById("div1");
			var para = document.createElement("p");
			var texto = document.getElementById("subject").value;
			var node = document.createTextNode(texto);
			para.appendChild(node);
			parent.appendChild(para);
			var linea = document.createElement("hr");
			parent.appendChild(linea);
		}

		function leerComentario(){
			var texto = document.getElementById("subject").value;
			return texto;
		}

		function visible(elemento,esVisible) {
			var elemento = document.getElementById(elemento);
			if (!esVisible){
				elemento.style.display = 'none';
			}else{
				elemento.style.display = 'block';
			}
		}

 		function volver() {
			window.history.back(-1);
		}
		
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("diapositiva");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
			  slides[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
			  dots[i].className = dots[i].className.replace(" active", "");
		  }
		  if(i>=1){
		  slides[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " active";
		  }
		}
		
		function myfunction1(e){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'block';
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'none';

			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'none';

			document.getElementById("lista2").className = 'nactive';
			document.getElementById("lista1").className = 'active';
			document.getElementById("lista3").className = 'nactive';
			
			
		}
		
		$(document).on('ready',function(){
		
		$("#lista1").on( "click", function() {
			$("#datos1").css("display", "block");
			$("#datos2").css("display", "none");
			$("#datos3").css("display", "none");
			$("#lista1").removeClass('active');
			$("#lista2").removeClass('active');
			$("#lista3").removeClass('active');
			$("#lista1").addClass('active');
			$("#lista2").addClass('nactive');
			$("#lista3").addClass('nactive');
		 });
		$("#lista2").on( "click", function() {
			$("#datos1").css("display", "none");
			$("#datos2").css("display", "block");
			$("#datos3").css("display", "none");
			$("#lista1").addClass('nactive');
			$("#lista2").addClass('active');
			$("#lista3").addClass('nactive');
			$("#lista1").removeClass('active');
			$("#lista2").removeClass('nactive');
			$("#lista3").removeClass('active');
		 });
		$("#lista3").on( "click", function() {
			$("#datos1").css("display", "none");
			$("#datos2").css("display", "none");
			$("#datos3").css("display", "block");
			$("#lista1").addClass('nactive');
			$("#lista2").addClass('nactive');
			$("#lista3").addClass('active');
			$("#lista1").removeClass('active');
			$("#lista2").removeClass('active');
			$("#lista3").removeClass('nactive');
		 });
	});
	
		$(document).on('ready',function(){
		$('#like').click(function(){
			var	id= $("#id-idea").val();
 			var	mail= $("#id-mail").val();
			var	liked= $("#id-liked").val(); 
			var dataString = 'id=' + id + '&mail=' + mail + '&liked=' + liked;
        $.ajax({
                data:  dataString, //datos que se envian a traves de ajax
                url:   '../controllers/like.php', //archivo que recibe la peticion
                type:  'GET', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (result) { //una vez que el archivo recibe el request lo procesa y lo devuelve	
					window.location = '../views/infoIdea.php?id_idea='+id;
			   }
			 });
		  });
		});

		$(document).on('ready',function(){
		$('#boton').click(function(){
			var	id= $("#id-evento").val();
 			var	mail= $("#id-mail").val();
			var	sub= $("#id-sub").val(); 
			var dataString = 'id=' + id + '&mail=' + mail + '&sub=' + sub;
        $.ajax({
                data:  dataString, //datos que se envian a traves de ajax
                url:   '../controllers/suscribe.php', //archivo que recibe la peticion
                type:  'GET', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (result) { //una vez que el archivo recibe el request lo procesa y lo devuelve	
					window.location = '../views/infoevento.php?id_evento='+id;
			   }
			 });
		  });
		});