<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
<title><?php include('config.php'); echo htmlspecialchars($pageTitle);?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

<div class="wrap col-lg-8 text-center"><a href="disconnect.php">Se déconnecter</a>
<h1 class="pb-5">Welcome <?php echo htmlspecialchars($_SESSION["login"]);?></h1>

<ul class="text-left">
<h2 >Liste des participants :</h2>

<?php 
if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) 
{
    if ($handle = opendir('participants')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo "<li>$entry\n</li>";
            }
        }
        closedir($handle);
    }
}
else 
{
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
    header('Location:login.php');  
    exit();  
}
?>

</ul>
</div>
</body>
</html>