<?php

include_once '_classes/Articles.php';
include_once '_classes/Categories.php';
$id = intval($_POST['article']);
$Article = Article::getArticle($id);