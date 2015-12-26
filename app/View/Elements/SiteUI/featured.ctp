<div class="propositionList">
<?
    foreach($aFeatured as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '400x');
?>
    <a href="<?=$url?>" class="item">
        <div class="bottom">
            <span class="icon icon-label-red">Акция</span><br />
            <div class="description"><?=$title?></div>
        </div>
        <img src="<?=$src?>" alt="<?=$title?>" />
    </a>
<?
    }
?>

</div>
