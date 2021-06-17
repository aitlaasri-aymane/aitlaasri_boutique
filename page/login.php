<?php
include_once '../connexion.php';
$page = 'Login';
include_once '../elements/header.php';
include_once '../elements/navbar.php';
?>

<head>
    <link rel="stylesheet" href="/aitlaasri_boutique/assets/css/style.css">
</head>

<body <?php if (!isset($_SESSION['id'])) { ?> onload="login();" <?php } ?>>
    <div align="center">
        <div id="loginmsgbox"></div>
        <h3>Log in</h3>
        <hr class="uk-width-1-2@s">
        <p class="uk-margin uk-text-muted">Login to your account using an email and password.</p>
        <div><?php if (isset($msg)) echo $msg ?></div>
        <form id="loginform" action="../controllers/login.php" method="post" class="uk-grid-small uk-width-1-2@s" uk-grid>
            <div class="uk-width-2-3@s"><input id="email_login" required class="uk-input" name="email" type="email" placeholder="Enter your E-mail"></div>
            <div class="uk-inline uk-width-1-3@s"> <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span><input required class="uk-input" name="pass" type="password" placeholder="Confirm your password"></div>
            <button class="uk-button uk-button-primary uk-align-center" name="connect" type="submit">Connect</button>
        </form>
    </div>
</body>

<script>
    var frm = $('#loginform');

    frm.submit(function(e) {

        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
                console.log('Submission was successful.');
                if (data != '')
                    document.getElementById('loginmsgbox').innerHTML = data;
                else
                    window.location = '../index.php';
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
</script>

<script defer src="../assets/js/scripts.js"></script>

<?php include_once '../elements/footer.php'; ?>