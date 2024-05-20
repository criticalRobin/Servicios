//-----------------------------SOLICITUD GET-----------------------------//

//++++++++ajax
 function cargarEstudiantesH() {
  const tablaCuerpo = $("#tablaEstudiantes tbody");

  $(document).ready(() => {
    $.ajax({
      url: "./controllers/apiRest.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        tablaCuerpo.empty();
        $.each(data, function (_, estudiante) {
          const fila = `
                    <tr>
                        <td>${estudiante.cedula}</td>
                        <td>${estudiante.nombre}</td>
                        <td>${estudiante.apellido}</td>
                        <td>${estudiante.direccion}</td>
                        <td>${estudiante.telefono}</td>
                    </tr>`;
          tablaCuerpo.append(fila);
        });
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });
}
cargarEstudiantesH();

//-----------------------------SOLICITUD POST-----------------------------//
//++++++++fetch
document
  .getElementById("formEstudiante")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData();
    formData.append("cedula", document.getElementById("cedula").value);
    formData.append("nombre", document.getElementById("nombre").value);
    formData.append("apellido", document.getElementById("apellido").value);
    formData.append("direccion", document.getElementById("direccion").value);
    formData.append("telefono", document.getElementById("telefono").value);

    fetch("./controllers/apiRest.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Success:", data);
        cargarEstudiantesH();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });

//++++++++ajax
/* $('#formEstudiante').on('submit', function(event) {
    event.preventDefault();

    const formData = {
        cedula: $('#cedula').val(),
        nombre: $('#nombre').val(),
        apellido: $('#apellido').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val()
    };

    $.ajax({
        url: './controllers/apiRest.php',
        type: 'POST',
        data: formData,
        success: function(data) {
              
            console.log('Success:', data);
            cargarEstudiantesH();  
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}); */

//-----------------------------SOLICITUD PUT-----------------------------//

//++++++++ajax
$(document).ready(function () {
  $("#formEditarEstudiante").on("submit", function (event) {
    event.preventDefault();

    const cedula = $("#cedulaEditar").val();
    const nombre = $("#nombreEditar").val();
    const apellido = $("#apellidoEditar").val();
    const direccion = $("#direccionEditar").val();
    const telefono = $("#telefonoEditar").val();

    $.ajax({
      url: "./controllers/apiRest.php?cedula=" + cedula,
      type: "PUT",
      dataType: "json",
      data: JSON.stringify({
        nombre: nombre,
        apellido: apellido,
        direccion: direccion,
        telefono: telefono,
      }),
      contentType: "application/json",
      success: function (data) {
        console.log("Success:", data);
        cargarEstudiantesH();
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });
});

//-----------------------------SOLICITUD DELETE-----------------------------//


//++++++++ajax
$(document).ready(function () {
  $("#formEliminarEstudiante").on("submit", function (event) {
    event.preventDefault();

    const cedula = $("#cedulaEliminar").val();

    $.ajax({
      url: "./controllers/apiRest.php?cedula=" + cedula,
      type: "DELETE",
      success: function (data) {
        console.log("Success:", data);
        cargarEstudiantesH();
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });
});
