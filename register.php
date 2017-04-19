<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>验证码</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/register.css">
    <script src="js/register.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/messages_zh.js"></script>
</head>
<?php
session_start();
require 'func.php';


//判断是否提交表单
if(@$_POST['action'] == "register"){

    if(!($_POST['checkcode'] == $_SESSION['code'])){

        echo '<h1>:(</h1><br>验证码错误，请返回重新提交！';
        //_aler_back('验证码错误');

    }else{
        echo $_POST['username'];
        echo '<h1>:)</h1><br>注册信息已提交，请耐心等待审核！';

    }


 exit();
}



?>

<body>

    <div id="register" class="col-xs-9">
        <form id="sighupForm" class="form-horizontal" method="POST" action="register.php">
            <input type="hidden" name="action" value="register">
            <div class="form-group">
                <label class="control-label col-sm-3">用户名：</label>
                <div class="col-sm-6">
                    <input name="username" type="text" class="form-control" placeholder="请输入您的用户名" >
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">密码：</label>
                <div class="col-sm-6">
                    <input id="password" name="password" type="password" class="form-control" placeholder="请输入密码">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">确认密码：</label>
                <div class="col-sm-6">
                    <input name="passwordAgain" type="password" class="form-control" placeholder="请再一次输入密码">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">验证码：</label>
                <div class="col-sm-2">
                    <input name="checkcode" type="text" class="form-control" placeholder="验证码">
                </div>
                <div class="col-sm-2" >
                    <img id="checkcode" src="checkcode.php" alt="">
                </div>

            </div>
            <div class="col-xs-offset-7">
                <input id="check" type="submit" class="btn btn-info" value="注册">
                <input id="reset" type="button" class="btn btn-danger" value="取消">

            </div>

        </form>
    </div>

</body>
</html>