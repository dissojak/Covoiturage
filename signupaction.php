<?php
require_once('Accounts.php');
$acc = new accounts();
session_start();

$acc->acc_nom = $_POST["nom"];
$acc->acc_prenom = $_POST["pr"];
$acc->acc_cin = $_POST["cin"];
$acc->acc_adresse = $_POST["adresse"];
$acc->acc_role = $_POST["role"];
$acc->acc_username = $_POST["username"];
$acc->acc_pw = $_POST["password"];

// Validate the username and password
if ($acc->cinExist($acc->acc_cin)) {
    $cinexist = "CIN already exists!";
} else if ($acc->userExist($acc->acc_username)) {
    $userexist = "Username is already in use!";
} else if ($acc->acc_role == "owner") {
        // Sacc the user as authenticated    //,'pr','cin','adresse','role'
       $_SESSION['username'] = $acc->acc_username;
       $_SESSION['password'] = $acc->acc_pw;
       $_SESSION['nom'] = $acc->acc_nom;
       $_SESSION['prenom'] = $acc->acc_prenom;
       $_SESSION['cin'] = $acc->acc_cin;
       $_SESSION['adresse'] = $acc->acc_adresse;
       $_SESSION['role'] = $acc->acc_role;
       //$acc->insertUser();
    header('Location: ownersignup.php');
    exit();
} else{
    // Sacc the user as authenticated    //,'pr','cin','adresse','role'

//   $_SESSION['nom'] = $acc->acc_nom;
//   $_SESSION['pr'] = $acc->acc_pr;
//   $_SESSION['cin'] = $acc->acc_cin;
//   $_SESSION['adresse'] = $acc->acc_adresse;
//   $_SESSION['role'] = $acc->acc_role;
$acc->insertUser();
header('Location: login.php');
exit();
}
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up Page</title>
  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirm_password = document.getElementById("confirm_password").value;
      
      if (password !== confirm_password) {
        alert("Password and confirmation password do not match.");
        return false;
      }
    }
  </script>
</head>
<body>
  <h2>Sign Up</h2>
  <?php if (isset($userexist)) : ?>
    <p style="color: red;"><?php echo $userexist; ?></p>
  <?php endif; ?>

  <?php if (isset($cinexist)) : ?>
    <p style="color: red;"><?php echo $cinexist; ?></p>
  <?php endif; ?>
  
  <form action="signup.php" method="post">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo isset($acc->acc_nom) ? $acc->acc_nom : ''; ?>" required><br>

    <label for="pr">Prénom:</label>
    <input type="text" id="pr" name="pr" value="<?php echo isset($acc->acc_prenom) ? $acc->acc_prenom : ''; ?>" required><br>

    <label for="cin">CIN:</label>
    <input type="text" id="cin" name="cin" value="<?php echo isset($acc->acc_cin) ? $acc->acc_cin : ''; ?>" required><br>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" value="<?php echo isset($acc->acc_adresse) ? $acc->acc_adresse : ''; ?>" required><br>

    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="user" <?php echo isset($acc->acc_role) && $acc->acc_role == 'user' ? 'selected' : ''; ?>>User</option>
        <option value="owner" <?php echo isset($acc->acc_role) && $acc->acc_role == 'owner' ? 'selected' : ''; ?>>Owner</option>
    </select><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo isset($acc->acc_username) ? $acc->acc_username : ''; ?>" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo isset($acc->acc_pw) ? $acc->acc_pw : ''; ?>" required><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br>

    <input type="submit" value="Sign Up">
  </form>
</body>
</html>

