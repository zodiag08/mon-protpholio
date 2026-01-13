<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gestion des projets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
        }
        
        table {
            width: 70%;
            border-collapse: collapse;
            margin-top:50px;
            margin-left: 15%;
            border-radius: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: white;
        }
        th {
            background-color: orangered;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .add-btn {
            background-color: white;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px;
            font-weight: bold;
        }
        .add-btn:hover {
            background-color: #f0f0f0;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="topnav" id="myTopnav">
      <a href="interface.php">Home</a>
      <a href="add admin.php">add admin</a>
      <a href="edite project.php"> edite</a>
      <a href="les message.php">les message</a>
      <a href="index.php">Log out<i class='bx bx-log-out'></i></a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script>
    </div>
    <br><br><br>
    
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inscription_db";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Traitement de la suppression si un ID est envoyé
        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            
            // Préparation de la requête de suppression
            $stmt = $conn->prepare("DELETE FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $delete_id);
            $stmt->execute();
            
            echo "<p style='color: white;'>Projet supprimé avec succès.</p>";
        }
        
        // Récupération des projets
        $stmt = $conn->query("SELECT id, title, image, url, language FROM projects");
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($projects) > 0) {
            echo '<table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Langage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            
            foreach ($projects as $project) {
                echo '<tr>
                    <td>'.$project['title'].'</td>
                    <td><img src="'.$project['image'].'" alt="'.$project['title'].'"></td>
                    <td>'.$project['language'].'</td>
                    <td>
                    <center>
                        <button class="delete-btn" onclick="confirmDelete('.$project['id'].')">Supprimer</button>
                    </center>
                    </td>
                </tr>';
            }
            
            echo '</tbody></table>';
        } else {
            echo "<p style='color: white;'>Aucun projet trouvé dans la base de données.</p>";
        }
    } catch(PDOException $e) {
        echo "<p style='color: white;'>Erreur de connexion : " . $e->getMessage() . "</p>";
    }
    $conn = null;
    ?>
    <br><br><br>
    <div class="button-container">
        <a href="add project.php" class="add-btn">Ajouter un projet</a>
    </div>
    
    <script>
        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce projet ?")) {
                window.location.href = "?delete_id=" + id;
            }
        }
    </script>
</body>
</html>