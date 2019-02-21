<?php 
$action = 'login';
if (isset($_SESSION['logged_in'])) {
    $action = 'logout';
}

?>

<div class="ebe-header">
    <h1>
        <?=Config::$siteTitle?>
    </h1>
    <p>
        <a href="index.php?action=<?=$action?>"><?=$action?></a>
    </p>
</div>