<?php 
if(isset($_SESSION['login'])){?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <?php include_once 'views/includes/head.php';?>
    <title>Enzo Guilmer - <?= ucfirst($page) ?></title>

    <link rel="stylesheet" href="assets/editor.md-master/css/editormd.min.css" />

</head>

<body>
    <?php include_once 'views/includes/header.php';?>


    <div class="container">
        <?php if(isset($_POST['ajouter'])){?>
        <h2>Nouvel article</h2><?php }else{?>
        <h2>Modifier article</h2>
        <?php }?>
        <div ondrop="upload_file(event)" ondragover="return false">
            <form action="modifier" method="post" style="margin-top:80px;">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="hidden" name="id"
                        value="<?php if(isset($_POST['ajouter'])){echo($id);}else{echo($Article['id']);}?>">
                    <input type="text" name="titre" class="form-control" value="<?=$Article['titre']?>">
                </div>
                <?php if(isset($_POST['modifier'])){?>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control" value="<?=$Article['date']?>">
                </div>
                <?php }?>
                <div class="form-group">
                    <label>Image </label><input style='margin-left:5px;' id='button-drop' type="button"
                        value="Choisir une image" onclick="file_explorer();"> <label id='drag-msg'>ou drag and drop dans
                        la fenetre
                    </label>
                    <input style='display:none' type="file" id="selectfile">
                    <input type="text" id="File_name" name="image" class="form-control" value="<?=$Article['image']?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" value="<?=$Article['description']?>">
                </div>
                <div class="form-group">
                    <label>Code coloration ou Latex</label>
                    <select class="form-control" name='bool'>
                        <option <?php if($Article['bool'] == 0){echo('selected');}?>>Code
                        </option>
                        <option <?php if($Article['latex'] == 1){echo('selected');}?>>Latex</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Article</label>
                    <div id="editormd">
                        <textarea class="form-control" name="article"
                            style="display:none;"><?=$Article['article']?></textarea>
                    </div>
                </div>
                <button type="submit" style='width:100%' class="btn btn-primary mb-2"
                    name="<?php if(isset($_POST['ajouter'])){echo('btn-aj');}else{echo('btn-modif');}?>"><?php if(isset($_POST['ajouter'])){echo('Poster un nouvel ');}else{echo('Modifier l\'');}?>article</button>
            </form>
        </div>


        <?php include_once 'views/includes/footer.php';?>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/editor.md-master/editormd.js"></script>
        <script src="assets/editor.md-master/languages/en.js"></script>
        <script src="assets/js/drag_drop.js"></script>

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
                // tex: true,
                watch: false,
                path: "assets/editor.md-master/lib/",
                toolbarIcons: function() {
                    return editormd.toolbarModes['simple']; // full, simple, mini
                },
            });
        });
        </script>
    </div>

</body>

</html><?php }else{
    header("location:/");};?>