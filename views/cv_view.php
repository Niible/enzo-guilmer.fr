<!doctype html>
<html lang='fr'>

<head>
    <?php include_once 'views/includes/head.php';?>
    <title>Enzo Guilmer - About me / CV</title>
</head>

<body>

    <?php include_once 'views/includes/header.php';?>

    <div class="container">
        <div class="global">
            <main>
                <?php if(isset($desc)){?>
                <h1>Développeur informatique</h1>
                <img src="assets/img/<?=$img?>" alt="Photo de profil : Enzo Guilmer">
                <?php $Parsedown = new Parsedown();
                        echo($Parsedown->text($desc));?>
                <a href='#contact'><button type="button" class="btn btn-secondary btn-lg">Contact</button></a>
                <?php }?>
            </main>
            <div class="card-list">
                <div class="cards">
                    <?php if(isset($comp)){?>
                    <div class="card">
                        <div class="card-heade">
                            <h2 style="text-align: center">Compétences</h2>
                            <div class="img-container">
                                <?php foreach ($comp as $index => $c) {?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?=$c['niveau'];?>"
                                        aria-valuemin="0" aria-valuemax="100" style="width:<?=$c['niveau'];?>%">
                                    </div>
                                    <p><?=$c['competence'];?></p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if(isset($exp)){?>
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
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php if(isset($pro)){?>
            <h2>PROJETS</h2>
            <div class="featured-cards">
                <div class="card-list">
                    <div class="cards">
                        <?php foreach ($pro as $index => $p) {?>
                        <div class="card"> <a href="<?=$p['lien'];?>" aria-label="Lien Github: <?=$p['nom']?>">
                                <div class="card-heade">
                                    <div class="img-container"> <span class="card-index">#<?=$p['id'];?></span>
                                        <img style='width:100%;height:220px;' src="assets/img/<?=$p['image'];?>"
                                            alt='Image de description pour : <?=$p['nom']?>'>
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
            <div class="contact" id='contact'>
                <h2>CONTACT</h2>
                <p>Vous souhaitez me contacter ?</p>
                <p>Alors utilisez le formulaire de contact ou envoyez-moi un message sur <a
                        href="https://www.linkedin.com/in/enzo-guilmer-854030161/"><img style="width:50px;"
                            id="linkedin" src="assets/img/linkedin.svg" alt='Contact LinKedIn'></a></p>
                <div class="contact-form">
                    <div class="card-list">
                        <div class="cards">
                            <div class="card">
                                <form id='contact-form' action="https://formspree.io/enzo.guilmer@gmail.com"
                                    method="POST">

                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-static">Quel est votre nom ?</label>
                                        <input type="text" class="form-control form-control-lg" id="nameinput"
                                            placeholder="John Doe" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Votre email</label>
                                        <input type="email" class="form-control form-control-lg" id="mailinput"
                                            placeholder="name@example.com" name="email">
                                    </div>
                                    <div class="form-group bmd-form-group is-filled">
                                        <label class="bmd-label-static">Raison de votre
                                            contact</label>
                                        <input type="email" class="form-control form-control-lg" id="objet"
                                            placeholder="--- Objet de votre message ---" name="Objet">
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-static">Votre message</label>
                                        <textarea class="form-control form-control-lg" id="messageinput" name="message"
                                            rows="10"></textarea>
                                    </div>
                                    <div class="buttons"> <a href="javascript:{}"
                                            onclick="document.getElementById('contact-form').submit();"
                                            class="ajouter-button">Envoyer</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include_once 'views/includes/footer.php';?>
        </div>
    </div>
    <script src="/assets/javascript/functions.js"></script>

</body>

</html>