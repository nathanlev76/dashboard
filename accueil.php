<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="stylel.css">
    <title>BDD ENTREPRISE</title>
</head>

<header>
    <nav>
		<div class="logo"><a href="accueil.php">
			<p><i class="material-icons" style="font-size: 130%; vertical-align: middle;">data_usage</i> Dashboard</p>
        </a>
        </div>
		<ul>
			<li><a href="accueil.php" class="active">accueil</a></li>
			<li><a href="entreprise.php">structures</a></li>
            <li><a href="alternances.php">Alternances</a></li>
		</ul>
	</nav>
</header>

<body>
    <div id="background">
        <h2 id="h2_accueil"></br></br></br></br>Accueil</h2>
    </div>
    <div class=statbutton>
        <div id="button1">
            <p> <i class="material-icons" style="font-size: 150%;">business</i> </br>499</br>structures</p>
        </div>
        <div id="button2">
            <p><i class="material-icons" style="font-size: 150%;">calendar_month</i></br>4 ans</br>d'études</p>
        </div>
    </div>
    <p class="classicText"></br>Ce projet de dashboard/infographie a été créer dans le but d'étudier le fonctionnement </br>des bases de données,
        dans le cadre des mes études à la <a href="https://normandiewebschool.fr" target=”_blank” title="Site Web de la Normandie Web School">
            Normandie Web School</a>. </br></br>La base de données Excel créé par la school, est stockée dans une table SQL pour permettre 
            l'accès via PHP.</br> On peut donc récupérer les données et les exploiter dans le plugin ChartJS pour JavaScript </br>
            qui permet de créer des graphiques dynamiques.</p>
    <a href="entreprise.php" id=access_button>Accéder aux graphiques<i class="material-icons" style="font-size: 150%;">navigate_next</i></div></a>
</body>

<footer>
    <div class="hover_img">
        <a href="#">By Nathan Levasseur<span><img src="images/photo.jpg" alt="image" height="100" /></span></a>
    </div>
</footer>
</html>