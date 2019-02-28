

<div style="min-width: 200px; max-width: 400px;">
    <p class="ebe-danger">
        Do you really want to delete this post?
    </p>
    <form action="index.php?action=delete" method="POST">
        <input type="hidden" name="pid" value="<?=$viewBag['pid']?>">
        <input type="submit" value="Yes, delete" style="width: 48%;">
    </form>

    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="view">
        <input type="hidden" name="pid" value="<?=$viewBag['pid']?>">
        <input type="submit" value="No, take me back" style="width: 48%;">
    </form>

</div>

