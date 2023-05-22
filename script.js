// Función para abrir el modal de iniciar sesión
function abrirModalIniciarSesion(tipo) {
  var modal = document.getElementById("modalIniciarSesion");
  var titulo = document.getElementsByTagName("h2")[0];
  
  if (tipo === "iniciarSesion") {
    titulo.innerHTML = "Iniciar Sesión";
  } else {
    titulo.innerHTML = "Registrarse";
  }
  
  modal.style.display = "block";
}

// Función para cerrar el modal de inicio de sesión
function cerrarModalIniciarSesion() {
  var modal = document.getElementById("modalIniciarSesion");
  modal.style.display = "none";
}


function abrirModalRegistrarse(tipo) {
  var modal = document.getElementById("modalRegistrarse");
  var titulo = document.getElementsByTagName("h2")[1];
  
  if (tipo === "registrarse") {
    titulo.innerHTML = "Registrarse";
  } else {
    titulo.innerHTML = "Iniciar Sesión";
  }
  
  modal.style.display = "block";
}

// Función para cerrar el modal de registro
function cerrarModalRegistrarse() {
  var modal = document.getElementById("modalRegistrarse");
  modal.style.display = "none";
}


