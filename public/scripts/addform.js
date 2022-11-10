
// Client ID and API key from the Developer Console
var CLIENT_ID = '776650431959-883tm7kcdm7paf2siu2q32053ictfpd0.apps.googleusercontent.com';
var API_KEY = 'AIzaSyBvUAScSi0Q7Zo5sSPDKuIvkCBFI27oato';
var maintbl;

// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = 'https://www.googleapis.com/auth/drive.metadata.readonly';

// var authorizeButton = document.getElementById('authorize_button');
// var signoutButton = document.getElementById('signout_button');

/**
 *  On load, called to load the auth2 library and API client library.
 */
function handleClientLoad() {
  gapi.load('client:auth2', initClient);
}

/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */
function initClient() {
  gapi.client.init({
    apiKey: API_KEY,
    clientId: CLIENT_ID,
    discoveryDocs: DISCOVERY_DOCS,
    scope: SCOPES
  }).then(function () {
    // Listen for sign-in state changes.
    gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

    // Handle the initial sign-in state.
    updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
    // authorizeButton.onclick = handleAuthClick;
    // signoutButton.onclick = handleSignoutClick;
  }, function(error) {
    appendPre(JSON.stringify(error, null, 2));
  });
}

/**
 *  Called when the signed in status changes, to update the UI
 *  appropriately. After a sign-in, the API is called.
 */
function updateSigninStatus(isSignedIn) {
  if (isSignedIn) {
    // authorizeButton.style.display = 'none';
    // signoutButton.style.display = 'block';
    listFiles();
  } else {
    // authorizeButton.style.display = 'block';
    // signoutButton.style.display = 'none';
  }
}

/**
 *  Sign in the user upon button click.
 */
function handleAuthClick(event) {
  gapi.auth2.getAuthInstance().signIn();
}

/**
 *  Sign out the user upon button click.
 */
function handleSignoutClick(event) {
  gapi.auth2.getAuthInstance().signOut();
}

/**
 * Append a pre element to the body containing the given message
 * as its text node. Used to display the results of the API call.
 *
 * @param {string} message Text to be placed in pre element.
 */
function appendPre(message) {
  var pre = document.getElementById('content');
  var textContent = document.createTextNode(message + '\n');
  pre.appendChild(textContent);
}

/**
 * Print files.
 */
function listFiles() {
  gapi.client.drive.files.list({
    'pageSize': 10,
    'fields': "nextPageToken, files(id, name)"
  }).then(function(response) {
    appendPre('Files:');
    var files = response.result.files;
    if (files && files.length > 0) {
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        console.log(file.name);
        appendPre(file.name + ' (' + file.id + ')');
      }
    } else {
      appendPre('No files found.');
    }
  });
}



    $(document).ready(function(){
        $("#gfrom").select2();
        $("#course").select2();
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//update functionalities
var updateID=null;
function updateForm(id){

    $("#btnupdate").removeAttr("hidden");
    $("#minimize").click();
    $("i.fa-plus").click();
    $("#btnsubmit").prop("hidden","true");

        updateID=id;
        let ajaxreq=$.ajax({
            url:"courseform/"+id,
            method:"GET",
            async:true
        });

        ajaxreq.done(function(res){
            $("#course").val(res.course).change();
            $("#gfrom").val(res.gfrom).change();
            $("#form_type").val(res.form_type).change();
            $("#description").val(res.description);
        });
    }
//update button click event
    $("#btnupdate").click(function(){

        swal("Are you sure you want to update?", {
            buttons: ["cancel", true],
          }).then((updates)=>{
              if(updates){
                let updateajax=$.ajax({
                    url:"courseform/"+updateID,
                    method:"PUT",
                    async:true,
                    contentType:"application/json",
                    data:JSON.stringify($("#frmgform").formToJson())
                });
                updateajax.done(function(response){
                   maintbl.ajax.reload();
                   $("#btnclear").click();
                });
                swal("Your file has been updated!", {
                    icon: "success",
                  });
              }else{
                swal("Not updated!");
              }
          });


    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 //button clear function
$("#btnclear").click(function(){
    $("#course").val(-1).change();
    $("#gfrom").val(-1).change();
    $("#form_type").val(0).change();
    $("#description").val('');
    $("i.fa-plus").click();
    $("#btnsubmit").removeAttr("hidden");
    $("#btnupdate").prop("hidden","true");
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//data table initialization
function initialization_data_table(){
    maintbl=$("#tblgforms").DataTable({
        "ajax": {
            url:"courseform",
            "dataSrc": "",
        },
        "columns": [
            { "data": "course_name"},
            { "data": "form_type" },
            { "data": "description" },
            { "render": function(data,type,row,meta){
                return '<button id="btnupdate" class="btn btn-dark" onClick="updateForm(`'+row.id+'`)">Update</button>'+
                ' <button id="btnremove"  class="btn btn-danger" onclick="remove_form(`'+row.id+'`)">Remove</button>';
            }}
        ]
    });
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//function for remove button click
function remove_form(id){

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data and files!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            let ajax_delete= $.ajax({
                url:"courseform/"+id,
                method:"DELETE",
                data:{
                    "_token":$('meta[name="csrf-token"]').attr('content')
                },
                async:true
            });
            ajax_delete.done(function(res){
                maintbl.ajax.reload();
                toastr.success("Form Deleted");
            });
            ajax_delete.fail(function(res){
                toastr.error("unable to Delete");
            });
        }
    });

}
