<!DOCTYPE html>
<html lang="">
<head>
    <title>User Email</title>
</head>
<body>
<p>Users and their first 3 posts</p>
<ul>
    @foreach($details as $user)
        <li>
            <p>{{ $user->name }} has written:</p>
            <ul>
                @foreach($user->posts as $post)
                    <li>
                        {{ $post->title }}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
</body>
</html>
