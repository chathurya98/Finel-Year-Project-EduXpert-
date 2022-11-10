var CLIENT_ID = '776650431959-883tm7kcdm7paf2siu2q32053ictfpd0.apps.googleusercontent.com';
var API_KEY = 'AIzaSyBvUAScSi0Q7Zo5sSPDKuIvkCBFI27oato';

// Lesson ID
var lesson_id,lesson_name;

// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://content.googleapis.com/discovery/v1/apis/drive/v2/rest"];


// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = "https://www.googleapis.com/auth/drive";

// var authorizeButton = document.getElementById("authorize_button");
// var signoutButton = document.getElementById("signout_button");

/**
 *  On load, called to load the auth2 library and API client library.
 */
function handleClientLoad() {
    gapi.load("client:auth2", initClient);
}

/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */
function initClient() {
    gapi.client
        .init({
            apiKey: API_KEY,
            clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES,
        })
        .then(
            function () {
                // Listen for sign-in state changes.
                gapi.auth2
                    .getAuthInstance()
                    .isSignedIn.listen(updateSigninStatus);

                // Handle the initial sign-in state.
                updateSigninStatus(
                    gapi.auth2.getAuthInstance().isSignedIn.get()
                );
                // authorizeButton.onclick = handleAuthClick;
                // signoutButton.onclick = handleSignoutClick;
            },
            function (error) {
                console.log(error);
                // appendPre(JSON.stringify(error, null, 2));
            }
        );
}

/**
 *  Called when the signed in status changes, to update the UI
 *  appropriately. After a sign-in, the API is called.
 */
function updateSigninStatus(isSignedIn) {
    if (isSignedIn) {
        $("#user_not_log").modal('hide');

    } else {

        $("#user_not_log").modal('show');
    }
}

 //sign in method call
 $("#btn_google_sign").click(function(){
    handleAuthClick();
  });

   //check sign or otherwise user redirect to this modal
   $('#user_not_log').on('hidden.bs.modal', function (event) {
    if(gapi.auth2.getAuthInstance().isSignedIn.get()){
        listFiles();
    }else{
        $("#user_not_log").modal('show');
    }
  });

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
