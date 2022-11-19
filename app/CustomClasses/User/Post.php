<?php

namespace App\CustomClasses\User;

class Post
{
    protected $userId;
    protected $id;
    protected $title;
    protected $body;

    public function __construct(array $postData)
    {
        $this->userId = $postData['userId'];
        $this->id = $postData['id'];
        $this->title = $postData['title'];
        $this->body = $postData['body'];
    }
}
