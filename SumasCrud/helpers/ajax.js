$(document).ready(function () {
  getData();

  $("#search").on("input", function () {
    search($(this).val());
  });

  $("#add-form").submit(function (event) {
    event.preventDefault();

    let formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../controllers/apiRest.php",
      data: formData,
      success: function () {
        getData();
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#btn-delete").click(function () {
    let id = $("#id").val();

    $.ajax({
      type: "DELETE",
      url: `../controllers/apiRest.php?id=${id}`,
      success: function () {
        getData();
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $(document).on("click", "#tbl tbody tr", function () {
    let cells = $(this).find("td");

    $("#id").val(cells.eq(0).text());
    $("#numOne").val(cells.eq(1).text());
    $("#numTwo").val(cells.eq(2).text());
  });
});

function getData() {
  $.ajax({
    type: "GET",
    url: "../controllers/apiRest.php",
    dataType: "json",
    success: function (data) {
      $("#tbl tbody").empty();

      data.forEach(function (field) {
        $("#tbl tbody").append(`
        <tr>
            <td>${field.id}</td>
            <td>${field.num_one}</td>
            <td>${field.num_two}</td>
            <td>${field.ans}</td>
        </tr>
        `);
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
}

function search(input) {
  let query = input.toLowerCase();

  $("#tbl tbody tr").each(function () {
    let rowContent = $(this).text().toLowerCase();

    if (rowContent.indexOf(query) === -1) {
      $(this).hide();
    } else {
      $(this).show();
    }
  });
}
