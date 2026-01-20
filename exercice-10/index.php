<?php

require_once 'UserGenerator.php';

// Créer une instance du générateur
$generator = new UserGenerator();

// Générer 10 utilisateurs aléatoires
$users = $generator->generateUsers(10);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur d'utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .status-active {
            color: green;
            font-weight: bold;
        }
        .status-inactive {
            color: red;
        }
        .refresh-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .refresh-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Générateur d'utilisateurs aléatoires</h1>

    <a href="index.php" class="refresh-btn">Générer de nouveaux utilisateurs</a>

    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Âge</th>
                <th>Ville</th>
                <th>Téléphone</th>
                <th>Date création</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['firstName']) ?></td>
                <td><?= htmlspecialchars($user['lastName']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['age'] ?> ans</td>
                <td><?= htmlspecialchars($user['city']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td><?= $user['createdAt'] ?></td>
                <td class="<?= $user['isActive'] ? 'status-active' : 'status-inactive' ?>">
                    <?= $user['isActive'] ? 'Actif' : 'Inactif' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Données JSON</h2>
    <pre><?= json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?></pre>
</body>
</html>
