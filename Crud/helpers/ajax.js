$(document).ready(function () {
  getData();

  $("#search").on("input", function () {
    search($(this).val());
  });

  $("#person-form").submit(function (event) {
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

  $("#btn-search").click(function () {
    let id = $("#searcher").val();

    $.ajax({
      type: "GET",
      url: `../controllers/apiRest.php?id=${id}`,
      dataType: "json",
      success: function (data) {
        data.forEach(function (field) {
          $("#tbl tbody").append(`
          <tr>
          <td>${field.id}</td>
          <td>${field.firstName}</td>
          <td>${field.lastName}</td>
        </tr>
            `);
        });
      },
    });
  });

  $("#btn-update").click(function () {
    let id = $("#id").val();
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();

    $.ajax({
      type: "PUT",
      url: `../controllers/apiRest.php?id=${id}&firstName=${firstName}&lastName=${lastName}`,
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
    $("#firstName").val(cells.eq(1).text());
    $("#lastName").val(cells.eq(2).text());
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
          <td>${field.firstName}</td>
          <td>${field.lastName}</td>
        </tr>
        `);
      });
    },
  });
}

function search(query) {
  query = query.toLowerCase();

  $("#tbl tbody tr").each(function () {
    let rowContent = $(this).text().toLowerCase();

    if (rowContent.indexOf(query) === -1) {
      $(this).hide();
    } else {
      $(this).show();
    }
  });
}
