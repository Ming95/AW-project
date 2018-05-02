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
		//	alert('holaa1');
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'none';
		//	alert('holaa2');
			
			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'none';
		//	alert('holaa2');
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
		
		function mostrarComentarios(comentarios){
			var types = JSON.parse(comentarios);
			var parent = document.getElementById("div1");
			for (paso = 0; paso < types.length; paso++) {
				var para = document.createElement("p");
				var texto= types[paso].fecha_creacion;
				var node = document.createTextNode(texto);
				para.appendChild(node);
				parent.appendChild(para);
				var para1 = document.createElement("p1");
				var texto1= types[paso].comentario;
				var node1 = document.createTextNode(texto1);
				para1.appendChild(node1);
				parent.appendChild(para1);
				var linea = document.createElement("hr");
				parent.appendChild(linea);
			}
		}
		
		function myf2(){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'none';

			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'block';
			//mostrarComentarios();
			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'none';
			document.getElementById("lista2").className = 'active';
			document.getElementById("lista1").className = 'nactive';
			document.getElementById("lista3").className = 'nactive';
		}
			
		function myfunction2(coment){
			mostrarComentarios(coment);
			myf2();
			//window.location.href = '../controllers/consultar_idea_process.php?id_idea='+id_idea+'&comentario='+1;
		}

		
		function myfunction3(e){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'none';
		//	alert('holaa1');
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'none';
		//	alert('holaa2');
			
			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'block';
		//	alert('holaa2');
			document.getElementById("lista2").className = 'nactive';
			document.getElementById("lista1").className = 'nactive';
			document.getElementById("lista3").className = 'active';
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
		
		function cargarFecha(){
			alert('hola');
		}
		 
