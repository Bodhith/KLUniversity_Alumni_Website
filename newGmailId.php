<?php

  if( !isset($_POST['newGmailIdSubmit']) )
  {
     header("Loaction: index.php");
  }

 ?>

<html>

<head>

  <meta charset="utf-8" />

  <meta name="google-signin-scope" content="profile email">

  <meta name="google-signin-client_id" content="766500278137-pm5jbjcquk7bnuufj280lcsi8mmpk15t.apps.googleusercontent.com">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/newGmailId.css">

  <script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body>

  <div class="noteText">

      Login with your new Gmail Id inorder to change your existing Login Gmail Id.

  </div>

  <div class="form">

  <form action='changeGmailId.php' method='post' name='changeGmailForm'>

    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

    <br><br>

    <input type='hidden' name='changeGmailSubmit'>

    <p id='gmailIdPrinter'></p>

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

        document.getElementsByName('changeGmailSubmit')[0].click();

        document.getElementsByName('changeGmailForm')[0].submit();

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>

  </form>

</body>

</html>
