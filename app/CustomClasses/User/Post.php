<?php

namespace App\CustomClasses\User;

class Post
{
    public $userId;
    public $id;
    public $title;
    public $body;

    public function __construct(array $postData)
    {
        $this->userId = $postData['userId'];
        $this->id = $postData['id'];
        $this->title = $postData['title'];
        $this->body = $postData['body'];
    }
}
