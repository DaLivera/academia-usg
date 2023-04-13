

function cambiarEstado() {
	var valEstado = $('#selectEstado').val();
	// GET FORM INPUT
	var data_Estados = new FormData();
	data_Estados.append("valEstado", valEstado);
	// AJAX
	var xhr_dataEstados = new XMLHttpRequest();
	xhr_dataEstados.open("POST", "js/get_municipios.php", true);
	xhr_dataEstados.onload = function () {
		if (this.status == 200) {
			var res_listaMunicipios = JSON.parse(this.response);
			if (res_listaMunicipios.status == true) {
				setTimeout(function () {
					document.getElementById("municipio_e").innerHTML = res_listaMunicipios["listaMunicipios"];
					//alert("VALOR Municipio: " + valMunicipio );
				}, 200);
			} else {
				alert("ERROR DE CARGA DE DATOS");
			}
		} else {
			alert("ERROR AL CARGAR ARCHIVO PHP, VALOR " + valEstado );
		}
	};
	xhr_dataEstados.send(data_Estados);
}

function cambiarEstadoEdicioninstaladores(idinstalador) {
  var valEstado = $('#selectEstadoinstaladores'+idinstalador).val();
  // GET FORM INPUT
  var data_Estados = new FormData();
  data_Estados.append("valEstado", valEstado);
  // AJAX
  var xhr_dataEstados = new XMLHttpRequest();
  xhr_dataEstados.open("POST", "js/get_municipios.php", true);
  xhr_dataEstados.onload = function () {
    if (this.status == 200) {
      var res_listaMunicipios = JSON.parse(this.response);
      if (res_listaMunicipios.status == true) {
        setTimeout(function () {
          document.getElementById("municipio_eInstaladores"+idinstalador).innerHTML = res_listaMunicipios["listaMunicipios"];
          //alert("VALOR Municipio: " + valMunicipio );
        }, 200);
      } else {
        alert("ERROR DE CARGA DE DATOS");
      }
    } else {
      alert("ERROR AL CARGAR ARCHIVO PHP, VALOR " + valEstado );
    }
  };
  xhr_dataEstados.send(data_Estados);
}

function cambiarEstadoGuardarinstaladores(idinstalador) {
  var valEstado = $('#selectEstadoguardar').val();
  // GET FORM INPUT
  var data_Estados = new FormData();
  data_Estados.append("valEstado", valEstado);
  // AJAX
  var xhr_dataEstados = new XMLHttpRequest();
  xhr_dataEstados.open("POST", "js/get_municipios.php", true);
  xhr_dataEstados.onload = function () {
    if (this.status == 200) {
      var res_listaMunicipios = JSON.parse(this.response);
      if (res_listaMunicipios.status == true) {
        setTimeout(function () {
          document.getElementById("municipio_eGuardar").innerHTML = res_listaMunicipios["listaMunicipios"];
          //alert("VALOR Municipio: " + valMunicipio );
        }, 200);
      } else {
        alert("ERROR DE CARGA DE DATOS");
      }
    } else {
      alert("ERROR AL CARGAR ARCHIVO PHP, VALOR " + valEstado );
    }
  };
  xhr_dataEstados.send(data_Estados);
}


function validarRegistro() {

  var email_t = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

/*
    $curso = $_POST['curso'];
    $diacurso = $_POST['diacurso'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $dianacimiento = $_POST['dianacimiento'];
    $mesnacimiento = $_POST['mesnacimiento'];
    $anionacimiento = $_POST['anionacimiento'];
    $genero = $_POST['genero'];
    $infoProductos = $_POST['infoProductos'];
    */

  var curso = document.forms["registro"]["curso"].value;
  var diacurso = document.forms["registro"]["diacurso"].value;
  var nombre = document.forms["registro"]["nombre"].value;
  var paterno = document.forms["registro"]["paterno"].value;
  var materno = document.forms["registro"]["materno"].value;
  var mail = document.forms["registro"]["mail"].value;
  var telefono = document.forms["registro"]["telefono"].value;
  var estado = document.forms["registro"]["estado"].value;
  var municipio = document.forms["registro"]["municipio"].value;
  var dianacimiento = document.forms["registro"]["dianacimiento"].value;
  var mesnacimiento = document.forms["registro"]["mesnacimiento"].value;
  var anionacimiento = document.forms["registro"]["anionacimiento"].value;
  var genero = document.forms["registro"]["genero"].value;
  var infoProductos = document.forms["registro"]["infoProductos"].value;

  if (diacurso == 0) {
    var error = true;
    $(".diacurso").addClass("alerta");
  } else {
    $(".diacurso").removeClass("alerta");
  }
  if (nombre == false || nombre.length < 3) {
    var error = true;
    $(".nombre").addClass("alerta");
  } else {
    $(".nombre").removeClass("alerta");
  }
  if (paterno == false || paterno.length < 3) {
    var error = true;
    $(".paterno").addClass("alerta");
  } else {
    $(".paterno").removeClass("alerta");
  }
  if (materno == false || materno.length < 3) {
    var error = true;
    $(".materno").addClass("alerta");
  } else {
    $(".materno").removeClass("alerta");
  }
  if (mail == false || !email_t.test(mail)) {
    var error = true;
    $(".mail").addClass("alerta");
  } else {
    $(".mail").removeClass("alerta");
  }
  if (telefono == false || telefono.length < 8) {
    var error = true;
    $(".telefono").addClass("alerta");
  } else {
    $(".telefono").removeClass("alerta");
  }
  if (estado == 0) {
    var error = true;
    $(".estado").addClass("alerta");
  } else {
    $(".estado").removeClass("alerta");
  }
  if (municipio == 0) {
    var error = true;
    $(".municipio").addClass("alerta");
  } else {
    $(".municipio").removeClass("alerta");
  }
  if (dianacimiento == 0) {
    var error = true;
    $(".dianacimiento").addClass("alerta");
  } else {
    $(".dianacimiento").removeClass("alerta");
  }
  if (mesnacimiento == 0) {
    var error = true;
    $(".mesnacimiento").addClass("alerta");
  } else {
    $(".mesnacimiento").removeClass("alerta");
  }
  if (anionacimiento == 0) {
    var error = true;
    $(".anionacimiento").addClass("alerta");
  } else {
    $(".anionacimiento").removeClass("alerta");
  }
  if (genero == false) {
    var error = true;
    $(".genero").addClass("alerta");
  } else {
    $(".genero").removeClass("alerta");
  }
  if (infoProductos == false) {
    var error = true;
    $(".infoProductos").addClass("alerta");
  } else {
    $(".infoProductos").removeClass("alerta");
  }


   
  if (error == true) {
    alert('Debes llenar todos los datos solicitados.');
    return false;
  } else {
    return true;
    //alert('Tu mensaje de contacto ha sido enviado.');
  }
}


function validarContacto() {

  var email_t = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

/*
    $curso = $_POST['curso'];
    $diacurso = $_POST['diacurso'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $dianacimiento = $_POST['dianacimiento'];
    $mesnacimiento = $_POST['mesnacimiento'];
    $anionacimiento = $_POST['anionacimiento'];
    $genero = $_POST['genero'];
    $infoProductos = $_POST['infoProductos'];
    */

  var programa = document.forms["contacto"]["programa"].value;
  var nombre = document.forms["contacto"]["nombre"].value;
  var apellidos = document.forms["contacto"]["apellidos"].value;
  var mail = document.forms["contacto"]["mail"].value;
  var telefono = document.forms["contacto"]["telefono"].value;
  var pais = document.forms["contacto"]["pais"].value;
  var checkAdP = document.forms["contacto"]["checkAdP"].value;

  if (programa == 0) {
    var error = true;
    $(".programa").addClass("alerta");
  } else {
    $(".programa").removeClass("alerta");
  }
  if (nombre == false || nombre.length < 3) {
    var error = true;
    $(".nombre").addClass("alerta");
  } else {
    $(".nombre").removeClass("alerta");
  }
  if (apellidos == false || apellidos.length < 3) {
    var error = true;
    $(".apellidos").addClass("alerta");
  } else {
    $(".apellidos").removeClass("alerta");
  }
  if (mail == false || !email_t.test(mail)) {
    var error = true;
    $(".mail").addClass("alerta");
  } else {
    $(".mail").removeClass("alerta");
  }
  if (telefono == false || telefono.length < 8) {
    var error = true;
    $(".telefono").addClass("alerta");
  } else {
    $(".telefono").removeClass("alerta");
  }
  if (pais == false || pais.length < 3) {
    var error = true;
    $(".pais").addClass("alerta");
  } else {
    $(".pais").removeClass("alerta");
  }
  if (checkAdP == false) {
    var error = true;
    $(".checkAdP").addClass("alerta");
  } else {
    $(".checkAdP").removeClass("alerta");
  }


   
  if (error == true) {
    alert('Debes llenar todos los datos solicitados.');
    return false;
  } else {
    return true;
    //alert('Tu mensaje de contacto ha sido enviado.');
  }
}



function validarSesion() {
  var cliente = document.forms["iniciarsesionclientes"]["clienteSelect"].value;
  var email = document.forms["iniciarsesionclientes"]["usuarioCliente"].value;
  var email_t = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var pass = document.forms["iniciarsesionclientes"]["passwCliente"].value;
  var pass_t = /(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{6,18}/;
  //var passwrepetir = document.forms["mensajedecontacto"]["passwrepetir"].value;
  //var nombre = document.forms["mensajedecontacto"]["quenombre"].value;
  //var comentarios = document.forms["mensajedecontacto"]["quecomentarios"].value;
  //var apellidop = document.forms["mensajedecontacto"]["paternoUsuario"].value;
  //var apellidom = document.forms["mensajedecontacto"]["maternoUsuario"].value;
  //var estado = document.forms["mensajedecontacto"]["queestado"].value;
  //var estado = document.getElementsByName("estado")[0].value;
  //var empresa = document.forms["mensajedecontacto"]["empresa"].value;
  //var telefono = document.forms["mensajedecontacto"]["telefono"].value;
  //var palabra_v = /^[A-Za-z]{2,}$/;
  //var tel_v = /^[0-9]{8,10}$/;
  //var palabra_v = /^[A-Za-z]{2,}$/;

  if (cliente == 0) {
    alert('Debes seleccionar el cliente.');
    var error = true;
  } else {
  }
  if (email == "" || !email_t.test(email)) {
    //$(".registroEmail").addClass("inputError");
    alert('Debes ingresar tu correo electrónico 1.');
    var error = true;
  } else {
    //$(".registroEmail").removeClass("inputError");
  }
  if (pass == "" || !pass_t.test(pass)) {
    //$(".registroEmail").addClass("inputError");
    alert('Debes ingresar tu contraseña 1.');
    var error = true;
  } else {
    //$(".registroEmail").removeClass("inputError");
  }

  /*
  if (nombre.trim() == "") {
    $(".registroNombre").addClass("inputError");
    //alert('Debes escribir tu nombre.');
    var error = true;
  } else {
    $(".registroNombre").removeClass("inputError");
  }

  if (comentarios.trim() == "") {
    $(".registroComentario").addClass("inputError");
    //alert('Debes escribir tu nombre.');
    var error = true;
  } else {
    $(".registroComentario").removeClass("inputError");
  }

  if (estado == 0) {
    $(".registroEstado").addClass("inputError");
    //alert('Debes seleccionar tu Estado donde vives. Estado: ' + valorEstado);
    var error = true;
  } else {
    $(".registroEstado").removeClass("inputError");
  }
  */

  if (error == true) {
    return false;
  } else {
    return true;
    //alert('Tu mensaje de contacto ha sido enviado.');
  }
}

function validarSesionchilen() {
  var email = document.forms["iniciarsesionchilen"]["usuarioSesionchilen"].value;
  var email_t = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var pass = document.forms["iniciarsesionchilen"]["passwSesionchilen"].value;
  var pass_t = /(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{6,18}/;
  //var passwrepetir = document.forms["mensajedecontacto"]["passwrepetir"].value;
  //var nombre = document.forms["mensajedecontacto"]["quenombre"].value;
  //var comentarios = document.forms["mensajedecontacto"]["quecomentarios"].value;
  //var apellidop = document.forms["mensajedecontacto"]["paternoUsuario"].value;
  //var apellidom = document.forms["mensajedecontacto"]["maternoUsuario"].value;
  //var estado = document.forms["mensajedecontacto"]["queestado"].value;
  //var estado = document.getElementsByName("estado")[0].value;
  //var empresa = document.forms["mensajedecontacto"]["empresa"].value;
  //var telefono = document.forms["mensajedecontacto"]["telefono"].value;
  //var palabra_v = /^[A-Za-z]{2,}$/;
  //var tel_v = /^[0-9]{8,10}$/;
  //var palabra_v = /^[A-Za-z]{2,}$/;
  if (email == "" || !email_t.test(email)) {
    //$(".registroEmail").addClass("inputError");
    alert('Debes ingresar tu correo electrónico 2.');
    var error = true;
  } else {
    //$(".registroEmail").removeClass("inputError");
  }

  if (pass == "" || !pass_t.test(pass)) {
    //$(".registroEmail").addClass("inputError");
    alert('Debes ingresar tu contraseña 2.');
    var error = true;
  } else {
    //$(".registroEmail").removeClass("inputError");
  }

  /*
  if (nombre.trim() == "") {
    $(".registroNombre").addClass("inputError");
    //alert('Debes escribir tu nombre.');
    var error = true;
  } else {
    $(".registroNombre").removeClass("inputError");
  }

  if (comentarios.trim() == "") {
    $(".registroComentario").addClass("inputError");
    //alert('Debes escribir tu nombre.');
    var error = true;
  } else {
    $(".registroComentario").removeClass("inputError");
  }

  if (estado == 0) {
    $(".registroEstado").addClass("inputError");
    //alert('Debes seleccionar tu Estado donde vives. Estado: ' + valorEstado);
    var error = true;
  } else {
    $(".registroEstado").removeClass("inputError");
  }
  */

  if (error == true) {
    return false;
  } else {
    return true;
    //alert('Tu mensaje de contacto ha sido enviado.');
  }
}

tinymce.init({
    selector: 'textarea#descripcion',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});