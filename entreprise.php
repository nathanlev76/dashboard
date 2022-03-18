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
		<div class="logo">
            <p><i class="material-icons" style="font-size: 130%; vertical-align: middle;">data_usage</i> Dashboard</p>
		</div>
		<ul>
            <li><a href="accueil.php">accueil</a></li>
		    <li><a href="entreprise.php" class="active">structures</a></li>
            <li><a href="alternances.php">Alternances</a></li>
            <li><a href="cv.pdf" download>CV<i class="material-icons" style="font-size: 130%; vertical-align: middle;">file_download</i></a></li>
		</ul>
	</nav>
</header>

<body>
    <h2></br></br></br>Les structures</h2>
    <div id="struct_pie">
        <div id="graph1">
            <canvas id="myChart"></canvas>
        </div>
        <div id="graph2">
            <canvas id="myChart2"></canvas>
        </div>
        <div id="graph3">
            <canvas id="myChart3"></canvas>
        </div>
    </div>
    <div id="graph4">
        <canvas id="myChart4"></canvas>
    </div>
    <a href="alternances.php" id=access_button>Prochains graphiques<i class="material-icons" style="font-size: 150%;">navigate_next</i></div></a>
    <p></br></br></br></p> 

    <?php
    $db = new mysqli('localhost', 'root', 'root', 'bdd_entreprise');
    $tailles = array("TPE", "PME", "ETI", "GE");
    $zones = array("Rouen", "Métropole Rouen Normandie (hors Ville de Rouen)", "Arrondissement de Rouen (hors Métropole)", "Arrondissement de Dieppe", "Arrondissement du Havre", "Eure", "Normandie (hors 27 et 76)", "Hors Normandie");
    $secteurs = array("Services", "Commerce", "Industrie", "Administration", "Construction");
    $type = array("Entreprise privée", "Association", "Collectivité", "Administration publique", "Etablissement public");
    foreach($tailles as $entreprise) {
        $result = $query = $db->query("SELECT COUNT(`Taille de la structure`) as tailleStructure FROM bdd WHERE `Taille de la structure` = '".$entreprise."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $tailleStructure = $r['tailleStructure'];
        $nb[] = $tailleStructure; 
    }

    foreach($secteurs as $entreprise2) {
        $result = $query = $db->query("SELECT COUNT(`Secteur Activité`) as secteurActivite FROM bdd WHERE `Secteur Activité` = '".$entreprise2."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $secteurAct = $r['secteurActivite'];
        $nb2[] = $secteurAct; 
    }

    foreach($type as $entreprise3) {
        $result = $query = $db->query("SELECT COUNT(`Statut_Type de structure`) as typeStruct FROM bdd WHERE `Statut_Type de structure` = '".$entreprise3."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $typeStruct = $r['typeStruct'];
        $nb3[] = $typeStruct; 
    }

    foreach($zones as $entreprise4) {
        $result = $query = $db->query("SELECT COUNT(`Zone Géographique`) as zoneGeo FROM bdd WHERE `Zone Géographique` = '".$entreprise4."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $zoneGeographique = $r['zoneGeo'];
        $nb4[] = $zoneGeographique; 
    }
    ?>

<script>
    const data = {
        labels: ["TPE", "PME", "ETI", "GE"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb)?>,
        backgroundColor: [            
            'rgba(0, 56, 112, 0.8)',
            'rgba(10, 87, 158, 0.8)',
            'rgba(21, 120, 207, 0.8)',
            'rgba(36, 156, 255, 0.8)',
            'rgba(119, 194, 254, 0.8)',
        ],
        borderColor: [
            'rgba(0, 56, 112, 1)',
            'rgba(10, 87, 158, 1)',
            'rgba(21, 120, 207, 1)',
            'rgba(36, 156, 255, 1)',
            'rgba(119, 194, 254, 1)',
        ],
        hoverOffset: 10
        }]
    };

    const data2 = {
        labels: ["Services", "Commerce", "Industrie", "Administration", "Construction"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb2)?>,
        backgroundColor: [            
            'rgba(0, 56, 112, 0.8)',
            'rgba(10, 87, 158, 0.8)',
            'rgba(21, 120, 207, 0.8)',
            'rgba(36, 156, 255, 0.8)',
            'rgba(119, 194, 254, 0.8)',
        ],
        borderColor: [
            'rgba(0, 56, 112, 1)',
            'rgba(10, 87, 158, 1)',
            'rgba(21, 120, 207, 1)',
            'rgba(36, 156, 255, 1)',
            'rgba(119, 194, 254, 1)',
        ],
        hoverOffset: 10
        }]
    };

    const data3 = {
        labels: ["Entreprise privée", "Association", "Collectivité", "Administration publique", "Etablissement public"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb3)?>,
        backgroundColor: [            
            'rgba(0, 56, 112, 0.8)',
            'rgba(10, 87, 158, 0.8)',
            'rgba(21, 120, 207, 0.8)',
            'rgba(36, 156, 255, 0.8)',
            'rgba(119, 194, 254, 0.8)',
        ],
        borderColor: [
            'rgba(0, 56, 112, 1)',
            'rgba(10, 87, 158, 1)',
            'rgba(21, 120, 207, 1)',
            'rgba(36, 156, 255, 1)',
            'rgba(119, 194, 254, 1)',
        ],
        hoverOffset: 10
        }]
    };

    const data4 = {
        labels: ["Rouen", "Métropole Rouen Normandie (hors Ville de Rouen)", "Arrondissement de Rouen (hors Métropole)", 
                 "Arrondissement de Dieppe", "Arrondissement du Havre", "Eure", "Normandie (hors 27 et 76)", "Hors Normandie"],
        datasets: [{
        label: '',
        data: <?php echo json_encode($nb4)?>,
        backgroundColor: [
            'rgba(54, 162, 235, 0.7)'
        ],
        hoverOffset: 3
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {responsive: true, plugins: 
            {legend: {display: true, position: 'bottom', labels: {color: "black"}}, 
            title: {display: true, text: 'Taille de la structure', font: {size: 15}}}}
    };

    const config2 = {
        type: 'doughnut',
        data: data2,
        options: {responsive: true, plugins: 
            {legend: {display: true, maxHeight: "50", position: 'bottom', labels: {color: "black", boxWidth: 3, font: {size: 10}}}, 
            title: {display: true, text: 'Secteur d\'activité', font: {size: 15}}}}
    };

    const config3 = {
        type: 'doughnut',
        data: data3,
        options: {responsive: true, plugins: 
            {legend: {display: true, maxHeight: "50", position: 'bottom', labels: {color: "black", boxWidth: 3, font: {size: 10}}}, 
            title: {display: true, text: 'Type de Structure', font: {size: 15}}}}
    };

    const config4 = {
        type: 'bar',
        data: data4,
        options: {responsive: true, plugins: 
            {legend: {display: false, position: 'left'}, 
            title: {display: true, text: 'Zone Géographique', font: {size: 15}}}}
    };

    const MyChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const MyChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );

    const MyChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );

    const MyChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
    );
    

</script> 
</body>
</html>