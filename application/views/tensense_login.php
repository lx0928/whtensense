<?php @error_reporting(0);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<meta http-equiv="Cache-Control" content="no-cache,no-store, must-revalidate">-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tensense.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/iconfonts/iconfont.css')?>">
    <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/tensense.js')?>"></script>
    <title>登录注册</title>
</head>
<body>
    <div class="tensense_login_screen">
        <ul>
            <?php for ($i=4;$i<8;$i++) { ?>
            <li>
                <img src="<?=base_url('assets/images/screen'.$i.'.jpg')?>">
            </li>
            <? } ?>
        </ul>
    </div>
    <ul class="tensense_login_window">
        <li class="title">
            <img src="./assets/images/logo.png" alt="logo" class="logo">
            <img src="./assets/images/login.jpg" alt="loginLogo" class="loginLogo">
            <h3>工程质量检测管理系统</h3>
        </li>
        <li class="info">
            <form action="" method="post" class="tensense_login_form">
                <ul>
                    <li>
                        <input type="text" class="text_input outline" name="username" placeholder="请输入账号" id="username">
                        <i class="iconfont icon-user" title="账号"></i>
                    </li>
                    <li>
                        <input type="password" class="text_input outline" name="password" placeholder="请输入密码" id="password">
                        <i class="iconfont icon-pwd" title="密码"></i>
                    </li>
                    <li>
                        <input type="text" class="code_input text_input outline" name="code" placeholder="请输入验证码" maxlength="4" id="code">
                        <i class="iconfont icon-code" title="验证码"></i>
                        <!--生成验证码并能点击刷新-->
                        <img src="<?=site_url('tensense/code')?>" alt="" class="code" onclick="javascript:this.src=this.src+'?time='+Math.random();" title="看不清？点击就换">
                    </li>
                    <li>
                        <i class="prompt iconfont icon-prompt" id="prompt"></i>
                        <input type="submit" class="operate_btn submit_btn outline" value="登录">
                        <input type="reset" class="operate_btn reset_btn outline" value="重置">
                    </li>
                </ul>
            </form>
        </li>
    </ul>
    <div class="footer tensense_login_footer">
        <span>版权所有 © 武汉天宸伟业物探科技有限公司   鄂ICP备1300651号</span>
    </div>
    <script type="text/javascript">
        $(function(){
            $('.tensense_login_form .submit_btn').click(function(){

                var username = $('#username').val();
                var password = $('#password').val();
                var code = $('#code').val();
                if (username =='') {
                    $('#prompt').show().html('&nbsp;账户不能为空！');
                    $('#username').focus();
                    return false;
                }
                if (password == '') {
                    $('#prompt').show().html('&nbsp;密码不能为空！');
                    $('#password').focus();
                    return false;
                }
                if (code == '') {
                    $('#prompt').show().html('&nbsp;验证码不能为空！');
                    $('#code').focus();
                    return false;
                }

                $.ajax({
                    url:"<?=site_url('tensense/login')?>",
                    type:'post',
                    data: $('.tensense_login_form').serialize(),
                    dataType:'json',
                    success:function (rs) {
                        if (rs.msg == 4) {
                            alert('登录成功！');
                            window.location.href = "<?=site_url("tensense/nav")?>";
                        } else if (rs.msg == 3) {
                            alert('登录失败！');
                        } else if (rs.msg == 2) {
                            $('#prompt').show().html('&nbsp;验证码错误！');
                            $('#code').focus();
                        } else if (rs.msg == 1){
                            $('#prompt').show().html('&nbsp;密码错误！');
                            $('#password').focus();
                        } else {
                            $('#prompt').show().html('&nbsp;用户名不存在！');
                            $('#username').focus();
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>