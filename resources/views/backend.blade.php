<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">开发商</th>
                <th scope="col">留言</th>
                <th scope="col">建筑质量/物业/社会责任</th>
                <th scope="col">时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{$item->vote_name}}</td>
                <td>{{$item->message}}</td>
                <td>{{$item->jzzl}}/{{$item->wy}}/{{$item->shzr}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>

</div>
</body>
</html>