$("#generate").click(function () {
  const request = new XMLHttpRequest();
  request.open("GET", "http://127.0.0.1:5000/aqg", true);
  request.onload = (progress) => {
    // console.log(request.response);
    $("#quizes").html(request.response);
    request.status === 200
      ? alert("Questions generated!")
      : alert(
          `Error ${request.status} occurred when trying to generate questions.<br />`
        );
  };

  request.send();
});
