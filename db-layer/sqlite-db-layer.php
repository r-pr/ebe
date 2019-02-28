<?php

require_once('db-layer/idb-layer.php');
require_once('config.php');

class DbLayer implements IDbLayer {
    private $dbh;

    public function __construct() {
        date_default_timezone_set('Europe/Kiev');
        $this->dbh = new PDO('sqlite:database.db', '', '', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
        $this->execute_dml("create table if not exists posts
        (id integer primary key autoincrement, body text, title text, time_created text, time_updated text)");
    }

    private function execute_dml($query){
        $this->dbh->exec($query);
        return $this->dbh->lastInsertId();
    }

    private function execute_select($query){
        $res_arr = [];
        foreach ($this->dbh->query($query) as $row) {
            $res_arr[] = $row;
        }
        return $res_arr;
    }

    public function createPost($title, $body) {
        $time = date('Y-m-d H:i:s');
        $body = strip_tags($body);
        $body = $this->dbh->quote($body);
        $title = strip_tags($title);
        $title = $this->dbh->quote($title);
        $sql = "INSERT INTO posts (title, body, time_created, time_updated)
            VALUES ($title, $body, '$time', '$time')";
        $this->execute_dml($sql);
    }

    public function updatePost($id, $title, $body) {
        $time = date('Y-m-d H:i:s');
        $body = strip_tags($body);
        $body = $this->dbh->quote($body);
        $title = strip_tags($title);
        $title = $this->dbh->quote($title);
        $sql = "UPDATE posts SET title = $title, body = $body, 
            time_updated = '$time' WHERE id = $id";
        $this->execute_dml($sql);
    }

    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE id = $id";
        $this->execute_dml($sql);
    }

    public function getPosts() {
        return $this->execute_select("SELECT * FROM posts");
    }

    public function getPostById($id) {
        $result = $this->execute_select("SELECT * FROM posts WHERE id = $id");
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
}
