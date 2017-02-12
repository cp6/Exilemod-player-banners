<?php
    require ('steamauth/steamauth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Player Banner</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/exilepng/css/index.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>
<?php
if(!isset($_SESSION['steamid'])) {

    echo "<div class='jumbotron'><h1>Please login to see your character data</h1></br></div>";
    loginbutton(); //login button
}  else {
    $steamid = $_SESSION['steamid'];
    include ('steamauth/userInfo.php');
    logoutbutton();
}
?>
</body>
</html>