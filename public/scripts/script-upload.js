const form = document.forms.namedItem("fileinfo");
form.addEventListener(
  "submit",
  (event) => {
    const formData = new FormData(form);

    formData.append("CustomField", "This is some extra data");

    const request = new XMLHttpRequest();
    request.open("POST", "http://127.0.0.1:5000/upload", true);
    request.onload = (progress) => {
      request.status === 200
        ? alert("Uploaded!")
        : alert(
            `Error ${request.status} occurred when trying to upload your file.<br />`
          );
    };

    request.send(formData);
    event.preventDefault();
  },
  false
);
