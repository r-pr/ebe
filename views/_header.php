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

<?php if (isset($_SESSION['logged_in'])) { ?>

    <a href="index.php?action=create">New post</a>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'view') { 
        $pid = $_GET['pid'];
    ?>

        <a href="index.php?action=update&pid=<?=$pid?>">Update this post</a>
        <a href="index.php?action=delete&pid=<?=$pid?>">Delete this post</a>

    <?php } ?>

    <a href="index.php?action=logout">Logout</a>

<?php } else { ?>

    <a href="index.php?action=login">Login</a>

<?php } ?>
</div>

