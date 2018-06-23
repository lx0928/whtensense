<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：系统设置&nbsp;>&nbsp;修改密码</i>
        </div>
        <!--修改密码-->
        <div class="tensense_setup_password tensense_global">
            <form action="" method="post" class="setup_form">
                <ul>
                    <li>
                        <label for="" class="text_label">账户名:</label>
                        <input type="text" class="text_input outline user_input" name="username" disabled="disabled" value="<?=$_SESSION['username']?>">
                    </li>
                    <li>
                        <label for="old_password" class="text_label">旧密码:</label>
                        <input type="password" class="text_input outline" name="old_password" id="old_password" placeholder="请输入旧密码" id="old_password">
                        <i class="iconfont icon_input icon-pwd"></i>
                    </li>
                    <li>
                        <label for="new_password" class="text_label">新密码:</label>
                        <input type="password" class="text_input outline" name="new_password" id="new_password" placeholder="请输入新密码" id="new_password">
                        <i class="iconfont icon_input icon-pwd"></i>
                    </li>
                    <li>
                        <label for="new_password_confirm" class="text_label">确认密码:</label>
                        <input type="password" class="text_input outline" name="new_password_confirm" id="new_password_confirm" placeholder="请再次输入新密码">
                        <i class="iconfont icon_input icon-confirm"></i>
                    </li>
                    <li>
                        <i class="prompt iconfont icon-prompt" id="prompt"></i>
                        <input type="submit" class="submit_btn outline operate_btn" value="提交">
                        <!--<i class="iconfont icon_operate icon-submit"></i>-->
                        <input type="reset" class="reset_btn outline operate_btn" value="重置">
                        <!--<i class="iconfont icon_operate icon-reset"></i>-->
                    </li>
                </ul>
            </form>
            <script type="text/javascript">
                $(function(){
                    $('.tensense_setup_password .submit_btn').click(function(){
                        //判断不为空
                        var old_password = $('#old_password').val();
                        var new_password = $('#new_password').val();
                        var new_password_confirm = $('#new_password_confirm').val();

                        if (old_password == '') {
                            $('#prompt').show(100).html('&nbsp;旧密码不能为空!');
                            $('#old_password').focus();
                            return false;
                        }
                        if (new_password == '') {
                            $('#prompt').show().html('&nbsp;新密码不能为空!');
                            $('#new_password').focus();
                            return false;
                        }
                        if (new_password.length < 6 || new_password.length > 16) {
                            $('#prompt').show().html('&nbsp;新密码长度必须在6到16位之间!');
                            $('#new_password').focus();
                            return false;
                        }
                        if (new_password_confirm == '') {
                            $('#prompt').show().html('&nbsp;确认密码不能为空!');
                            $('#new_password_confirm').focus();
                            return false;
                        }
                        if (new_password != new_password_confirm) {
                            $('#prompt').show().html('&nbsp;两次密码输入不一致！');
                            $('#new_password_confirm').focus();
                            return false;
                        }

                        $.ajax({
                            url:"<?=site_url('tensense/password')?>",
                            type:'post',
                            data: $('.tensense_setup_password .setup_form').serialize(),
                            dataType:'json',
                            success:function (rs) {
                                if (rs.msg == '3') {
                                    $('#prompt').hide();
                                    alert('修改成功！');
                                    window.location.href = "<?=site_url("tensense")?>";
                                } else if (rs.msg == '2') {
                                    alert('修改失败！');
                                } else if (rs.msg == '1') {
                                    $('#prompt').show().html('&nbsp;新密码与旧密码不能相同!');
                                    $('#new_password').focus();
                                } else {
                                    $('#prompt').show().html('&nbsp;旧密码不正确!');
                                    $('#old_password').focus();
                                }
                            }
                        });
                        return false;
                    });
                });
            </script>
        </div>
    </div>
</div>
<!--尾部内容-->
<?php include 'tensense_footer.php';?>