<!DOCTYPE html>
<html>
<head>
  <title>Accueil</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .post {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 10px;
      background-color: #f9f9f9;
    }
    .post-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .post-details {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Accueil</h2>
    <?php
    require_once('user.php');
    $user = new user();
    session_start();
    $user->displayOwnerData();
    ?>
  </div>
</body>
</html>
