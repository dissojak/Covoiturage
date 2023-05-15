<!DOCTYPE html>
<html>
<head>
  <title>Owner Sign Up</title>
</head>
<body>
  <h2>Owner Sign Up - Car Details</h2>
  
  <form action="owneraction.php" method="post">
    <label for="model">Car Model:</label>
    <input type="text" id="model" name="model" required><br>

    <label for="NSA">Number of Available Seats:</label>
    <input type="number" id="NSA" name="NSA" required><br>

    <input type="submit" value="Submit"> 
  </form>
</body>
</html>
