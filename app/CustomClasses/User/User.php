<?php

namespace App\CustomClasses\User;

use Illuminate\Support\Facades\Http;

class User
{
    protected static $usersUrl = 'https://jsonplaceholder.typicode.com/users';
    protected static $postsUrl = 'https://jsonplaceholder.typicode.com/posts';
    public $id;
    public $name;
    public $username;
    public $email;
    public $address;
    public $phone;
    public $website;
    public $company;
    public $posts;

    public function __construct(array $userData)
    {
        $this->id = $userData['id'];
        $this->name = $userData['name'];
        $this->username = $userData['username'];
        $this->email = $userData['email'];
        $this->address = $userData['address'];
        $this->phone = $userData['phone'];
        $this->website = $userData['website'];
        $this->company = $userData['company'];
    }

    public static function fetchUsers(): array
    {
        $users = Http::get(static::$usersUrl)->json();
        $userData = array();
        foreach ($users as $user) {
            $user = new User($user);
            $user->fetchPosts();
            $userData[] = $user;
        }
        return $userData;
    }

    public function fetchPosts()
    {
        $posts = Http::get(static::$postsUrl . '?userId=' . $this->id)->json();
        $postData = array();
        for ($i = 0; $i < 3; $i++) {
            $postData[] = new Post($posts[$i]);
        }
        $this->posts = $postData;
    }
}
