document.addEventListener("DOMContentLoaded", function () {
  iniciarApp();
});

function iniciarApp() {
  buscarPorFechaEntrada();
}

function buscarPorFechaEntrada() {
  const fechaEnt = document.querySelector("#fechaEntrada");

  fechaEnt.addEventListener("input", function (e) {
    const fechaSelecEnt = e.target.value;

    window.location = `?fechaEntrada=${fechaSelecEnt}`;
  });
}

/*function buscarPorFechasalida() {
  const fechaSal = document.querySelector("#fechaSalida");

  fechaSal.addEventListener("input", function (e) {
    const fechaSelecSal = e.target.value;

    window.location = `?fechaSalida=${fechaSelecSal}`;
  });
}*/
