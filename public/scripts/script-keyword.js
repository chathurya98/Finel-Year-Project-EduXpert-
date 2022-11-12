$("#btn-keyword").click(function () {
  const request = new XMLHttpRequest();
  request.open(
    "GET",
    "http://127.0.0.1:5000/keyword?keyword=" + $("#word").val(),
    true
  );
  request.onload = (progress) => {
    request.status === 200
      ? alert("Keyword updated!")
      : alert(
          `Error ${request.status} occurred when trying to update data.<br />`
        );
  };

  request.send();
});
