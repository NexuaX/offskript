<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <script src="https://kit.fontawesome.com/9e15be8231.js" crossorigin="anonymous"></script>
    <script src="/public/js/password_toggle.js" defer></script>
    <script src="/public/js/login_validation.js" defer></script>
    <title>offscript - login</title>
</head>
<body>
    <div class="container">
        <div class="logo-pane">
            <a href="/">
                <img src="/public/img/logo_slim.png" alt="offskript logo" class="logo-img">
            </a>
        </div>
        <div class="form-pane">
            <form method="POST">
                <h2 class="form-title">Login form</h2>
                <div class="messages">
                    <?php
                    if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="form-column">
                    <div class="input-wrapper">
                        <input type="email" placeholder="email" name="email">
                    </div>
                    <div class="input-wrapper">
                        <input type="password" placeholder="password" name="password">
                        <i class="fas fa-eye show-password-button"></i>
                    </div>
                </div>
                <div class="form-row">
                    <a href="">Forgot password?</a>
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="sign-up-area">
                <p>New to the platform?</p>
                <a href="/register"><button>Sign Up</button></a>
            </div>
        </div>
    </div>
    <div class="signature">
        Made by Albert Mouhoubi with ???
    </div>
</body>
</html>
