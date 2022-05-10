let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const cita = {
  nombre: "",
  fecha: "",
  hora: "",
  servicios: [],
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

  nombreCliente();
  seleccionarFecha(); // Añade la fecha de la cita en el objeto
  seleccionarHora(); //Añadse la hora de la cita en el objeto

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
    });
  });
}

function botonesPaginador() {
  const paginaSiguiente = document.querySelector("#siguiente");
  const paginaAnterior = document.querySelector("#anterior");

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
    const url = "http://localhost:8080/api/hotel";
    const resultado = await fetch(url);
    const reservas = await resultado.json();
    mostrarHabitaciones(habitaciones);
  } catch (error) {
    console.log(error);
  }
}

function mostrarHabitaciones(habitaciones) {
  reservas.forEach((habitacion) => {
    const {
      numero,
      tipo,
      precioTAlta,
      precioTBaja,
      estado,
      imagen,
      descripcion,
      fechaEntrada,
      fechaSalida,
    } = habitacion;

    //console.log(numero);

    const numeroHabitacion = document.createElement("P");
    numeroHabitacion.classList.add("numero-habitacion");
    numeroHabitacion.textContent = numero;

    const tipoHabitacion = document.createElement("P");
    tipoHabitacion.classList.add("tipo-habitacion");
    tipoHabitacion.textContent = tipo;

    const precioTarifaAlta = document.createElement("P");
    precioTarifaAlta.classList.add("precioAlta-servicio");
    precioTarifaAlta.textContent = `${precio}€`;

    const precioTarifaBaja = document.createElement("P");
    precioTarifaBaja.classList.add("precioBaja-servicio");
    precioTarifaBaja.textContent = `${precio}€`;

    const fechaEntradaHab = document.createElement("P");
    fechaEntradaHab.classList.add("fechaEn-habitacion");
    fechaEntradaHab.textContent = tipo;

    const fechaSalidaHab = document.createElement("P");
    fechaSalidaHab.classList.add("fechaSa-habitacion");
    fechaSalidaHab.textContent = tipo;

    const servicioDiv = document.createElement("DIV");
    servicioDiv.classList.add("habitacion");
    servicioDiv.dataset.idHabitacion = id;
    servicioDiv.onclick = function () {
      seleccionarServicio(habitacion);
    };

    servicioDiv.appendChild(numeroHabitacion);
    servicioDiv.appendChild(precioHbaitacion);

    document.querySelector("#habitaciones").appendChild(servicioDiv);
  });
}
