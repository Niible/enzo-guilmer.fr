<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php if($Article['latex']==0){?>
    <link rel="stylesheet" href="assets/stylesheets/prism.css">
    <?php }?>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/3.0.1/github-markdown.min.css">
    <?php include_once 'views/includes/head.php';?>

    <link rel="stylesheet" href="assets/stylesheets/vendor/katex.min.css" />
    <link rel="stylesheet" href="assets/stylesheets/vendor/prism.css" />
    <link rel="stylesheet" href="assets/stylesheets/vendor/notebook.css" />
    <link rel="stylesheet" href="assets/stylesheets/nbpreview.css" />

    <title>Enzo Guilmer - <?=$Article['titre']?></title>
</head>

<body>
    <?php include_once 'views/includes/header.php';?>

    <div class="container markdown-body">
        <h1 class='titre'><?=$Article['titre']?></h1>
        <article class='article markdown-body'>
            <?php if($Article['latex']==0){
                    $Parsedown = new Parsedown();
                    $text = $Parsedown->text($Article['article']);
                    echo str_replace("&lt;","<",str_replace("&quot;","\"",str_replace("&amp;","&",str_replace("&gt;",">",$text))));
                }elseif($Article['latex']==1){
                    $Parsedown = new ParsedownExtensionMathJaxLaTeX();
                    $text = $Parsedown->text($Article['article']);
                echo str_replace("&lt;","<",str_replace("&quot;","\"",str_replace("&amp;","&",str_replace("&gt;",">",$text))));
                }else{
                    $text = $Article['article'];
                    echo $text;
                }
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