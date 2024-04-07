$(document).ready(function () {
  updateStudentsTable();

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

    $.ajax({
      type: "PUT",
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
