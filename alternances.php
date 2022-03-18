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
		    <li><a href="entreprise.php">structures</a></li>
            <li><a href="alternances.php" class="active">Alternances</a></li>
		</ul>
	</nav>
</header>

<body>
    <h2></br></br></br>Les alternances et stages</h2>
    <div id="struct_line">
        <div id="graph5">
            <canvas id="myChart"></canvas>
        </div> 
        <div id="graph6">
            <canvas id="myChart2"></canvas>
        </div> 
    </div>    

    <?php
    $db = new mysqli('localhost', 'root', 'root', 'bdd_entreprise');
    $annonceStage = array("STAGE 2018", "STAGE 2019", "STAGE 2020", "STAGE 2021");
    $annonceAlternance = array("Alternance 2018", "Alternance 2019", "Alternance 2020", "Alternance 2021");
    foreach($annonceStage as $entreprise) {
        $result = $query = $db->query("SELECT COUNT(`Annonces`) as annonce FROM bdd WHERE `Annonces` = '".$entreprise."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $annonce = $r['annonce'];
        $nb[] = $annonce; 
    }

    foreach($annonceAlternance as $entreprise2) {
        $result = $query = $db->query("SELECT COUNT(`Annonces`) as annonce FROM bdd WHERE `Annonces` = '".$entreprise2."' AND `Doublon` != 'd' or 'D'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $annonce = $r['annonce'];
        $nb2[] = $annonce; 
    }
    ?>

<script>
    const data = {
        labels: ["Stage 2018", "Stage 2019", "Stage 2020", "Stage 2021"],
        datasets: [{
        label: '',
        data: <?php echo json_encode($nb)?>,
        backgroundColor: [
            'rgba(100, 149, 237, 0.8)', //vert
            'rgba(70, 130, 180, 0.8)', //rouge
            'rgba(135, 206, 235, 0.8)', //jaune
            'rgba(135, 206, 255, 0.8)', //orange
        ],
        borderColor: [
            'rgba(100, 149, 237, 1)',
            'rgba(70, 130, 180, 1)',
            'rgba(135, 206, 235, 1)',
            'rgba(135, 206, 255, 1)'],
        hoverOffset: 10
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {scales: {y: {beginAtZero: true}}, responsive: true, plugins: 
            {legend: {display: false, position: 'bottom', labels: {color: "black"}}, 
            title: {display: true, text: 'Nombre d\'offres de stage', font: {size: 15}}}}
    };

    const data2 = {
        labels: ["Alternance 2018", "Alternance 2019", "Alternance 2020", "Alternance 2021"],
        datasets: [{
        label: '',
        data: <?php echo json_encode($nb2)?>,
        backgroundColor: [
            'rgba(100, 149, 237, 0.8)', //vert
            'rgba(70, 130, 180, 0.8)', //rouge
            'rgba(135, 206, 235, 0.8)', //jaune
            'rgba(135, 206, 255, 0.8)', //orange
        ],
        borderColor: [
            'rgba(100, 149, 237, 1)',
            'rgba(70, 130, 180, 1)',
            'rgba(135, 206, 235, 1)',
            'rgba(135, 206, 255, 1)'],
        hoverOffset: 10
        }]
    };

    const config2 = {
        type: 'line',
        data: data2,
        options: {scales: {y: {beginAtZero: true}}, responsive: true, plugins: 
            {legend: {display: false, position: 'bottom', labels: {color: "black"}}, 
            title: {display: true, text: 'Nombre d\'offres d\'alternance', font: {size: 15}}}}
    };


    const MyChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const MyChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );

</script> 
</body>
</html>