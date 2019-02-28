<?php

interface IDbLayer {
    public function createPost($title, $body);
    public function updatePost($id, $title, $body);
    public function deletePost($id);
    public function getPosts();
    public function getPostById($id);
}
