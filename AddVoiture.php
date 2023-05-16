<?php
session_start();

// Retrieve the username from the session
$cin = $_SESSION['cin'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>ADD CAR</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-4">Owner Sign Up - Car Details</h2>

    <form action="OwnerVoitureAction.php" method="post">
      <div class="form-group">
        <label for="mat">Matricule:</label>
        <input type="text" class="form-control" id="mat" name="mat" required>
      </div>
      
      <div class="form-group">
        <label for="cin">CIN:</label>
        <input type="text" class="form-control" id="cin" name="cin" value="<?php echo isset($cin) ? $cin : ''; ?>" required><br>
      </div>


      <div class="form-group">
        <label for="model">Car Model:</label>
        <input type="text" class="form-control" id="model" name="model" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Add Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
