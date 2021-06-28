<html>


<body>

  <button type="button" onclick="firebase.auth().signInWithRedirect(provider);" > {{$method}} </button>
</body>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>


<script>

  var firebaseConfig = {
    apiKey: "AIzaSyBtcGwzjrEVyQAqweOpAUBun9xqFtKF-v0",
    authDomain: "kingpang-b6f25.firebaseapp.com",
    projectId: "kingpang-b6f25",
    storageBucket: "kingpang-b6f25.appspot.com",
    messagingSenderId: "718306886161",
    appId: "1:718306886161:web:9adf7c9fffff8bf15e67b0",
    measurementId: "G-TS66NBGQC1"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


  var provider = {{ $method == 'facebook' ?
                    "new firebase.auth.FacebookAuthProvider()" :
                    "new firebase.auth.GoogleAuthProvider()" }};


  firebase.auth()
    .getRedirectResult()
    .then((result) => {
      if (result.credential) {
        /** @type {firebase.auth.OAuthCredential} */
        var credential = result.credential;

        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = credential.accessToken;
        // ...
      }
      // The signed-in user info.
      var user = result.user;
    }).catch((error) => {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
</script>


</html>
