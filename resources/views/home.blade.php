<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>2018成都市房地产诚信企业评选</title>
    <link rel="stylesheet" href="css/index.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
</head>
<body class="no-mp">
<div class="container-fluid main-bg swiper-container">
    <div class="swiper-wrapper">
        <div id="page-1" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/1/0.jpg">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/1/2.png?v=1">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/1/1.png?v=1">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-2" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/2/0.jpg?v=1">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/2/1.png?v=1">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/2/2.png?v=1">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-2-1" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/2_1/0.jpg">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/2_1/1.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/2_1/2.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="1.5s" src="img/2_1/3.png">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-2-2" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/2_2/0.jpg">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/2_2/1.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/2_2/2.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="1.5s" src="img/2_2/3.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="2.1s" src="img/2_2/4.png">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-3" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/3/0.jpg?v=2">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/3/1.png?v=2">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/3/2.png?v=2">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-4" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/4/0.jpg">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s"
                 swiper-animate-delay="0.1s" src="img/4/1.png">
            <img class="wh100 full-img ani" swiper-animate-effect="slideInRight" swiper-animate-duration="1s"
                 swiper-animate-delay="0.8s" src="img/4/2.png">
            <img src="img/arrow.png" class="resize ani" swiper-animate-effect="fadeInUp">
        </div>
        <div id="page-5" class="no-mp swiper-slide">
            <div class="content">
                <img src="img/5/title.png" class="title" style="display: block; width: 39.0625vw;margin: 0 auto;">
                <div class="list" style="width: 67vw;margin: 7.936508vh auto 0">
                    @foreach($data as $group)
                        <div class="box ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s"
                             swiper-animate-delay="0.{{$loop->iteration}}s">
                            @foreach($group['data'] as $item)
                                <div class="item" data-logofile="img/5/logo/{{$item['logFileName']}}"
                                     style="font-size: {{$group['fontSize']}};padding: {{$group['padding']}}">{{$item['name']}}</div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
                <img src="img/5/djpj.png" class="ani" swiper-animate-effect="pulse" swiper-animate-duration="1s"
                     swiper-animate-delay="2.5s"
                     style="display: block;margin:5.4vh auto 0;max-width: 40vw;animation-iteration-count: infinite;">
            </div>
            <div class="dialog none">
                <div class="close"></div>
                <img src="img/5/logo/wanke.png" class="logo"/>

                <div class="form-text">
                    <div class="zan-txt">点赞：我为<span id="dialog-kfs"></span>打CALL<i class="up pj" data-no="1"></i></div>
                    <textarea id="message-up" maxlength="150"></textarea>
                    <div class="textarea-placeholder">留言区</div>
                </div>
                <div class="form-text">
                    <div class="zan-txt">吐槽：不诚信房企<i class="down pj" data-no="0"></i></div>
                    <textarea id="message-down" maxlength="150"></textarea>
                    <div class="textarea-placeholder">留言区</div>
                </div>

                <div id="submit" style="text-align: center;width: 100%;margin-top: 5vh">
                    <img style="max-width:12.5vw" src="img/5/dialog/submit.png">
                </div>
            </div>

        </div>
        <div id="page-5-1" class="swiper-slide">
            <div id="msg">
                <div id="msg-content">
                    @foreach($msg as $item)
                    <div class="msg-content-item">
                        <span class="msg-content-item-tittle">{{$item->vote_name}}</span><span> &nbsp：</span>
                        <div class="msg-content-item-content">{{$item->msg}}</div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div id="page-6" class="swiper-slide">
            <img class="wh100 full-img ani" src="img/6/1.jpg">
        </div>
    </div>
    <div id="music" class="music-on" style="position: fixed;width: 34px;height: 34px;right: 2vw;bottom:1vh;z-index: 2;background-size: 100% 100%"></div>
</div>
<script src="/js/swiper.animate1.0.3.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    var music = new Audio();
    music.src = '/music/1.mp3';
    wx.config(<?php echo $app->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    wx.ready(function () {      //需在用户可能点击分享按钮前就先调用
        var data = {
            title: '2018成都市房地产诚信企业评选', // 分享标题
            desc: '欢迎点赞，恭候吐槽！', // 分享描述
            link: 'http://fcpc.cdsihe.com/', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'http://fcpc.cdsihe.com/img/share.jpg?v=1', // 分享图标
        };
        wx.onMenuShareTimeline(data);
        wx.onMenuShareAppMessage(data);
        music.play();
    });
</script>

<script>
    var select = '';
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'vertical', // 垂直切换选项
        //autoplay: true,
        //effect : 'fade',
        on: {
            init: function () {
                swiperAnimateCache(this); //隐藏动画元素
                swiperAnimate(this); //初始化完成开始动画
            },
            slideChangeTransitionEnd: function () {
                swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
            }
        }
    })
    $ = mySwiper.$;
    $('.list .item').on('click', function (e) {
        select = $(this).text();
        $('#dialog-kfs').text(select);
        var logoFile = $(this).data('logofile');
        $('.dialog .logo').attr('src', logoFile)
        $('.content').addClass('none');
        $('.dialog').removeClass('none');
    })
    $('#page-5 .dialog .close').on('click', function (e) {
        $('i').removeClass('selected');
        $('.dialog').addClass('none');
        $('.content').removeClass('none');
        $('textarea').text('');
    });
    $('#page-5 .dialog .zan-txt').on('click', function (e) {
        if ($(this).children('.pj').hasClass('selected')) {
            $(this).children('.pj').toggleClass('selected');
        } else {
            $(this).children('.pj').toggleClass('selected');
        }
    });
    $('#submit').on('click', function (e) {
        var up = $('.up.selected').data('no');
        var down = $('.down.selected').data('no');
        if (up === undefined && down === undefined) {
            alert('请选择评价');
            return;
        }

        var messageUp = $('#message-up')[0].value;
        var messageDown = $('#message-down')[0].value;
        /*if (message == '') {
            alert('请填写留言')
            return;
        }*/
        axios.post('/pc', {
            name: select,
            up:up,
            down:down,
            message_up: messageUp,
            message_down:messageDown
        })
            .then(function (response) {
                if (response.data.code == 200) {
                    mySwiper.slideNext();
                } else {
                    alert(response.data.message)
                }
            })
            .catch(function (error) {
                alert('对不起,提交失败');
            });
    })

    $('#music').on('click', function (e) {
        if ($(this).hasClass('music-on')) {
            music.pause();
            $(this).removeClass('music-on');
            $(this).addClass('music-off');
        } else if ($(this).hasClass('music-off')) {
            music.play();
            $(this).removeClass('music-off');
            $(this).addClass('music-on');
        }
    })
    $('#message-up').on('input',function (e) {
        if(!$('.up').hasClass('selected')){
            $('.up').addClass('selected');
        }
    })
    $('#message-down').on('input',function (e) {
        if(!$('.down').hasClass('selected')){
            $('.down').addClass('selected');
        }
    })
    $('textarea').on('focus',function () {
        $(this).next('.textarea-placeholder').addClass('none');
    })
    $('#msg-content').on('touchmove',function (e) {
        e.stopPropagation();
    })

    $('#msg-content').on('touchstart',function (e) {
        e.stopPropagation();
    })
    $('#msg-content').on('touchend',function (e) {
        e.stopPropagation();
    })
</script>
</body>

</html>