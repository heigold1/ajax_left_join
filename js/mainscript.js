$(function() {

  $("#start_button").click(function(){

  session_id = $("#session_id").val();
  number_of_records = $("#num_rows").val();

  $("div#main_container").html("Please wait while query is executing..."); 

  $("div#main_container").css("background-color", "#BBDCFF");
  $.ajax({
      url: "proxy.php",
      async: false, 
      dataType: 'json',
      success:  function (data) {

        var html_string = "<table border='1'><tr><td>First Name</td><td>Last Name</td><td>Dept ID</td><tr>";

        $.each(data, function() {
          html_string += "<tr>"
          $.each(this, function(k, v) {
            html_string += "<td>" + v + "</td>";
          });
          html_string += "</tr>";
        })

        html_string += "</table>";
        $("div#main_container").html(html_string); 
      }
  });  // end of AJAX call 

  $("div#main_container").css("background-color", "#F3F3FF");


  });  // End of button click 

}); 