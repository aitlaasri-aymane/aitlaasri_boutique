<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=boutique;charset=utf8", "root", "");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['qte'])) {
    $id = htmlspecialchars($_POST['id']);
    $user = htmlspecialchars($_SESSION['id']);
    $qte = htmlspecialchars($_POST['qte']);
    $check = $bdd->query('SELECT * FROM panier WHERE id_art = "' . $id . '" AND id_user = "' . $user . '"');
    if ($check->rowCount() > 0) {
        $ins = $bdd->prepare('UPDATE panier SET qte=? WHERE id_art =? AND id_user =?');
        $ins->execute(array($qte, $id, $user));
        $panier = $bdd->query('SELECT * FROM panier WHERE id_user=' . $_SESSION['id']);
        $cart = $panier->rowCount();
        $msg2 = 'This product\'s quantity has been updated to your cart!';
        echo $msg2, '|', $cart;
    } else {
        $ins = $bdd->prepare('INSERT INTO panier(id_art,id_user,qte) VALUES(?,?,?)');
        $ins->execute(array($id, $user, $qte));
        $panier = $bdd->query('SELECT * FROM panier WHERE id_user=' . $_SESSION['id']);
        $cart = $panier->rowCount();
        $msg2 = 'This product has been added to your cart!';
        echo $msg2, '|', $cart;
    }
}
