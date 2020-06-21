<?php

  session_start();

?>

<html lang="en">

<head>

  <meta charset="utf-8" />

  <link rel="stylesheet" href="CSS/index.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <meta name="google-signin-scope" content="profile email">

  <meta name="google-signin-client_id" content="766500278137-pm5jbjcquk7bnuufj280lcsi8mmpk15t.apps.googleusercontent.com">

  <script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body>

  <br><br><br>

  <div class="form_box">

    <div class="container">

      <span class="glyphicon glyphicon-user">

      </span>

    </div>

    <form action="validate.php" method="post" name="loginForm">

      <input type="number" id="userName" name="userName" placeholder="Username" required>

      <br><br>

      <input type="radio" class="studentRadio" id="studentUserType" name="userType" value="student" checked>

      <label for="studentUserType"> Student </label>

      <br><br>

      <input type="radio" class="facultyRadio" id="facultyUserType" name="userType" value="faculty">

      <label for="facultyUserType"> Faculty </label>

      <br><br>

      <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div> <br><br>

      <input type='hidden' name='LoginSubmit'>

      <p id='gmailIdPrinter'></p>

    </form>

  </div>

  <script>
    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function() {
        console.log('User signed out.');
      });
    }

    function onSignIn(googleUser) {
      // Useful data for your client-side scripts:
      var profile = googleUser.getBasicProfile();
      console.log("ID: " + profile.getId()); // Don't send this directly to your server!
      console.log('Full Name: ' + profile.getName());
      console.log('Given Name: ' + profile.getGivenName());
      console.log('Family Name: ' + profile.getFamilyName());
      console.log("Image URL: " + profile.getImageUrl());
      console.log("Email: " + profile.getEmail());

      document.getElementById('gmailIdPrinter').innerHTML = "<input type='hidden' name='gmailId' value=" + profile.getEmail() + ">";

      signOut();

      <?php

            $_SESSION['validate'] = 1;

         ?>

      document.getElementsByName('LoginSubmit')[0].click();

      document.getElementsByName('loginForm')[0].submit();

      // The ID token you need to pass to your backend:
      var id_token = googleUser.getAuthResponse().id_token;
      console.log("ID Token: " + id_token);
    }
  </script>

  <center>

  <p id='developedByText'>Developed by: Bodhith -- KLEF student CSE</p>

  </center>

</body>

</html>
