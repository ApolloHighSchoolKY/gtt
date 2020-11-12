//Login method
function login(){
  var userEmail = document.getElementById("emailIn").value;
  var userPassword = document.getElementById("passwordIn").value;

  firebase.auth().signInWithEmailAndPassword(userEmail, userPassword).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;

    window.alert("Error : " + errorMessage);
  });
}

//Logout methods
function logout(){
  firebase.auth().signOut().then(function() {
    // Sign-out successful.
    document.getElementById("passwordIn").value = "";
  }).catch(function(error) {
    // An error happened.
    window.alert("Error : " + error.message);
  });
}

//Create an acount method
function signup(){
  var userEmail = document.getElementById("emailUp").value;
  var userPassword = document.getElementById("passwordUp").value;
  var userName = document.getElementById("nameUp").value;

  firebase.auth().createUserWithEmailAndPassword(userEmail, userPassword).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;

    window.alert("Error : " + errorMessage);
  });
  var userId = firebase.auth().currentUser.uid;
  firebase.database().ref('users/' + userId).set({
    name: userName
  });
}

//Contact
function contact(){
  var name = $("#name").val();
  var email = $("#email").val();
  var message = $("#message").val();
  if($("#like").prop("checked")){
    var like = "I like it!"
  } else {
    var like = "I don\'t like it!"
  }

  firebase.database().ref('contact/' + name).set({
    email: email,
    message: message,
    opinion: like
  });
  console.log("Contact form sent");
  $("#name").val("");
  $("#email").val("");
  $("#message").val("");
  $("#like").prop('checked', true);
}

//Sets the Theme in the Database
function setRemoteTheme() {
  var user = firebase.auth().currentUser;
  if (user == null)
  {
    alert("Please sign in to save your theme.");
  } else {
    var userId = firebase.auth().currentUser.uid;

    var theme = getLocalTheme();
    firebase.database().ref('users/' + userId).set({
      theme: theme
    });
    console.log("Theme saved");
  }
}

//Sets the Local theme
function setLocalTheme(theme){
  var bgColor = theme.substring(0,theme.indexOf(")")+1);
  var navBarColor = theme.substring(theme.indexOf(")")+2);
  document.body.style.backgroundColor = bgColor;
  document.getElementById("navbar").style.backgroundColor = navBarColor;
  console.log("Theme changed");
}

//Gets the Local Theme
function getLocalTheme(){
  return document.body.style.backgroundColor + " " + document.getElementById("navbar").style.backgroundColor;
}

//Retrives Remote Theme and Sets Local Theme
function useRemoteTheme(){
  var userId = firebase.auth().currentUser.uid;
  return firebase.database().ref('/users/' + userId).once('value').then(function(snapshot) {
    var theme = snapshot.child("theme").val();
    setLocalTheme(theme);
  });
}
