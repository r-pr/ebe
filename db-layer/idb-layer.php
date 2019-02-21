<?php

interface IDbLayer {
    public function createPost(string $title, string $body);
    public function getPosts();
    public function getPostById($id);
}
