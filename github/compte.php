<head>
<title><?php include('config.php'); echo htmlspecialchars($pageTitle);?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<?php
    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
    $login_valide = "admin@test.fr";
    $pwd_valide = "hello";

    // on teste si nos variables sont définies
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

    	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    	if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
    		// dans ce cas, tout est ok, on peut démarrer notre session

    		// on la démarre :)
    		session_start ();
    		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
    		$_SESSION['login'] = $_POST['login'];
    		$_SESSION['pwd'] = $_POST['pwd'];

            // on redirige notre visiteur vers une page de notre section membre
            echo '<div class="wrap"><h1>Bonjour Admin, ceci est votre tableau de bord</h1>';
    		echo '<a href="participant.php"><h2>Accéder à la liste des participants</h2></a></div>';
    	}
    	else {
    		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    		// puis on le redirige vers la page d'accueil
            header('Location:login.php');  
            exit();  
        }
    }
    else {
    	echo 'Les variables du formulaire ne sont pas déclarées.';
    }
    ?>

