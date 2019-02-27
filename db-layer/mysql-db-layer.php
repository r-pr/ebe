<?php

require_once('db-layer/idb-layer.php');
require_once('config.php');

class DbLayer implements IDbLayer {
    private $db_conn;

    public function __construct() {
        date_default_timezone_set('Europe/Kiev');
        $this->db_conn = new mysqli(Config::$dbHost, Config::$dbUser, 
            Config::$dbPassw, Config::$dbName);
    }

    private function execute_dml($query){
        $this->db_conn->query($query);
        return $this->db_conn->insert_id;
    }

    private function execute_select($query){
        $res_arr = [];
        $res = $this->db_conn->query($query);
        while ($row = $res->fetch_assoc()) {
            $res_arr[] = $row;
        }
        return $res_arr;
    }

    public function createPost($title, $body) {
        $time = date('Y-m-d H:i:s');
        $body = strip_tags($body);
        $body = mysqli_real_escape_string($this->db_conn, $body);
        $title = strip_tags($body);
        $title = mysqli_real_escape_string($this->db_conn, $title);
        $sql = "INSERT INTO posts (title, body, time_created, time_updated)
            VALUES ('$title', '$body', '$time', '$time')";
        $this->execute_dml($sql);
    }

    public function updatePost($id, $title, $body) {
        $time = date('Y-m-d H:i:s');
        $body = strip_tags($body);
        $body = mysqli_real_escape_string($this->db_conn, $body);
        $title = strip_tags($body);
        $title = mysqli_real_escape_string($this->db_conn, $title);
        $id = mysqli_real_escape_string($this->db_conn, $id);
        $sql = "UPDATE posts SET title = '$title', body = '$body', 
            time_updated = '$time' WHERE id = $id";
        $this->execute_dml($sql);
    }

    public function deletePost($id) {
        $id = mysqli_real_escape_string($this->db_conn, $id);
        $sql = "DELETE FROM posts WHERE id = $id";
        $this->execute_dml($sql);
    }

    public function getPosts() {
        return $this->execute_select("SELECT * FROM posts");
    }

    public function getPostById($id) {
        $result = $this->execute_select("SELECT * FROM posts WHERE id=$id");
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
}