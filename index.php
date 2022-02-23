<?php
require "Connect.php";
require "Config.php";

$myConnexion = Connect::dbConnect();

$stmt = $myConnexion->prepare("SELECT nom,prenom,rue,numero,code_postal,ville,pays,mail FROM user ");
$state = $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "Utilisateur: ".$user['nom']. " ".$user['prenom']. " ".$user['rue']. " ".$user['numero']. " "
    }
}

/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */
