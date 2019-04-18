<?php 
if(isset($_SESSION['login'])){?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php include_once 'views/includes/head.php';?>
    <title>Enzo Guilmer - <?=ucfirst($page)?></title>
</head>

<body>

    <?php include_once 'views/includes/header.php';?>

    <div class="container">
        <div class="global">
            <main>
                <?php if(isset($info)){?>
                <h1>Développeur informatique</h1>
                <img src="assets/img/<?=$img?>" alt="">
                <p><?=$info?></p>
                <?php }?>
                <?php if(isset($desc)){?>
                <h1>Développeur informatique</h1>
                <img src="assets/img/<?=$img?>" alt="">

                <?php $Parsedown = new Parsedown();
                        echo($Parsedown->text($desc));?>
                <button type="button" class="btn btn-secondary btn-lg">Contact</button>
                <?php }?>
            </main>

            <div class="card-list">
                <div class="cards">
                    <?php if(isset($comp)){?>
                    <div class="card">
                        <div class="card-heade">
                            <h2 style="text-align: center">Compétences</h2>

                            <?php foreach ($comp as $index => $c) {?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?=$c['niveau'];?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?=$c['niveau'];?>%">
                                </div>
                                <p><?=$c['competence'];?></p>
                            </div>
                            <?php }?>
                        </div>
                        </a>
                    </div>
                    <?php }?>
                    <?php if(isset($exp)){?>
                    <div class="card-list">
                        <div class="cards">
                            <div class="card">
                                <div class="card-heade">
                                    <h2 style="text-align: center">Expériences</h2>
                                    <div class="container">
                                        <?php foreach ($exp as $index => $e) {?>

                                        <div class="row">
                                            <div class="col-lg-5 col-sm-5 col-md-5">
                                                <span><?=$e['date_debut'];?> - <?=$e['date_fin'];?></span>
                                            </div>
                                            <div class="col-lg-7 col-sm-7 col-md-7">
                                                <p><?=$e['experience'].' '.$e['description'];?></p>
                                                <p></p>

                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

            <?php if(isset($pro)){?>
            <h2>PROJETS</h2>
            <div class="featured-cards">
                <div class="card-list">
                    <div class="cards">
                        <?php foreach ($pro as $index => $p) {?>
                        <div class="card"> <a href="<?=$p['lien'];?>" aria-label="Lien Github: <?=$p['nom']?>">
                                <div class="card-heade">
                                    <div class="img-container"> <span class="card-index">#<?=$p['id'];?></span>
                                        <div class="card-img">
                                            <img style='width:100%;height:100%;' src="assets/img/<?=$p['image'];?>">
                                        </div>
                                    </div>
                                    <h3><?=$p['nom'];?></h3>
                                </div>
                            </a>
                            <div class="card-description">
                                <p><?=$p['description'];?></p>
                            </div>
                            <div class="buttons"> <a href="" aria-label="Lien blog: <?=$p['nom']?>">En
                                    savoir plus</a>
                                <a href="<?=$p['lien'];?>" target='_blank' aria-label="Lien Github: <?=$p['nom']?>">
                                    Lien Github
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php }?>

            <?php if(isset($lan)){?>

            <div class="card-list">
                <h2 style="text-align: center">Langue</h2>
                <div class="cards">
                    <div class="card">
                        <div class="card-heade">
                            <div class="img-container">
                                <div class="card-description">
                                    <?php foreach ($lan as $index => $l) {?>
                                    <p><?=$l['langue'].': '.$l['niveau'];?></p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

        <?php include_once 'views/includes/footer.php';?>
        <script src="/assets/javascript/functions.js"></script>

</body>

</html>
<?php }else{
    header("location:/");};?>