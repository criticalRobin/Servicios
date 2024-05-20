//import { cargarEstudiantesH } from './requestsLogic.js';

//Cargar datos a la tabla

function cargarDatos() {
  const tablaCuerpo = $("#estudiantes tbody");
  $(document).ready(function () {
    $.ajax({
      url: "./controllers/apiRest.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        tablaCuerpo.empty();
        for (var i = 0; i < data.length; i++) {
          tablaCuerpo.append(
            "<tr>" +
              '<th scope="row">' +
              (i + 1) +
              "</th>" +
              "<td>" +
              data[i].cedula +
              "</td>" +
              "<td>" +
              data[i].nombre +
              "</td>" +
              "<td>" +
              data[i].apellido +
              "</td>" +
              "<td>" +
              data[i].direccion +
              "</td>" +
              "<td>" +
              data[i].telefono +
              "</td>" +
              "<td>" +
              '<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>' +
              '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>' +
              "</td>" +
              "</tr>"
          );
        }
      },
      error: function (error) {
        console.log("Error" + JSON.stringify(error));
      },
    });
  });
}
cargarDatos();

//Logica del modal para agregar un nuevo estudiante
$(document).ready(function() {
  $('#saveBtn').on('click', function(event) {
      event.preventDefault();

      const estudiante = {
          cedula: $('#addCedula').val(),
          nombre: $('#addNombre').val(),
          apellido: $('#addApellido').val(),
          direccion: $('#addDireccion').val(),
          telefono: $('#addCelular').val(),
      };
      console.log(estudiante);
      $.ajax({
          url: "./controllers/apiRest.php",
          type: 'POST',
          data: estudiante,
          success: function(data) {
              console.log('Success:', data);
              $('#myModal').modal('hide');
              cargarDatos();
              cargarEstudiantesH();
          },
          error: function(error) {
              console.error('Error:', error);
          },
      });
  });
});      

//Logica del modal para editar un estudiante
let cedulaE = "";
$(document).ready(function () {
  $(document).on("click", ".edit", function () {
    const fila = $(this).closest("tr");
    const cedula = fila.find("td:eq(0)").text();
    cedulaE = cedula;
    const nombre = fila.find("td:eq(1)").text();
    const apellido = fila.find("td:eq(2)").text();
    const direccion = fila.find("td:eq(3)").text();
    const telefono = fila.find("td:eq(4)").text();

    $("#editNombre").val(nombre);
    $("#editApellido").val(apellido);
    $("#editDireccion").val(direccion);
    $("#editTelefono").val(telefono);
  });

  // Agrega un evento de clic al botón "Guardar" en el modal de edición
  $("#editSaveBtn").on("click", function (event) {
    event.preventDefault();

    const estudiante = {
      nombre: $("#editNombre").val(),
      apellido: $("#editApellido").val(),
      direccion: $("#editDireccion").val(),
      telefono: $("#editTelefono").val(),
    };
    console.log(estudiante);
    $.ajax({
      url: "./controllers/apiRest.php?cedula=" + cedulaE,
      type: "PUT",
      dataType: "json",
      data: JSON.stringify(estudiante),
      contentType: "application/json",
      success: function (data) {
        console.log("Success:", data);
        $("#editEmployeeModal").modal("hide");
        cargarDatos();
        cargarEstudiantesH();
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });
});

//Logica del modal para eliminar un estudiante
$(document).ready(function() {
    let cedulaD= '';
    $(document).on('click', '.delete', function() {
        const fila = $(this).closest('tr');
        const cedula = fila.find('td:eq(0)').text();

        cedulaD = cedula;
        console.log(cedulaD);   
        
    });

    // Agrega un evento de clic al botón "Eliminar" en el modal de eliminación
    $('#btd-delete').on('click', function(event) {
        event.preventDefault();

        console.log(cedulaD);

        $.ajax({
            url: "./controllers/apiRest.php?cedula="+cedulaD,
            type: 'DELETE',
            success: function(data) {
                console.log('Success:', data);
                $('#deleteEmployeeModal').modal('hide');
                cargarDatos();
                cargarEstudiantesH();
                
            },
            error: function(error) {
                console.error('Error:', error);
            },
        }); 
    });
});  