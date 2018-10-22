<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" style="padding: 50px">
    <div class="row" style="margin-top: 50px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">开发商</th>
                <th scope="col">点赞留言</th>
                <th scope="col">吐槽留言</th>
                <th scope="col">点赞/吐槽</th>
                <th scope="col">时间</th>
                <th scope="col">ip</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->vote_name}}</td>
                    <td>
                        {{$item->message_up}}
                        @if($item->message_up)
                            @if($item->up_status==0)
                                <button type="button" data-id="{{$item->id}}" data-tag="up" data-st="1"
                                        class="sh btn btn-primary btn-sm">
                                    通过
                                </button>
                            @else
                                <button type="button" data-id="{{$item->id}}" data-tag="up" data-st="0"
                                        class="sh btn btn-sm">
                                    撤销
                                </button>
                            @endif
                        @endif
                    </td>
                    <td>
                        {{$item->message_down}}
                        @if($item->message_down)
                            @if($item->down_status==0)
                                <button type="button" data-id="{{$item->id}}" data-tag="down" data-st="1"
                                        class="sh btn btn-primary btn-sm">
                                    通过
                                </button>
                            @else
                                <button type="button" data-id="{{$item->id}}" data-tag="down" data-st="0"
                                        class="sh btn btn-sm">
                                    撤销
                                </button>
                            @endif
                        @endif

                    </td>
                    <td>{{$item->up}}/{{$item->down}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->ip}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>

</div>
<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(".sh").click(function () {
            var id = $(this).data('id');
            var status = $(this).data('st');
            var tag = $(this).data('tag');
            sh(id, status, tag, this);

        })
    })


    function sh(id, status, tag, obj) {
        $.get('sh/' + id + '?status=' + status + '&tag=' + tag, function (data) {
            alert('请求成功');
            if (status == 1) {
                $(obj).data('st', 0)
                $(obj).text('撤销')
            } else {
                $(obj).data('st', 1)
                $(obj).text('通过')
            }
            $(obj).toggleClass('btn-primary')
        })
    }
</script>
</body>
</html>