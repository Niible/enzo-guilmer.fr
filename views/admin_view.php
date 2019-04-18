<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php include_once 'views/includes/head.php';?>

    <title>Enzo Guilmer - <?= ucfirst($page) ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
</head>

<body>
    <?php include_once 'views/includes/header.php';?>

    <div class="contact-form">
        <div class="card-list">
            <div class="cards">
                <div class="card" style="width:50%">
                    <h2 class="card-title">Login</h2>
                    <form method="POST" action="admin">

                        <div class="form-group">
                            <label>Root</label>

                            <input id="text" type="text" class="form-control form-control-lg" name="login" required
                                autofocus>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-control-lg" name="password"
                                required data-eye>
                        </div>

                        <div class="form-group no-margin">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'views/includes/footer.php';?>

</body>

</html>