<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion des contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(0, 0, 0);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            margin-left:120px;
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 100px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: orangered;
            color: white;
        }
       
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="topnav" id="myTopnav">
        <a href="interface.php">Home</a>
        <a href="add admin.php">add admin</a>
        <a href="les message.php"> messages</a>
        <a href="edite project.php">edite</a>
        <a href="index.php">Log out<i class='bx bx-log-out'></i></a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="container">
        <h1>Liste des contacts</h1>
        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "inscription_db";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (isset($_GET['delete_id'])) {
                $delete_id = $_GET['delete_id'];
                
                $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = :id");
                $stmt->bindParam(':id', $delete_id);
                $stmt->execute();
                
                echo "<p style='color: green;'>Contact supprimé avec succès.</p>";
            }
            
            $stmt = $conn->query("SELECT name, email, phone, idea, created_at , status FROM contact_messages");
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            if (count($contacts) > 0) {
                echo '<table>
                    <thead>
                        <tr>
                           
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Idée</th>
                            <th>date</th>
                            <th>status</th>

                        </tr>
                    </thead>
                    <tbody>';
                
                foreach ($contacts as $contact) {
                    echo '<tr>
                     
                        <td>'.$contact['name'].'</td>
                        <td>'.$contact['email'].'</td>
                        <td>'.$contact['phone'].'</td>
                        <td>'.$contact['idea'].'</td>
                        <td>
                           '.$contact['created_at'].'
                        </td>
                       <td>'.$contact['status'].'</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            } else {
                echo "<p>Aucun contact trouvé dans la base de données.</p>";
            }
        } catch(PDOException $e) {
            echo "<p>Erreur de connexion : " . $e->getMessage() . "</p>";
        }
        $conn = null;
        ?>
    </div>
    
</body>
</html>