<?php 
if(isset($_SESSION['login'])){?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <title>Enzo Guilmer - <?= ucfirst($page) ?></title>
    <?php include_once 'views/includes/head.php';?>

</head>

<body>
    <?php include_once 'views/includes/header.php';?>
    <div class="container">
        <h2>Information</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style='width:100px;'>id</th>
                    <th scope="col">Information</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Information as $index => $Info): ?>
                <tr>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='information_photo_modifier' value='<?=$Info['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td><img style='width:200px;' src='assets/img/<?=$Info['photo']?>' alt="Photo"></td>
                </tr>
                <tr>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='information_modifier' value='<?=$Info['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>

                    <td><?=$Info['prenom'].' '.$Info['nom'].'<br>Date de naissance: '.$Info['date_naissance'].'<br>email: '.$Info['adresse_mail'].' - Mobile: '.$Info['mobile']?><br>
                        <?=$Info['adresse'].' '.$Info['ville'].'<br>'.'lien LinKedIn : <a target="_blank" href="'.$Info['linkedin'].'">'.$Info['linkedin'].'</a>'?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='information_preview' value='information'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Description</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style='width:100px;'>id</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Description as $index => $Des): ?>
                <tr>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='description_modifier' value='<?=$Des['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <?php $Parsedown = new Parsedown();
                        echo($Parsedown->text($Des['description']));?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='description_preview' value='description'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Expériences</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style=' width:100px;'>id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Expérience</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Experience as $index => $Exp): ?>

                <tr>
                    <td>
                        <form action='' method="post">
                            <input type='hidden' name='experience_supprimer' value='<?=$Exp['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-danger btn-supp">Supprimer</button>
                        </form>
                        <form action='modification' method="post">
                            <input type='hidden' name='experience_modifier' value='<?=$Exp['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td><?=$Exp['date_debut'];?> - <?=$Exp['date_fin'];?></td>
                    <td><?=$Exp['experience'];?></td>
                    <td><?=$Exp['description'];?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='experience_ajouter' value='<?=intval($Exp['id'])+1?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Ajouter</button>
                        </form>
                    </td>
                    <td>

                    </td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='experience_preview' value='experience'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Compétences</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style='width:100px;'>id</th>
                    <th scope="col">Competence</th>
                    <th scope="col">Niveau</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($Competence as $index => $Com): ?>

                <tr>
                    <td>
                        <form action='' method="post">
                            <input type='hidden' name='competence_supprimer' value='<?=$Com['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-danger btn-supp">Supprimer</button>
                        </form>
                        <form action='modification' method="post">
                            <input type='hidden' name='competence_modifier' value='<?=$Com['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td><?=$Com['competence'];?></td>
                    <td>
                        <div class="progress overview-progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$Com['niveau'];?>"
                                aria-valuemin="0" aria-valuemax="100" style="width:<?=$Com['niveau'];?>%">
                            </div>
                            <p class="overview"><?=$Com['niveau'];?>%</p>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                    </td>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='competence_ajouter' value='<?=intval($Com['id'])+1?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Ajouter</button>
                        </form>
                    </td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='competence_preview'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Projets</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style='width:100px;'>id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description + Lien</th>
                    <th scope='col'>Image</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($Projet as $index => $Pro): ?>

                <tr>
                    <td>
                        <form action='' method="post">
                            <input type='hidden' name='projet_supprimer' value='<?=$Pro['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-danger btn-supp">Supprimer</button>
                        </form>
                        <form action='modification' method="post">
                            <input type='hidden' name='projet_modifier' value='<?=$Pro['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td><?=$Pro['nom'];?></td>
                    <td>
                        <p><?=$Pro['description'];?><br><a href='<?=$Pro['lien']?>'
                                target='_blank'><?=$Pro['lien']?></a></p>
                    </td>
                    <td>
                        <img style='width:75%' src='assets/img/<?=$Pro['image'];?>'>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                    </td>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='projet_ajouter' value='<?=intval($Pro['id'])+1?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Ajouter</button>
                        </form>
                    </td>
                    <td>
                    </td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='projet_preview' value='projet'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Langues</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col" style='width:100px;'>id</th>
                    <th scope="col">Langue</th>
                    <th scope="col">Niveau</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($Langue as $index => $Lan): ?>

                <tr>
                    <td>
                        <form action='' method="post">
                            <input type='hidden' name='langue_supprimer' value='<?=$Lan['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-danger btn-supp">Supprimer</button>
                        </form>
                        <form action='modification' method="post">
                            <input type='hidden' name='langue_modifier' value='<?=$Lan['id']?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-success btn-supp">Modifier</button>
                        </form>
                    </td>
                    <td><?=$Lan['langue'];?></td>
                    <td>
                        <p><?=$Lan['niveau'];?></p>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <form action='' method="post">
                            <input type='hidden' name='langue_ordre' value='langue'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Modifier l'ordre</button>
                        </form>
                    </td>
                    <td>
                        <form action='modification' method="post">
                            <input type='hidden' name='langue_ajouter' value='<?=intval($Lan['id'])+1?>'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Ajouter</button>
                        </form>
                    </td>
                    <td>
                        <form action='preview' method="post">
                            <input type='hidden' name='langue_preview' value='langue'>
                            <button type='submit' style='padding:6px;width:100px;' type="button"
                                class="btn btn-outline-primary btn-supp">Preview</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include_once 'views/includes/footer.php';?>

</body>

</html>
<?php }else{
    header("location:/");};?>