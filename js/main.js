(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('mapa')) {
      var map = L.map('mapa').setView([41.456128, 2.205391], 20);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([41.456128, 2.205391]).addTo(map)
        .bindPopup('Hotel Ibis Santa Coloma')
        .openPopup();
    }

    // Datos de usuario
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let email = document.getElementById('email');

    // Campos reservas
    let doble = document.getElementById('doble');
    let individual = document.getElementById('individual');
    let triple = document.getElementById('triple');

    // botones y divs
    let calcular = document.getElementById('calcular');
    let errorDiv = document.getElementById('error');
    let botonRegistro = document.getElementById('btnRegistro');
    let lista_producto = document.getElementById('lista-productos');
    let suma = document.getElementById('suma-total')

    // extras 
    let parking = document.getElementById('parking');
    let desayuno = document.getElementById('desayuno');

    if (document.getElementById('calcular')) {


      calcular.addEventListener('click', calcularMontos);

      doble.addEventListener('blur', mostrarReservas);
      individual.addEventListener('blur', mostrarReservas);
      triple.addEventListener('blur', mostrarReservas);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarMail);

      function validarCampos() {
        if (this.value == '') {
          errorDiv.style.display = 'block';
          errorDiv.innerHTML = 'Debes rellenar todos los campos';
          this.style.border = '1px solid red';
          errorDiv.style.border = '1px solid red';
        } else {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccc';
        }
      }

      function validarMail() {
        if (this.value.indexOf("@") > -1) {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccc';
        } else {
          errorDiv.style.display = 'block';
          errorDiv.innerHTML = 'Debes escribir un email';
          this.style.border = '1px solid red';
          errorDiv.style.border = '1px solid red'
        }
      }


      function calcularMontos(event) {
        event.preventDefault();
        let reservasDoble = parseInt(doble.value, 10) || 0;
        let reservasIndividual = parseInt(individual.value, 10) || 0;
        let reservasTriple = parseInt(triple.value, 10) || 0;
        let cantParking = parseInt(parking.value, 10) || 0;
        let cantDesayuno = parseInt(desayuno.value, 10) || 0;

        let totalPagar = (reservasDoble * 66) + (reservasIndividual * 65) + (reservasTriple * 77) + (cantParking * 10) + (cantDesayuno * 6.90);

        let listadoProductos = [];

        if (reservasDoble >= 1) {
          listadoProductos.push(reservasDoble + ' Habitaciones dobles');
        }
        if (reservasIndividual >= 1) {
          listadoProductos.push(reservasIndividual + ' Habitaciones individuales');
        }
        if (reservasTriple >= 1) {
          listadoProductos.push(reservasTriple + ' Habitaciones triples');
        }
        if (cantParking >= 1) {
          listadoProductos.push(cantParking + ' Parking');
        }
        if (cantDesayuno >= 1) {
          listadoProductos.push(cantDesayuno + ' Desayuno');
        }

        lista_producto.style.display = "block";

        lista_producto.innerHTML = '';
        for (let i = 0; i < listadoProductos.length; i++) {
          lista_producto.innerHTML += listadoProductos[i] + '</br>'
        }

        suma.innerHTML = '€ ' + totalPagar.toFixed(2);

      }

      function mostrarReservas() {
        let reservasDoble = parseInt(doble.value, 10) || 0;
        let reservasIndividual = parseInt(individual.value, 10) || 0;
        let reservasTriple = parseInt(triple.value, 10) || 0;

        let reservaElegida = [];

        if (reservasDoble > 0) {
          reservaElegida.push('hab_doble');
          console.log(reservaElegida);
        }
        if (reservasIndividual > 0) {
          reservaElegida.push('hab_individual');
          console.log(reservaElegida);
        }
        if (reservasTriple > 0) {
          reservaElegida.push('hab_triple');
          console.log(reservaElegida);
        }

        for (let i = 0; i < reservaElegida.length; i++) {
          document.getElementById(reservaElegida[i]).style.display = 'block';

        }
      }

    }

  }); // DOM content loaded
})();

$(function () {

  let windowHeight = $(window).height();
  let barraAltura = $('.barra').innerHeight();

  //menu fijo
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();

    if (scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({
        'margin-top': barraAltura + 'px'
      });
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({
        'margin-top': '0px'
      });
    };

  });

  // menu responsive

  $('.menu-movil').on('click', function () {
    $('.navegacion-principal').slideToggle();
  })


  //pisos
  $('.programa-evento .info-entrada:first').show();


  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function () {

    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');

    $('.ocultar').hide();

    let enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);

    return false;

  })

  // animaciones números

  $('.resumen-evento li:nth-child(1) p').animateNumber({
    number: 6
  }, 1200);
  $('.resumen-evento li:nth-child(2) p').animateNumber({
    number: 15
  }, 1200);
  $('.resumen-evento li:nth-child(3) p').animateNumber({
    number: 10
  }, 1200);
  $('.resumen-evento li:nth-child(4) p').animateNumber({
    number: 9
  }, 1200);

});
