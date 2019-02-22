<?php

interface IDbLayer {
    public function createPost($title, $body);
    public function getPosts();
    public function getPostById($id);
}
