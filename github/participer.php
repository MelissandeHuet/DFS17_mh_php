<head>
<?php session_start();?>
<title><?php include('config.php'); echo htmlspecialchars($pageTitle);?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>
<section>
<h1>Bonjour, <?php echo htmlspecialchars($_POST['name']).' '.($_POST['firstname']); ?>.</h1>
Ton adresse email est <?php echo ($_POST['email']); ?>.

<?php

//Post en variables
$email = "<b>Email</b> : ".$_POST['email'];
$name = "<b>Nom</b> : ".$_POST['name'];
$firstname = "<b>Prénom</b> : ".$_POST['firstname'];

//Création fichier grâce à l'adresse email de form
$my_file = "participants/".$_POST['email'].'.txt';

//On récupère la data à insérer
$data = "$email, $name, $firstname";

//On vérifie si le fichier existe déjà
if (file_exists($my_file)) 
    {
        echo '<div class="alert alert-warning" role="alert">Le fichier '.$my_file .' existe déjà.</div>';
        file_put_contents($my_file, $data);
        echo "Nous avons mis à jour les informations suivantes :<br/> $data ";
    } 
else 
    {
        echo '<div class="alert alert-success" role="alert">Le fichier '.$my_file.' n\'existe pas.</div>';
        $createfile = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    }

//On écrit dans le fichier
fwrite($createfile, $data);

?>

<p>Nous allons stocker vos données dans un fichier nommé : <?php echo $my_file; ?></p>
</section>
</body>