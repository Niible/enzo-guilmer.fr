<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php include_once 'views/includes/head.php';?>
    <?php if($Article['latex']==0){?>
    <link rel="stylesheet" href="assets/stylesheets/prism.css">
    <?php }?>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/3.0.1/github-markdown.min.css">

    <title>Enzo Guilmer - <?=$Article['titre']?></title>
</head>

<body>
    <?php include_once 'views/includes/header.php';?>

    <div class="container markdown-body">
        <h1 class='titre'><?=$Article['titre']?></h1>
        <article class='article markdown-body'>
            <?php if($Article['latex']==0){
                    $Parsedown = new Parsedown();
                }else{
                    $Parsedown = new ParsedownExtensionMathJaxLaTeX();
                }
                echo $Parsedown->text(str_replace("&amp;","&",str_replace("&quot;","\"",str_replace("&lt;","<",str_replace("&gt;",">",$Article['article'])))));
            ?>
        </article>
    </div>


    <?php include_once 'views/includes/footer.php';?>
    <?php if($Article['latex']==0){?>
    <script async src="assets/js/prism.js"></script>
    <?php }else{?>
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
    <?php }?>

</body>

</html>