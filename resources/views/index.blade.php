<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rainy mood</title>

    <style>
        body {
            background: url({!!getQiniuUrl('/rainy/bg.jpg')!!}) no-repeat;
            background-size: 100% auto;        	
        }

        #title {
            color: #FFF;
        }
        #container{
            margin-top: 170px;
            text-align: center;
        }
        #change_volume{
            margin:0 auto;
        }
    </style>
</head>
<body>

    <div id="jquery_jplayer"></div>

    <div id="container">
        <h1 id="title">rain makes everything better.</h1>

        <div><img id="change_volume" src="/static/img/volume/vol3.png" /></div>
    </div>
    <div style="display: none">
        <img src="/static/img/volume/vol2.png" />
        <img src="/static/img/volume/vol1.png" />
        <img src="/static/img/volume/vol0.png" />
    </div>

<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script src="/static/js/jquery.jplayer.min.js"></script>
<script>
    $(document).ready(function () {
    
        var vol=3;
        var jp = $('#jquery_jplayer');

        jp.jPlayer({
            ready: function () {
                $(this).jPlayer('setMedia', {
                    m4a: '{!! getQiniuUrl('/rainy/0.m4a') !!}',
                    oga: '{!! getQiniuUrl('/rainy/0.oga') !!}'
                }).jPlayer('play');
            },
            swfPath: 'swf',
            supplied: 'm4a, oga',
            loop: true,
            volume: 1.0
        });

        $('#change_volume').click(function(){

            vol++;
            vol=vol>3?0:vol;
            switch (vol){
                case 3:
                    $('#change_volume').attr('src', '/static/img/volume/vol3.png');
                    jp.jPlayer('volume', 1.0);
                    break;
                case 2:
                    $('#change_volume').attr('src', '/static/img/volume/vol2.png');
                    jp.jPlayer('volume', 0.7);
                    break;
                case 1:
                    $('#change_volume').attr('src', '/static/img/volume/vol1.png');
                    jp.jPlayer('volume', 0.3);
                    break;
                case 0:
                    $('#change_volume').attr('src', '/static/img/volume/vol0.png');
                    jp.jPlayer('volume', 0);
                    break;
            }
        });

        
    });
</script>


</body>
</html>