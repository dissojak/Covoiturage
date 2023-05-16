<!DOCTYPE html>
<html>
<head>
  <title>Location Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Location Form</h2>
    <form action="AddLocationAction.php" method="post">
      <div class="form-group">
        <label for="nbplace">Number of Places:</label>
        <input type="number" class="form-control" id="nbplace" name="nbplace" required>
      </div>
      <div class="form-group">
        <label for="prix">Price:</label>
        <input type="number" class="form-control" id="prix" name="prix" required>
      </div>
      <div class="form-group">
        <label for="datedepare">Departure Date:</label>
        <input type="datetime-local" class="form-control" id="datedepare" name="datedepare" required>
      </div>
      <div class="form-group">
        <label for="villedepare">Departure City:</label>
        <input type="text" class="form-control" id="villedepare" name="villedepare" required>
      </div>
      <div class="form-group">
        <label for="villefin">Destination City:</label>
        <input type="text" class="form-control" id="villefin" name="villefin" required>
      </div>
      <div class="form-group">
        <label for="Cin">User CIN:</label>
        <input type="number" class="form-control" id="Cin" name="Cin" required>
      </div>
      <div class="form-group">
        <label for="mat">Matricule:</label>
        <input type="number" class="form-control" id="mat" name="mat" required>
      </div>
 
      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
