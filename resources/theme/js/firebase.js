// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
  apiKey: "AIzaSyBtcGwzjrEVyQAqweOpAUBun9xqFtKF-v0",
  authDomain: "kingpang-b6f25.firebaseapp.com",
  projectId: "kingpang-b6f25",
  storageBucket: "kingpang-b6f25.appspot.com",
  messagingSenderId: "718306886161",
  databaseURL: "https://kingpang-b6f25-default-rtdb.firebaseio.com/",
  appId: "1:718306886161:web:9adf7c9fffff8bf15e67b0",
  measurementId: "G-TS66NBGQC1"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

function firebasePopup(provider,method){
  firebase.auth().signInWithPopup(provider).then(function(result) {
      var token = result.credential.accessToken;
      var user = result.user;

      $('#firebase_login #login_by').val(method);
      $('#firebase_login #email').val(user.email);
      $('#firebase_login #name').val(user.displayName);
      $('#firebase_login #firebase_token').val(token);
      $('#firebase_login #firebase_uid').val(user.uid);

      $('#firebase_login').submit();

  }).catch(function(error) {
      console.error('Error: hande error here>>>', error.code)
  })
}
function loginGoogle(){
   var ggProvider = new firebase.auth.GoogleAuthProvider();
   firebasePopup(ggProvider,'google');
}

function loginFacebook(){
 var fbProvider = new firebase.auth.FacebookAuthProvider();
  firebasePopup(fbProvider,'facebook');
}
