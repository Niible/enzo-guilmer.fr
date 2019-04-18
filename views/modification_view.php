<?php 
if(isset($_SESSION['login'])){?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php include_once 'views/includes/head.php';?>
    <title>Enzo Guilmer - <?= ucfirst($page) ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/drag_drop.js"></script>

    <?php if(isset($_POST['description_modifier'])){?>
    <link rel="stylesheet" href="assets/editor.md-master/css/editormd.min.css" />
    <?php } ?>
</head>

<body>
    <?php include_once 'views/includes/header.php';?>
    <?php if(isset($_POST['information_photo_modifier'])){?>

    <main class="container">

        <h2>Photo actuelle</h2>
        <img id="photo-drop" style='display:block;margin:auto' src="assets/img/<?=$Information[0]['photo']?>" alt="">

        <h2>Upload file</h2>
        <form action="modification" method="post">
            <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                <div id="drag_upload_file">
                    <div class="text-drop">
                        <p>Drop file here <br>or</p>
                        <p><input id='button-drop' type="button" value="Select File" onclick="file_explorer();"></p>
                    </div>
                    <input type="file" id="selectfile">
                </div>
            </div>
            <input type="hidden" name="file" id="File_name" value="">

            <button type="submit" class="btn btn-secondary btn-block" style="width:100%" name="btn-photo">Changer de
                photo</button>
        </form>
    </main>
    <?php }?>

    <?php if(isset($_POST['information_modifier'])){?>
    <main class="container">

        <h2>Informations personnels</h2>

        <form action="" method="post">
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nom" value="<?=$nom?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Prénom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="prenom" value="<?=$prenom?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Date de naissance</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="date" value="<?=$date?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Adresse mail</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="<?=$email?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Lien LinKedIn</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="linkedin" value="<?=$linkedin?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Numéro de Mobile</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mobile" value="<?=$mobile?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Adresse</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="adresse" value="<?=$adresse?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-3 col-form-label">Ville</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ville" value="<?=$ville?>">
                </div>
            </div>

            <button type="submit" class="btn btn-secondary btn-block" style="width:100%" name="btn-info">Modifier les
                données</button>
        </form>
    </main>
    <?php }?>


    <?php if(isset($_POST['experience_modifier']) || isset($_POST['experience_ajouter'])){?>
    <main class="container">

        <h2>Expériences</h2>

        <form action="" method="post">
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Expérience</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="experience" value="<?=$experience?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="description" value="<?=$description?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Date début</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="date_debut" value="<?=$date_debut?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Date fin</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="date_fin" value="<?=$date_fin?>">
                </div>
            </div>
            <button type="submit"
                value="<?php if(isset($_POST['experience_modifier'])){echo($_POST['experience_modifier']);}else{echo($_POST['experience_ajouter']);}?>"
                class="btn btn-secondary btn-block" style="width:100%"
                name="<?php if(isset($_POST['experience_modifier'])){echo('btn-exp');}else{echo('btn-exp-aj');}?>"><?php if(isset($_POST['experience_modifier'])){echo('Modifier
                Expérience');}else{echo('Ajouter Expérience');}?></button>
        </form>
    </main>
    <?php }?>

    <?php if(isset($_POST['projet_modifier']) || (isset($_POST['projet_ajouter']))){?>
    <main class="container">

        <h2>Projet</h2>
        <div ondrop="upload_file(event)" ondragover="return false">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="Nom" class="col-sm-2 col-form-label">Nom de projet</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nom" value="<?=$nom?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nom" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="description" value="<?=$description?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nom" class="col-sm-2 col-form-label">Lien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lien" value="<?=$lien?>">
                    </div>
                </div>
                <input style='display:none' type="file" id="selectfile">
                <div class="form-group row">
                    <label for="Nom" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-9">
                        <input type="text" id="File_name" class="form-control" name="image" value="<?=$image?>">
                    </div>
                </div>
                <button type="submit"
                    value="<?php if(isset($_POST['projet_modifier'])){echo($_POST['projet_modifier']);}else{echo($_POST['projet_ajouter']);}?>"
                    class="btn btn-secondary btn-block" style="width:100%"
                    name="<?php if(isset($_POST['projet_modifier'])){echo('btn-pro');}else{echo('btn-pro-aj');}?>"><?php if(isset($_POST['projet_modifier'])){echo('Modifier
                Projet');}else{echo('Ajouter Projet');}?></button>
            </form>
        </div>
    </main>
    <?php }?>

    <?php if(isset($_POST['langue_modifier']) || isset($_POST['langue_ajouter'])){?>
    <main class="container">

        <h2>Langue</h2>

        <form action="" method="post">
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Langue</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="langue" value="<?=$langue?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label">Niveau</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="niveau" value="<?=$niveau?>">
                </div>
            </div>
            <button type="submit"
                value="<?php if(isset($_POST['langue_modifier'])){echo($_POST['langue_modifier']);}else{echo($_POST['langue_ajouter']);}?>"
                class="btn btn-secondary btn-block" style="width:100%"
                name="<?php if(isset($_POST['langue_modifier'])){echo('btn-lan');}else{echo('btn-lan-aj');}?>"><?php if(isset($_POST['langue_modifier'])){echo('Modifier
                langue');}else{echo('Ajouter langue');}?></button>
        </form>
    </main>
    <?php }?>


    <?php if(isset($_POST['competence_modifier']) || isset($_POST['competence_ajouter'])){?>
    <main class="container">

        <h2>Compétences</h2>

        <form action="" method="post">
            <div class="slider-range">
                <div class="form-group row">
                    <label for="Nom" class="row-sm-3 row-form-label">
                        <?php if(isset($_POST['competence_modifier'])){?>
                        <p><?=$competence?> : <output id="range"> <?=$niveau?> </output>%</p>
                        <?php }else{?>
                        <div class="row-sm-3">
                            <label for="Nom" class="row-form-label">Compétence <output id="range"> 50</output>%</label>
                        </div>
                        <input type="text" class="row-form-control" name="nom" value="<?=$nom?>">
                        <?php }?>
                    </label>
                    <div class="col-sm-10">
                        <div class="range-slider">
                            <input type="range" name="niveau" class="custom-range" min="0" max="100" step="10"
                                value="<?=$niveau?>" id="" onchange="range.value=value">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <button type="submit"
                value=' <?php if(isset($_POST['competence_modifier'])){echo(intval($_POST['competence_modifier']));}else{echo(intval($_POST['competence_ajouter']));}?>'
                class="btn btn-secondary btn-block" style="width:100%"
                name="<?php if(isset($_POST['competence_modifier'])){echo('btn-comp');}else{echo('btn-comp-aj');}?>"><?php if(isset($_POST['competence_modifier'])){echo('Modifier
                Compétence');}else{echo('Ajouter Compétence');}?></button>
        </form>
    </main>
    <?php }?>

    <?php if(isset($_POST['description_modifier'])){?>

    <div class='container'>
        <h2><?=$titre?></h2>

        <form action="" method="post">
            <div class="form-group">
                <div id="editormd">
                    <textarea class="form-control" name="content" style="display:none;"><?=$content?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary btn-block" style="width:100%" name="btn-desc">Modifier
                description</button>
        </form>
    </div>


    <script src="assets/editor.md-master/editormd.js"></script>
    <script src="assets/editor.md-master/languages/en.js"></script>

    <!-- EDITOR SCRIPT With Option -->
    <script type="text/javascript">
    $(function() {
        var editor = editormd("editormd", {
            width: "100%",
            height: 640,
            theme: "dark",
            previewTheme: "dark",
            editorTheme: "pastel-on-dark",
            //markdown : md,
            codeFold: true,
            saveHTMLToTextarea: true,
            searchReplace: true,
            //watch : false,
            htmlDecode: "style,script,iframe|on*",
            previewCodeHighlight: false,
            emoji: true,
            taskList: true,
            tocm: true,
            tex: true,
            watch: false,
            path: "assets/editor.md-master/lib/",
            toolbarIcons: function() {
                return editormd.toolbarModes['simple']; // full, simple, mini
            },
        });

    });
    </script>
    <?php } ?>

    <?php include_once 'views/includes/footer.php';?>

    <script src="assets/js/functions.js"></script>
</body>

</html><?php }else{
    header("location:/");};?>