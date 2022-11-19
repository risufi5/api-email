<?php

namespace App\CustomClasses\User;

use Illuminate\Support\Facades\Http;

class User
{
    protected static $userUrl = 'https://jsonplaceholder.typicode.com/users';
    protected static $postUrl = 'https://jsonplaceholder.typicode.com/posts';
    protected $id;
    protected $name;
    protected $username;
    protected $email;
    protected $address;
    protected $phone;
    protected $website;
    protected $company;
    protected $posts;

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
        $users = Http::get(static::$userUrl)->json();
        $userData = array();
        foreach ($users as $user) {
            $user = new User($user);
            $user->fetchPosts();
            $userData[] = $user->toArray();
        }
        return $userData;
    }

    public function fetchPosts()
    {
        $posts = Http::get(static::$postUrl . '?userId=' . $this->id)->json();
        $postData = array();
        for ($i = 0; $i < 3; $i++) {
            $postData[] = $posts[$i];
        }
        $this->posts = $postData;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'company' => $this->company,
            'posts' => $this->posts
        ];
    }
}
