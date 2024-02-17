<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uploader</title>
</head>
<body>

<table border="1">
    <tr>
        <td>real name</td>
        <td>name</td>
        <td>path</td>
        <td>mime type</td>
        <td>user</td>
        <td>actions</td>
    </tr>
    @foreach($userFiles as $userFile)
        <tr>
            <td>{{$userFile->real_name}}</td>
            <td><a target="_blank" href="/{{$userFile->path}}">
                    {{$userFile->name}}
                </a>
            </td>
            <td>
                @if($userFile->mime_type == 'png' || $userFile->mime_type == 'jpg')
                    <a target="_blank" href="/{{$userFile->path}}">
                        <img src="{{$userFile->path}}" width="50" height="50" title="{{$userFile->real_name}}">
                    </a>
                @endif

            </td>
            <td>{{$userFile->mime_type}}</td>
            <td>{{$userFile->user_id}}</td>
            <td>
                <a href="{{'/delete-file/'.$userFile->id}}"> delete </a>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>