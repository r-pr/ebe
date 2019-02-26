<?php

require_once('config.php');

foreach ($viewBag as $post) {
    $id = $post['id'];
    $created = $post['time_created'];
    $updated = $post['time_updated'];
    $initialBodyLen = strlen($post['body']);
    $body = substr($post['body'], 0, Config::$maxTextInPreview);
    $title = $post['title'];
    $hazMoar = $initialBodyLen > strlen($body);
?>
    <div class="ebe-post">
        <h2><a href="index.php?action=view&pid=<?=$id?>"><?=$title?></a></h2>
        <div><?=$body?>

        <?php if($hazMoar) { ?>

            ...&nbsp;
            (<a href="index.php?action=view&pid=<?=$id?>">Read more</a>)

        <?php } ?>

        </div>  
    </div>

<?php
    }
?>
