<?php

require_once('config.php');

foreach ($viewBag as $post) {
    $id = $post['id'];
    $created = $post['time_created'];
    $updated = $post['time_updated'];
    $initialBodyLen = strlen($post['body']);
    $body = substr($post['body'], 0, Config::$maxTextInPreview);
    echo "<div>
        <hr>
        <p>created: $created</p>
        <p>updated: $updated</p>
        <p>body: $body</p>";

    if ($initialBodyLen > strlen($body)) {
        echo "<p><a href=\"index.php?action=view&pid=$id\">Read more</a></p>";
    }

    echo "
        <hr>
    </div>";
}

echo 'viewall';