<?php 
$action = 'login';
if (isset($_SESSION['logged_in'])) {
    $action = 'logout';
}

?>

<div class="ebe-header">
    <h1>
        <a href="index.php">
            <?=Config::$siteTitle?>
        </a>
    </h1>
</div>

<div class="ebe-toolbar">
    <a href="index.php?action=create">New post</a>
    <a href="index.php?action=<?=$action?>"><?=$action?></a>
</div>

