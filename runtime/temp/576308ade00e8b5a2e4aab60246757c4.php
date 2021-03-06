<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\www\twothink\public/../application/home/view/default/article\article\detail.html";i:1511952326;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">
     <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>

    <div class="container">
        <h2><?php echo $info['title']; ?></h2>
        <p>
				<span  class="pull-left">
					<span class="author"><?php echo get_username($info['uid']); ?></span>
					<span> 发表于 <?php echo date('Y-m-d H:i',$info['create_time']); ?></span>
				</span>
				<span class="pull-right">
					<?php $prev = model('Document')->prev($info); if(!(empty($prev) || (($prev instanceof \think\Collection || $prev instanceof \think\Paginator ) && $prev->isEmpty()))): ?>
                        <a href="<?php echo url('',array('id'=>$prev['id'])); ?>">上一篇</a>
                    <?php endif; $next = model('Document')->next($info); if(!(empty($next) || (($next instanceof \think\Collection || $next instanceof \think\Paginator ) && $next->isEmpty()))): ?>
                        <a href="<?php echo url('?id='.$next['id']); ?>">下一篇</a>
                    <?php endif; ?>
        </p>
    </div>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('Index/index'); ?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
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

    <!--<div class="container-fluid">-->

        <!--<div class="blank"></div>-->
        <!--<h3 class="noticeDetailTitle"><strong><?php echo $notice['title']; ?></strong></h3>-->
        <!--<div class="noticeDetailInfo">发布者:<?php echo $name['nickname']; ?></div>-->
        <!--<div class="noticeDetailInfo">发布时间：<?php echo date('Y-m-d H:i:s',$notice['create_time']); ?></div>-->
        <!--<div class="noticeDetailContent">-->
           <!--<?php echo $list['content']; ?>-->
        <!--</div>-->

    <!--</div>-->
</div>

<div class="span9 main-content">
    <!-- Contents
    ================================================== -->
    <section id="contents"><?php echo $info['content']; ?></section>
    <hr/>
    <?php echo hook('documentDetailAfter',$info); ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>