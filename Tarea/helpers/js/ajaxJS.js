$(document).ready(function () {
  updateStudentsTable();

  $("#search-input").on("input", function () {
    filterTable($(this).val());
  });

  $("#student-form").submit(function (event) {
    event.preventDefault();

    let formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../controllers/apiRest.php",
      data: formData,
      success: function (response) {
        updateStudentsTable();
        clearFormFields();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });

  $("#update-button").click(function () {
    let studentId = $("#id").val();
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let address = $("#address").val();
    let phoneNumber = $("#phoneNumber").val();

    $.ajax({
      type: "PUT",
      url:
        "../controllers/apiRest.php?id=" +
        studentId +
        "&firstName=" +
        firstName +
        "&lastName=" +
        lastName +
        "&address=" +
        address +
        "&phoneNumber=" +
        phoneNumber,
      success: function () {
        updateStudentsTable();
        clearFormFields();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });

  $("#delete-button").click(function () {
    let studentId = $("#id").val();

    $.ajax({
      type: "DELETE",
      url: "../controllers/apiRest.php?id=" + studentId,
      success: function () {
        updateStudentsTable();
        clearFormFields();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });

  $(document).on("click", "#students-table tbody tr", function () {
    let cells = $(this).find("td");

    $("#id").val(cells.eq(0).text());
    $("#firstName").val(cells.eq(1).text());
    $("#lastName").val(cells.eq(2).text());
    $("#address").val(cells.eq(3).text());
    $("#phoneNumber").val(cells.eq(4).text());
  });
});

function filterTable(query) {
  query = query.toLowerCase(); // Convertir a minúsculas para comparación sin distinción entre mayúsculas y minúsculas

  $("#students-table tbody tr").each(function () {
    let rowText = $(this).text().toLowerCase(); // Obtener el texto de la fila en minúsculas

    if (rowText.indexOf(query) === -1) {
      // Si el texto de la fila no contiene la búsqueda, ocultar la fila
      $(this).hide();
    } else {
      $(this).show(); // Mostrar la fila si coincide con la búsqueda
    }
  });
}

function updateStudentsTable() {
  $.ajax({
    type: "GET",
    url: "../controllers/apiRest.php",
    dataType: "json",
    success: function (data) {
      $("#students-table tbody").empty();

      data.forEach(function (student) {
        $("#students-table tbody").append(`
              <tr>
                  <td>${student.cedula}</td>
                  <td>${student.nombre}</td>
                  <td>${student.apellido}</td>
                  <td>${student.direccion}</td>
                  <td>${student.telefono}</td>
              </tr>
          `);
      });
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}

function clearFormFields() {
  let studentId = $("#id");
  let studentFirstName = $("#firstName");
  let studentLastName = $("#lastName");
  let studentAddress = $("#address");
  let studentPhoneNumber = $("#phoneNumber");
  let fields = [
    studentId,
    studentFirstName,
    studentLastName,
    studentAddress,
    studentPhoneNumber,
  ];

  fields.forEach(function (field) {
    field.val("");
  });
}
