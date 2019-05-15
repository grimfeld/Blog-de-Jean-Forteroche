<?php $title = "Blog de Jean Forteroche - Administration"?>

<?php ob_start(); ?>

<section class="P50left">
    <h2 class="subtitle">Gérer les billets : </h2> 
    <div class="level columns">
            <p class="column is-1-8 offset-1-32">Titre :</p>
            <p class="column is-1-8">Auteur :</p>
            <p class="column is-4-8">Extrait du contenu :</p>
            <p class="column is-1-8 offset-1-32">Heure de publication :</p>
    </div>
    <?php 
    while ($data = $posts->fetch()) {
    ?>
        <div class="level columns">
            <p class="column is-1-8 offset-1-32"><a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']); ?></a></p>
            <p class="column is-1-8"><?= htmlspecialchars($data['author']); ?></p>
            <p class="column is-4-8"><?= mb_strimwidth($data['content'], 0, 50, "...")?></p>
            <p class="column is-1-8 offset-1-32"><?= htmlspecialchars($data['postingtime']); ?></p>
        </div>
    <?php 
    }
    $posts->closeCursor();
    ?>
</section>

<section class="P50left">
<div class="divider bglight"></div>
    <h2 class="subtitle">Gérer les commentaires :</h2>
    <div class="level columns">
            <p class="column is-1-8 offset-1-32">Auteur :</p>
            <p class="column is-1-8">Contenu :</p>
            <p class="column is-1-8 offset-1-32">Heure de publication :</p>
            <p class="column is-4-8">Signalements :</p>
    </div>
    <?php 
    while ($data = $comments->fetch()) {
    ?>
        <div class="level columns">
            <p class="column is-1-8 offset-1-32"><?= htmlspecialchars($data['author']); ?></p>
            <p class="column is-1-8"><?= htmlspecialchars($data['content']); ?></p>
            <p class="column is-1-8 offset-1-32"><?= htmlspecialchars($data['postingtime']); ?></p>
            <p class="column is-4-8"><?= mb_strimwidth($data['reports'], 0, 50, "...")?></p>
        </div>
    <?php 
    }
    $comments->closeCursor();
    ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>