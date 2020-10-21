$(document).ready(function () {
  $('#guardar-registro').on('submit', function (e) {
    e.preventDefault();

    let datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      datatype: 'json',
      success: function (data) {
        let resultado = JSON.parse(data);
        console.log(resultado);
        if (resultado.respuesta == 'exito') {
          swal(
            'Correcto',
            'Se ha registrado el administrador',
            'success'
          )
        } else {
          swal({
            type: 'error',
            title: 'No se ha registrado el administrador',
            text: 'Tal vez ya existe otro con el mismo user'
          })
        }

      }
    })


  });

  $('#login-admin').on('submit', function (e) {
    e.preventDefault();

    let datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      datatype: 'json',
      success: function (data) {
        let resultado = JSON.parse(data);
        console.log(resultado);
        if (resultado.respuesta == 'exitoso') {
          swal(
            'Correcto',
            'Bienvenid@ ' + resultado.usuario + ' ',
            'success'
          )
          setTimeout(function () {
            window.location.href = 'admin-area.php';
          }, 1000);
        } else {
          swal({
            type: 'error',
            title: '...Ooops',
            text: 'Usuario o contraseña incorrecto'
          })
        }

      }
    })


  });
});
