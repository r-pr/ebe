<div class="ebe-post">
    <h2><?=$viewBag['title']?></h2>
    <div><?=$viewBag['body']?></div>
    <p class="ebe-post-time">Posted <?=$viewBag['time_created']?></p>
    <?php if($viewBag['time_created'] != $viewBag['time_updated']) { ?>
    <p class="ebe-post-time">Updated <?=$viewBag['time_updated']?></p>
    <?php } ?>
</div>