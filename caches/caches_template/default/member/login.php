<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh">
<head>
        <meta charset="GB2312">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        <title>登陆</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/less.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
   <div class="header_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div class="return"><span class="fa fa-angle-left"></span></div>
                </div>
                <div class="col-xs-8">
                    <div class="header_bt"><h3>登陆</h3></div>
                </div>
            </div>
        
        </div>
  </div>
</header>
<div class="login">
	<div class="img">
    	<img src="images/login.png" width="100%">
    </div>
    <div class="form">
<form method="post" action="" id="myform" name="myform">
                <div class="form-group ">
                	<div class="fl">
                    	<img src="images/login_1.png" width="25">
                        <span>账户</span>
                    </div>
                    <div class="fr">
                        <input type="text" class="form-control" name="username" placeholder="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="border"></div>
                <div class="form-group ">
                	<div class="fl">
                    	<img src="images/login_1.png" width="25">
                        <span>密码</span>
                    </div>
                    <div class="fr">
                        <input type="password" class="form-control" name="password" placeholder="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group submit ">
                    <input type="submit" name="dosubmit" id="dosubmit" class="btn btn-info" style="width: 90%; margin: 0 5%" value="登 录">
                </div>
                <div class="link">
                    <a class="fl" href="index.php?m=member&c=index&a=register&siteid=1">立即注册</a>
                    <a class="fr" href="index.php?m=member&c=index&a=public_forget_password_mobile&siteid=1">忘记密码</a>
                    <div class="clear"></div>
                </div>
        </form>
    </div>
</div>
</body>
</html>
