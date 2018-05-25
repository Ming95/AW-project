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

		function mostrarComentarios(comentarios){
				var types = JSON.parse(comentarios);
				var parent = document.getElementById("div1");
			for (paso = 0; paso < types.length; paso++) {
				if(paso == 0){
					var linea = document.createElement("hr");
					parent.appendChild(linea);
				}
				var para2 = document.createElement("p");
				var texto2= types[paso].id_correo;
				var node2 = document.createTextNode(texto2);
				para2.appendChild(node2);
				parent.appendChild(para2);
				var para = document.createElement("p");
				var texto= types[paso].fecha_creacion;
				var node = document.createTextNode(texto);
				para.appendChild(node);
				parent.appendChild(para);
				var para1 = document.createElement("p");
				var texto1= types[paso].comentario;
				var node1 = document.createTextNode(texto1);
				para1.appendChild(node1);
				parent.appendChild(para1);
				var linea = document.createElement("hr");
				parent.appendChild(linea);
			}
		}

		function myfunction2(coment){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'none';
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'block';
			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'none';
			document.getElementById("lista2").className = 'active';
			document.getElementById("lista1").className = 'nactive';
			document.getElementById("lista3").className = 'nactive';

			mostrarComentarios(coment);
		}


		function myfunction3(e){
			var elemento1 = document.getElementById("datos1");
			elemento1.style.display = 'none';
			var elemento2 = document.getElementById("datos2");
			elemento2.style.display = 'none';
			var elemento3 = document.getElementById("datos3");
			elemento3.style.display = 'block';

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
