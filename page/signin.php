<?php
include_once '../connexion.php';
$page = 'Signin';
include_once '../elements/header.php';
include_once '../elements/navbar.php';
?>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body <?php if (!isset($_SESSION['id'])) { ?> onload="sign();" <?php } ?>>
    <div align="center">
        <div id="signinmsgbox"></div>
        <h3>Sign in</h3>
        <hr class="uk-width-1-2@s">
        <p class="uk-margin uk-text-muted">Sign in to the shop right now !</p>
        <form id="signinform" action="../controllers/signin.php" method="post" class="uk-grid-small uk-width-1-2@s" uk-grid>
            <div class="uk-width-1-3@s"> <input required class="uk-input" name="prenom" type="text" placeholder="Your firstname"> </div>
            <div class="uk-width-1-3@s"> <input required class="uk-input" name="nom" type="text" placeholder="Your Lastname"> </div>
            <div class="uk-inline uk-width-1-3@s"> <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span><input required class="uk-input" name="pass1" type="password" placeholder="Enter your password"></div>
            <div class="uk-width-2-3@s"> <input required class="uk-input" name="email" type="email" placeholder="Enter your E-mail"> </div>
            <div class="uk-inline uk-width-1-3@s"> <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span> <input required class="uk-input" name="pass" type="password" placeholder="Confirm your password"> </div>
            <button class="uk-button uk-button-primary uk-align-center" name="sign" type="submit">Sign in</button>
        </form>
    </div>
</body>

<script>
    var frm = $('#signinform');

    frm.submit(function(e) {

        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
                console.log('Submission was successful.');
                console.log(data);
                if (!data.includes("SUCESSSIGNIN"))
                    document.getElementById('signinmsgbox').innerHTML = data;
                else {
                    document.getElementById('signinmsgbox').innerHTML = data.replace('SUCESSSIGNIN', '');

                    function changetologin() {
                        window.location = './login.php?' + frm.serialize().split("&")[3];
                    }
                    setTimeout(changetologin, 3500)
                }
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