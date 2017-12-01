<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\www\twothink\public/../application/user/view/default/login\index.html";i:1511946268;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>登录</title>

    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="http://www.twothink.com/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="http://www.twothink.com/home/service/index.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

        <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label>用户名:</label>
                <input type="text" class="form-control" name="username" />
            </div>

            <div class="form-group">
                <label>密码:</label>
                <input type="password" class="form-control" name="password"/>
            </div>
            <div class="form-group">
                <label>验证码:</label>
                <input type="text" class="form-control" name="verify"/>
            </div>

            <div class="controls verifyimg">
                <?php echo captcha_img(); ?>
            </div>
            <div class="controls Validform_checktip text-warning"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary onlineBtn">登录</button>
            </div>
        </form>
    </div>
    <div class="container">
        <p><span><span class="pull-left"><span>还没有账号? <a href="<?php echo url('login/register'); ?>">立即注册</a></span> </span></p>
    </div>
</div>
<script src="/static/jquery-1.11.2.min.js"></script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
 

<script type="text/javascript">

    $(document)
            .ajaxStart(function(){
                $("button:submit").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function(){
                $("button:submit").removeClass("log-in").attr("disabled", false);
            });


    $("form").submit(function(){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data){
            if(data.code){
                window.location.href = data.url;
            } else {
                self.find(".Validform_checktip").text(data.msg);
                //刷新验证码
                $(".verifyimg img").click();
            }
        }
    });

    $(function(){
        //刷新验证码
        var verifyimg = $(".verifyimg img").attr("src");
        $(".verifyimg img").click(function(){
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });

</script>

</body>
</html>