<?php
require_once __DIR__ . '/cnx.php';

echo 'Id reçu : ' . $_GET['id'];

$query = 'SELECT * FROM utilisateur WHERE id = ' . $_GET['id'];
$stmt = $pdo->query($query);
$utilisateur = $stmt->fetch();
?>
<dl>
    <dt>Nom</dt>
    <dd><?= $utilisateur['nom']; ?></dd>
    <dt>Prénom</dt>
    <dd><?= $utilisateur['prenom']; ?></dd>
    <dt>Email</dt>
    <dd id="email"><?= $utilisateur['email']; ?></dd>
    <dt>Adresse</dt>
    <dd><?= $utilisateur['adresse']; ?><br>
        <?= $utilisateur['cp'] . ' ' . $utilisateur['ville']; ?>
    </dd>
    
</dl>
