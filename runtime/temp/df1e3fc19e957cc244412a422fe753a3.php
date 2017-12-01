<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\www\twothink\public/../application/home/view/default/service\index.html";i:1511948325;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
                <p class="navbar-text"><a href="<?php echo url('Index/index'); ?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('Service/index'); ?>" class="navbar-link">服务</a></p>
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
        <?php $__CATE__ = model('Category')->getChildrenId(43);$__WHERE__ = model('Document')->listMap($__CATE__);$__LIST__ = \think\Db::name('Document')->where($__WHERE__)->field($field)->order('`level` DESC,`id` DESC')->paginate(10);if($__LIST__){ $__LIST__=$__LIST__->toArray(); $__LIST__=$__LIST__['data'];} if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="<?php echo url('Service/detail?id='.$service['id']); ?>">
            <div class="col-xs-2">
                <img class="noticeImg" src="/static/image/1.png" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?php echo $article['title']; ?></p>
                <p class="intro"><?php echo $article['description']; ?></p>
                <p class="info">浏览: <?php echo $article['view']; ?> <span class="pull-right"><?php echo date('Y-m-d H:i:s',$article['create_time']); ?></span> </p>
            </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <button  class="btn btn-success more">加载更多</button>
        <div class="page">
            <?php echo $_page; ?>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script>

//    $(window).click(".more", function () {
//        var pages=document.getElementsByClassName('row noticeList');
//        var page=(pages.length)/4;
//        console.log(page+1);
//        if($(window).scrollTop()+$(window).height()>$(document).height()-10){
//            $.getJSON("service/index",{page:page+1}, function (data) {
//                $.each(function(data){
//                    console.log(data.title);
//                    $(" <div class='row noticeList'><p class='title'>"+data.title+"</p></div>").appendTo(".col-xs-10");
//                })



//            })
//            alert(1);
//        }
//    })

</script>

</body>
</html>