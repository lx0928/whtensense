<?php
@error_reporting(0);
//判断用户session是否存在
if (!isset($_SESSION['username'])) {
    redirect('tensense');
    return false;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tensense.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/iconfonts/iconfont.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-ui.min.css')?>">
    <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/tensense.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/tensense_calendar.js')?>"></script>
    <title>质量检测管理系统</title>
</head>
<body>
<div class="header">
    <div class="system_info">
        <img src="/assets/images/logo.png" alt="logo" class="logo" onclick="location='<?=site_url("tensense/nav")?>'" title="点击可查看公司简介">
        <h3 class="title">工程质量检测管理系统</h3>
    </div>
    <div class="user_info">
        <a href="javascript:;" class="name">
            <i class="iconfont icon-user"></i>
            <span><?=$_SESSION['username']?></span>
        </a>
        <ul class="operate">
            <li>
                <a href="javascript:;" onclick="openResume()"></a>
                <i class="iconfont icon-detail" title="个人履历">&nbsp;个人履历</i>
            </li>
            <li>
                <a href="<?=site_url('tensense/nav/pwd')?>" class="password" id="pwd10"></a>
                <i class="iconfont icon-password" title="修改密码">&nbsp;修改密码</i>
            </li>
            <li>
                <a href="javascript:;" id="logout_btn"></a>
                <i class="iconfont icon-logout" title="注销退出">&nbsp;注销退出</i>
            </li>

        </ul>
    </div>
    <script type="text/javascript">
        function openResume() {
            window.open ("<?=site_url('tensense/resume')?>", "个人履历详细资料", "height=500, width=1000, top=50, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
            /*备注
            window.open 弹出新窗口的命令；
            'tensense/resume' 弹出窗口的文件名；
            '个人履历详细资料' 弹出窗口的名字（不是文件名），非必须，可用空''代替；
            height=100 窗口高度；
            width=400 窗口宽度；
            top=0 窗口距离屏幕上方的象素值；
            left=0 窗口距离屏幕左侧的象素值；
            toolbar=no 是否显示工具栏，yes为显示；
            menubar，scrollbars 表示菜单栏和滚动栏。
            resizable=no 是否允许改变窗口大小，yes为允许；
            location=no 是否显示地址栏，yes为允许；
            status=no 是否显示状态栏内的信息（通常是文件已经打开），yes为允许；
            */
        }
        //注销登录
        $('#logout_btn').click(function(){
            $.ajax({
                url:"<?=site_url('tensense/logout')?>",
                dataType:'json',
                success:function (rs) {
                    if (rs.msg == 1) {
                        alert('注销成功！');
                        window.location.href = "<?=site_url("tensense")?>";
                    } else {
                        alert('注销失败！');
                    }
                }
            });
            return false;
        });
    </script>
</div>