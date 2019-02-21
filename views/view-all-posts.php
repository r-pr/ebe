<?php

foreach ($viewBag as $post) {
    $created = $post['time_created'];
    $updated = $post['time_updated'];
    $body = $post['body'];
    echo "<div>
        <hr>
        <p>created: $created</p>
        <p>updated: $updated</p>
        <p>body: $body</p>
        <hr>
    </div>";
}

echo 'viewall';