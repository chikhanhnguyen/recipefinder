<?php
function creer_un_like ($db, $id) {

//initialisation des données dont j'ai besoin
//prise d'info dans la db 
//dans la table client
    $user_session = $db->prepare('SELECT * FROM client WHERE idclient = ?');
    $user_session->execute(array($_SESSION['user_id']));
    $user = $user_session->fetch();
//dans la table avis
    $like = $db->prepare('SELECT idclient, idrecette FROM avis WHERE idclient = ? AND idrecette = ?');
    $like->execute(array($user['idclient'],$id));
//nombre de like existant (1 ou 0)     
    $check_like = $like->rowCount();
//si le client est conncté est que les info = utilisateur de la db 
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user['idclient'] && !empty($_SESSION['user_id'])) {
//si le like est existant on ajoute un like dans la table avis
        if ($check_like == 0) {
            $add_like = $db->prepare('INSERT INTO avis (`avis`, `idclient`, `idrecette`) VALUES (null, ?, ?)');
            $add_like->execute(array($user['idclient'], $id));
//sinon on retire celui qui existe 
        } elseif ($check_like == 1) {
                $del_like = $db->prepare('DELETE FROM avis WHERE idrecette = ? AND idclient = ?');
                $del_like->execute(array($id, $user['idclient']));
        }
//retour a l'index avec un message d'erreur dans l'url si l'utilisateur n'est pas connecté 
    } else {
        header('Location: ./index.php?action=se_connecter');
    }
    $ok=true;
};