<!doctype html>
<html lang='fr'>

<head>

    <?php include_once 'views/includes/head.php';?>

    <title>Enzo Guilmer - Blog</title>

</head>

<body>
    <h1 style='display:none'>Enzo Guilmer Développeur informatique</h1>
    <?php include_once 'views/includes/header.php';?>
    <div class="container">
        <div class="wrapper">
            <div class="landing-page">
                <div class="welcome-message">
                    <div class="welcome">
                        <h1>Hello world!</h1>
                        <p>Moi c'est Enzo et découvrez ici les différentes notes que je prends tout au long de ma
                            formation !<br>Certain de ses cours sont des retranscription de cours, d'autres sont des
                            tutoriels trouvés ici et là sur internet</p>
                        <p>Pour toutes questions ou remarques n'hésitez pas à me contacter en appuyant sur le bouton
                            en-dessous !</p>
                        <div class="contact-button"> <a href="/cv#contact" class="contact-link">Contact</a>
                            <?php if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'root'){?>
                            <form id='ajouter' action="modifier" method="post">
                                <input name='ajouter' type='hidden'>

                                <a href="javascript:{}" onclick="document.getElementById('ajouter').submit();"
                                    class="ajouter-button">Ajouter
                                    article</a>
                            </form><?php }}?>
                        </div>
                    </div>
                    <div class="card"><a href="javascript:{}"
                            onclick="document.getElementById('article<?=$lastArticle['id']?>').submit();">
                            <form id='article<?=$lastArticle['id']?>' action='article' method='post'>
                                <input name='article' value='<?=$lastArticle['id']?>' type='hidden'>
                                <div class="card-heade">
                                    <div class="img-container"> <span class="card-index">#<?=$lastArticle['id']?></span>
                                        <div class="card-img">
                                            <img src="assets/img/<?=$lastArticle['image'];?>"
                                                alt="Image illustrative pour l'article :<?=$lastArticle['titre'];?>">
                                        </div>
                                    </div>
                                    <h3> <?= $lastArticle['titre']?>
                                    </h3> <span
                                        class="card-date"><?= date_format(date_create($lastArticle['date'],timezone_open("Europe/Oslo")), "d M Y")?></span>
                                </div>
                            </form>
                        </a>
                        <div class="card-description">
                            <?php $Parsedown = new Parsedown();
                        echo $Parsedown->text($lastArticle['description']);?>
                        </div>
                        <?php if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'root'){?>
                        <form id='modifier' action="modifier" method="post">
                            <input name='modifier' value='<?=$lastArticle['id']?>' type='hidden'>
                            <div class="buttons">
                                <a href="javascript:{}"
                                    onclick="document.getElementById('modifier').submit();">Modifier</a>
                            </div>
                        </form>
                    </div>
                    </form> <?php }}?>
                </div>
            </div>
            <h2>Tous les articles</h2>
            <div class="featured-cards">
                <div class="card-list ">
                    <div class="cards">

                        <?php $a = 0; foreach ($allArticles as $key => $article) {?>

                        <div class="card">
                            <form id='article<?=$article['id']?>' action='article' method='post'>
                                <input name='article' value='<?=$article['id']?>' type='hidden'>
                                <a href="javascript:{}"
                                    onclick="document.getElementById('article<?=$article['id']?>').submit();">
                                    <div class="card-heade">
                                        <div class="img-container"> <span class="card-index">#<?=$article['id']?></span>
                                            <div class="card-img">
                                                <img src="assets/img/<?=$article['image'];?>"
                                                    alt="Image illustrative pour l'article :<?= $article['titre']?>">
                                            </div>
                                        </div>
                                        <h3> <?= $article['titre']?>
                                        </h3> <span
                                            class="card-date"><?= date_format(date_create($article['date'],timezone_open("Europe/Oslo")), "d M Y")?></span>
                                    </div>
                                </a>
                                <div class="card-description">
                                    <p><?php $Parsedown = new Parsedown();
                                        echo $Parsedown->text($article['description']);?></p>
                                </div>
                            </form>
                            <?php if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'root'){?>
                            <form id='modifier<?=$article['id']?>' action="modifier" method="post">
                                <input name='modifier' value='<?=$article['id']?>' type='hidden'>
                                <div class="buttons">
                                    <a href="javascript:{}"
                                        onclick="document.getElementById('modifier<?=$article['id']?>').submit();">Modifier</a>
                                </div>
                            </form>
                            <?php }}?>

                        </div>
                        <?php $a++;}?>
                    </div>

                </div>
            </div>
            <?php include_once 'views/includes/footer.php';?>
        </div>
    </div>
    </div>

    <script async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { fonts: ["TeX"] }
    });
    </script>
    <noscript>Your browser does not support JavaScript!</noscript>

</body>

</html>