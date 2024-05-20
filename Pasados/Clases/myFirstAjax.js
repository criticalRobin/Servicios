$(document).ready(function () {
  $("#miBoton").click(function () {
    $.ajax({
      url: "consulta.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);
      },
    });
  });
});
