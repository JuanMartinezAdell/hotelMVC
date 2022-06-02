let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const reserva = {
  id: "",
  nombre: "",
  fechaEntrada: "",
  fechaSalida: "",
  // usuarioId: "",
  // habitacionId: "",
  habitaciones: [],
};

document.addEventListener("DOMContentLoaded", function () {
  iniciarApp();
});

function iniciarApp() {
  mostrarSeccion(); //Muestra y oculta las secciones
  tabs(); //Cambian la seccion cuando se presione los tabs
  botonesPaginador(); //Agrega o quita los botones del paginador
  paginaSiguiente();
  paginaAnterior();

  consultarAPI(); // Consulta la API en el backend de PHP

  idCliente();
  nombreCliente(); //Añade el nombre del cliente al objeto de cita
  seleccionarFechaEntrada(); //Añade la fecha de entrada de la reserva en el objeto
  seleccionarFechaSalida();

  mostrarResumen(); // Muestra el resumen de la cita
}

function mostrarSeccion() {
  // Ocultar la seccion que tenga la calse de mostrar
  const seccionAnterior = document.querySelector(".mostrar");
  if (seccionAnterior) {
    seccionAnterior.classList.remove("mostrar");
  }

  //Seleccionar la seccion con el paso...
  const pasoSelector = `#paso-${paso}`;
  const seccion = document.querySelector(pasoSelector);
  seccion.classList.add("mostrar");

  // Quita la clase de actual al tab anterior
  const tabAnterior = document.querySelector(".actual");
  if (tabAnterior) {
    tabAnterior.classList.remove("actual");
  }

  // Resalta el tab actual
  const tab = document.querySelector(`[data-paso="${paso}"]`);
  tab.classList.add("actual");
}

function tabs() {
  const botones = document.querySelectorAll(".tabs button");

  botones.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      e.preventDefault();

      paso = parseInt(e.target.dataset.paso);
      mostrarSeccion();
      botonesPaginador();

      if (paso === 3) {
        mostrarResumen();
      }
    });
  });
}

function botonesPaginador() {
  const paginaAnterior = document.querySelector("#anterior");
  const paginaSiguiente = document.querySelector("#siguiente");

  if (paso === 1) {
    paginaAnterior.classList.add("ocultar");
    paginaSiguiente.classList.remove("ocultar");
  } else if (paso === 3) {
    paginaAnterior.classList.remove("ocultar");
    paginaSiguiente.classList.add("ocultar");

    mostrarResumen();
  } else {
    paginaAnterior.classList.remove("ocultar");
    paginaSiguiente.classList.remove("ocultar");
  }

  mostrarSeccion();
}

function paginaAnterior() {
  const paginaAnterior = document.querySelector("#anterior");
  paginaAnterior.addEventListener("click", function () {
    if (paso <= pasoInicial) return;
    paso--;

    botonesPaginador();
  });
}

function paginaSiguiente() {
  const paginaSiguiente = document.querySelector("#siguiente");
  paginaSiguiente.addEventListener("click", function () {
    if (paso >= pasoFinal) return;
    paso++;

    botonesPaginador();
  });
}

async function consultarAPI() {
  try {
    const url = "http://localhost:8080/api/habitaciones";
    const resultado = await fetch(url);
    const habitaciones = await resultado.json();
    mostrarHabitaciones(habitaciones);
  } catch (error) {
    console.log(error);
  }
}

function seleccionarFechaEntrada() {
  const inputFechaEntr = document.querySelector("#fechaEntrada");
  inputFechaEntr.addEventListener("input", function () {
    reserva.fechaEntrada = inputFechaEntr.value;
  });
}

function seleccionarFechaSalida() {
  const inputFechaSal = document.querySelector("#fechaSalida");
  inputFechaSal.addEventListener("input", function () {
    reserva.fechaSalida = inputFechaSal.value;
  });
}

function mostrarHabitaciones(habitaciones) {
  const fechaEntrada = seleccionarFechaEntrada();
  const fechaReserva = reserva.fechaEntrada;

  habitaciones.forEach((habitacion) => {
    const {
      numero,
      tipo,
      precioTAlta,
      precioTBaja,
      estado,
      descripcion,
      fechaEntrada,
      fechaSalida,
    } = habitacion;

    const numeroHabitacion = document.createElement("P");
    numeroHabitacion.classList.add("numero-habitacion");
    numeroHabitacion.textContent = numero;

    const tipoHabitacion = document.createElement("P");
    tipoHabitacion.classList.add("tipo-habitacion");
    tipoHabitacion.textContent = tipo;

    const precioTarifaAlta = document.createElement("P");
    precioTarifaAlta.classList.add("precioAlta-habitacion");
    precioTarifaAlta.textContent = `${precioTAlta}€`;

    const precioTarifaBaja = document.createElement("P");
    precioTarifaBaja.classList.add("precioBaja-habitacion");
    precioTarifaBaja.textContent = `${precioTBaja}€`;

    const estadoHabitacion = document.createElement("P");
    estadoHabitacion.classList.add("estado-habitacion");
    estadoHabitacion.textContent = estado;

    const descripcionHabitacion = document.createElement("P");
    descripcionHabitacion.classList.add("descripcion-habitacion");
    descripcionHabitacion.textContent = descripcion;

    const fechaEntradaHab = document.createElement("P");
    fechaEntradaHab.classList.add("fechaEn-habitacion");
    fechaEntradaHab.textContent = fechaEntrada;

    const fechaSalidaHab = document.createElement("P");
    fechaSalidaHab.classList.add("fechaSa-habitacion");
    fechaSalidaHab.textContent = fechaSalida;

    const habitacionDiv = document.createElement("DIV");
    habitacionDiv.classList.add("habitacion");
    habitacionDiv.dataset.numeroHabitacion = numero;
    habitacionDiv.onclick = function () {
      seleccionarHabitacion(habitacion);
    };

    habitacionDiv.appendChild(numeroHabitacion);
    habitacionDiv.appendChild(tipoHabitacion);
    habitacionDiv.appendChild(precioTarifaAlta);
    habitacionDiv.appendChild(precioTarifaBaja);
    habitacionDiv.appendChild(estadoHabitacion);
    habitacionDiv.appendChild(descripcionHabitacion);
    habitacionDiv.appendChild(fechaEntradaHab);
    habitacionDiv.appendChild(fechaSalidaHab);

    //if (fechaEntrada > fechaReserva)
    document.querySelector("#habitaciones").appendChild(habitacionDiv);
  });
}

function seleccionarHabitacion(habitacion) {
  const { numero } = habitacion;
  const { habitaciones } = reserva;

  // Identificar el elemento al que se le da click
  const divHabitacion = document.querySelector(
    `[data-numero-habitacion="${numero}"]`
  );
  //Comprobar si un servicio ya fue agregado
  if (habitaciones.some((agregado) => agregado.numero === numero)) {
    //Eliminarlo
    reserva.habitaciones = habitaciones.filter(
      (agregado) => agregado.numero !== numero
    );
    divHabitacion.classList.remove("seleccionado");
  } else {
    // Agregarlo
    reserva.habitaciones = [...habitaciones, habitacion];
    divHabitacion.classList.add("seleccionado");
  }

  //console.log(reserva);
}

function idCliente() {
  reserva.id = document.querySelector("#id").value;
}

function nombreCliente() {
  reserva.nombre = document.querySelector("#nombre").value;
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {
  // Previene que se generen más de 1 alerta
  const alertaPrevia = document.querySelector(".alerta");
  if (alertaPrevia) {
    alertaPrevia.remove();
  }

  // Scripting para crear la alerta
  const alerta = document.createElement("DIV");
  alerta.textContent = mensaje;
  alerta.classList.add("alerta");
  alerta.classList.add(tipo);

  const referencia = document.querySelector(elemento);
  referencia.appendChild(alerta);

  if (desaparece) {
    // Eliminar la alerta
    setTimeout(() => {
      alerta.remove();
    }, 3000);
  }
}

function mostrarResumen() {
  const resumen = document.querySelector(".contenido-resumen");

  // Limpiar el Contenido de Resumen
  while (resumen.firstChild) {
    resumen.removeChild(resumen.firstChild);
  }

  if (
    Object.values(reserva).includes("") ||
    reserva.habitaciones.length === 0
  ) {
    mostrarAlerta(
      "Faltan datos para la Reserva, Revisa la Fecha de Entrada y Fecha la de Salida",
      "error",
      ".contenido-resumen",
      false
    );

    return;
  }

  // Formatear DIV
  const { nombre, fechaEntrada, fechaSalida, habitaciones } = reserva;

  //Heading para Habitraciones
  const headingHabitaciones = document.createElement("H3");
  headingHabitaciones.textContent = "Habitaciones Reservadas";
  resumen.appendChild(headingHabitaciones);

  //Mostrar servicios
  habitaciones.forEach((habitacion) => {
    const {
      numero,
      tipo,
      precioTAlta,
      precioTBaja,
      estado,
      descripcion,
      fechaEntrada,
      fechaSalida,
    } = habitacion;
    const contenedorHabitacion = document.createElement("DIV");
    contenedorHabitacion.classList.add("contenedor-habitacion");

    const textoHabitacion = document.createElement("P");
    textoHabitacion.innerHTML = `<span>Habitación:</span> ${numero}`;

    const tipoHabitacion = document.createElement("P");
    tipoHabitacion.textContent = tipo;

    const precioHabitacionAlta = document.createElement("P");
    precioHabitacionAlta.innerHTML = `<span>Precio Tarifa Alta:</span> ${precioTAlta}€`;

    const precioHabitacionBaja = document.createElement("P");
    precioHabitacionBaja.innerHTML = `<span>Precio Tarifa Baja:</span> ${precioTBaja}€`;

    const estadoHabitacion = document.createElement("P");
    estadoHabitacion.textContent = estado;

    const descripcionHabitacion = document.createElement("P");
    descripcionHabitacion.textContent = descripcion;

    const fechaEntradaHabitacion = document.createElement("P");
    fechaEntradaHabitacion.textoContent = fechaEntrada;

    const fechaSalidaHabitacion = document.createElement("P");
    fechaSalidaHabitacion.textContent = fechaSalida;

    contenedorHabitacion.appendChild(textoHabitacion);
    contenedorHabitacion.appendChild(tipoHabitacion);
    contenedorHabitacion.appendChild(precioHabitacionAlta);
    contenedorHabitacion.appendChild(precioHabitacionBaja);
    contenedorHabitacion.appendChild(descripcionHabitacion);
    contenedorHabitacion.appendChild(fechaEntradaHabitacion);
    contenedorHabitacion.appendChild(fechaSalidaHabitacion);

    resumen.appendChild(contenedorHabitacion);
  });

  //Heading para Reservas
  const headingReservas = document.createElement("H3");
  headingReservas.textContent = "Tus Reservas";
  resumen.appendChild(headingReservas);

  const nombreCliente = document.createElement("P");
  nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;

  const fechaEntradaCliente = document.createElement("P");
  fechaEntradaCliente.innerHTML = `<span>Fecha Entrada:</span> ${fechaEntrada}`;

  const fechaSalidaCliente = document.createElement("P");
  fechaSalidaCliente.innerHTML = `<span>Fecha Salida:</span> ${fechaSalida}`;

  // Boton para Crear una cita
  const botonReservar = document.createElement("BUTTON");
  botonReservar.classList.add("boton");
  botonReservar.textContent = "Reservar Habitacion";
  botonReservar.onclick = reservarHabitacion;

  resumen.appendChild(nombreCliente);
  resumen.appendChild(fechaEntradaCliente);
  resumen.appendChild(fechaSalidaCliente);

  resumen.appendChild(botonReservar);
}

async function reservarHabitacion() {
  const {
    nombre,
    fechaEntrada,
    fechaSalida,
    habitaciones,
    // id,
    // habitacionesId,
  } = reserva;

  const numHabitaciones = habitaciones.map((habitacion) => habitacion.numero);
  /*const idHabitaciones = habitaciones.idHabitaciones.map(
    (habitacion) => habitacion.idHabitaciones
  );*/
  // console.log(numHabitaciones);

  //return;

  const datos = new FormData();

  datos.append("habitaciones", numHabitaciones);
  datos.append("fechaEntrada", fechaEntrada);
  datos.append("fechaSalida", fechaSalida);
  //datos.append("usuarioId", id);
  //datos.append("habitacionesId", habitacionesId);

  //console.log([...datos]);

  //return;

  try {
    // Peticion hacia la Api
    const url = "http://localhost:8080/api/reservas";

    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });

    const resultado = await respuesta.json();

    //console.log(resultado.resultado);

    if (resultado.resultado) {
      Swal.fire({
        icon: "success",
        title: "Reserva Creada",
        text: "Tu reserva se ha realizado correctamente",
        button: "OK",
      }).then(() => {
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Hubo un error al crear la reserva",
    });
  }

  console.log([...datos]);
}
