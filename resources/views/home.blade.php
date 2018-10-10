<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">

</head>
<body class="no-mp">
<div class="container-fluid main-bg swiper-container">
    <div class="swiper-wrapper">
        <div id="page-1" class="swiper-slide">
            <img class="wh100 full-img" src="img/1/1.jpg">
        </div>
        <div id="page-2" class="swiper-slide">
            <img class="wh100 full-img" src="img/2/1.jpg">
        </div>
        <div id="page-3" class="swiper-slide">
            <img class="wh100 full-img" src="img/3/1.jpg">
        </div>
        <div id="page-4" class="swiper-slide">
            <img class="wh100 full-img" src="img/4/1.jpg">
        </div>
        <div id="page-5" class="no-mp swiper-slide swiper-no-swiping">
            <div class="content">
                <img src="img/5/title.png" class="title" style="display: block; width: 39.0625vw;margin: 0 auto;">
                <div class="list" style="width: 67vw;margin: 7.936508vh auto 0">
                    @foreach($data as $group)
                        <div class=" box">
                            @foreach($group['data'] as $item)
                                <div class="item" data-logofile="img/5/logo/{{$item['logFileName']}}"
                                     style="font-size: {{$group['fontSize']}};padding: {{$group['padding']}}">{{$item['name']}}</div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
                <img src="img/5/djpj.png" style="display: block;margin:5.4vh auto 0;max-width: 40vw;">
            </div>
            <div class="dialog none">
                <div class="close"></div>
                <img src="img/5/logo/wanke.png" class="logo"/>
                <div class="select-form">
                    <div class="select-from-item" id="jzzl">
                        <label><img src="img/5/dialog/label1.png"></label>
                        <i class="up pj" data-no="1"></i>
                        <i class="down pj" data-no="0"></i>
                    </div>
                    <div class="select-from-item" id="wy">
                        <label><img src="img/5/dialog/label2.png"></label>
                        <i class="up pj" data-no="1"></i>
                        <i class="down pj" data-no="0"></i>
                    </div>
                    <div class="select-from-item" id="shzr">
                        <label><img src="img/5/dialog/label3.png"></label>
                        <i class="up pj" data-no="1"></i>
                        <i class="down pj" data-no="0"></i>
                    </div>
                </div>
                <div class="form-text">
                    <textarea id="message"></textarea>
                    <div id="submit" style="position: absolute;z-index:3; bottom:2vw; text-align: center;width: 100%">
                        <img style="max-width:12.5vw" src="img/5/dialog/submit.png">
                    </div>

                </div>
            </div>
        </div>
        <div id="page-6" class="swiper-slide">
            <img class="wh100 full-img" src="img/6/1.jpg">
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.0/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
    var select = '';
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'vertical', // 垂直切换选项
        //autoplay: true,
        //effect : 'fade',
    })
    $ = mySwiper.$;
    $('.list .item').on('click', function (e) {
        select = $(this).text();
        var logoFile = $(this).data('logofile');
        $('.dialog .logo').attr('src', logoFile)
        $('.content').addClass('none');
        $('.dialog').removeClass('none');
    })
    $('#page-5 .dialog .close').on('click', function (e) {
        $('i').removeClass('selected');
        $('.dialog').addClass('none');
        $('.content').removeClass('none');
    });
    $('#page-5 .dialog .pj').on('click', function (e) {
        if ($(this).hasClass('selected')) {
            $(this).toggleClass('selected');
        } else {
            $(this).toggleClass('selected');
            $(this).prev('i').removeClass('selected');
            $(this).next('i').removeClass('selected');
        }
    });
    $('#submit').on('click', function (e) {
        var jzzl = $('#jzzl .selected').data('no');
        var wy = $('#wy .selected').data('no');
        var shzr = $('#shzr .selected').data('no');
        if (jzzl === undefined || wy === undefined || shzr === undefined) {
            alert('请点赞');
            return;
        }

        var message = $('#message')[0].value;
        if (message == '') {
            alert('请填写留言')
            return;
        }
        axios.post('/pc', {
            name: select,
            jzzl: jzzl,
            wy: wy,
            shzr: shzr,
            message: message
        })
            .then(function (response) {
                if (response.data.code == 200) {
                    mySwiper.slideNext();
                } else {
                    alert(response.data.message)
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    })
</script>
</body>

</html>