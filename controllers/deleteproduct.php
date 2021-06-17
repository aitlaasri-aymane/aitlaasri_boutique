<?php
include_once '../connexion.php';

if (!isset($_SESSION)) {
    session_start();
}

$id = htmlspecialchars($_POST['article_id']);
$user = htmlspecialchars($_SESSION['id']);
$check = $bdd->query('SELECT * FROM panier WHERE id_user = "' . $user . '" AND id_art = "' . $id . '"');
if ($check->rowCount() > 0) {
    $ins = $bdd->prepare('DELETE FROM panier WHERE id_art =? AND id_user =?');
    $ins->execute(array($id, $user));
    $panier = $bdd->query('SELECT * FROM panier WHERE id_user=' . $_SESSION['id']);
    $cart = $panier->rowCount();
    $msg = 'This product has been removed from your cart!';
    echo $msg, '|', $cart;
} else {
    $msg = 'This product/user doesn\'t exist!';
    echo $msg;
}
