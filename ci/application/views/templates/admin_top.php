<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?php  echo base_url();?>"/>
    <link rel="icon" href="./gl_doc/favicon.ico">
    <link href="./gl_doc/bootstrap.min.css" rel="stylesheet">
    <link href="./gl_doc/blog.css" rel="stylesheet">
    <script src="./gl_doc/ie-emulation-modes-warning.js"></script>
    <script src="./gl_doc/jquery-3.1.0.js"></script>
    <script src="./gl_doc/login.js"></script>
    <title> <?php echo $title; ?> </title>

</head>
<body>
<div id="Top"><!--最上面的块-->

    <div class="content">
        <div style="padding-top: 6px;">
            <table align="center">
                <th><b>欢迎观临!</b><th>
            </table>
        </div>
    </div>
</div>
<div class="blog-masthead"><!--显示主题的块-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <nav class="blog-nav">
                    <a class="blog-nav-item" href="<?php echo site_url('admin/index');?>">首页</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/shenghuo');?>">生活</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/keji');?>">科技</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/gongzuo');?>">工作</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/junshi');?>">军事</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/lunli');?>">伦理</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/tiyu');?>">体育</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/shishang');?>">时尚</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/jiaoyu');?>">教育</a>
                    <a class="blog-nav-item" href="<?php echo site_url('admin/topical/zhengzhi');?>">政治</a>
                </nav>
            </div>
            <div class="col-xs-6 col-md-4">
                <nav class="blog-nav">
                    管理员：<strong><?php echo $name;?></strong>&emsp;
                    <a href="<?php echo site_url('admin/sign_out');?>" class="blog-nav-item">退出</a>
                </nav>
            </div>
        </div>
    </div>
</div>




