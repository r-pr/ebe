<form action="index.php?action=update" method="POST">
    <input type="text" name="title" placeholder="Post title"
        style="width:500px;" value="<?=$viewBag['title']?>"
    />
    <br/><br/>
    <textarea name="body" 
        style="width: 500px; height: 300px;"
    ><?=$viewBag['body']?></textarea>
    <br/><br/>
    <input type="hidden" name="pid" value="<?=$viewBag['id']?>">
    <input type="submit" value="Update" style="width: 200px;">
</form>