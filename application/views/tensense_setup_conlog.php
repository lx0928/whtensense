<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：系统设置&nbsp;>&nbsp;登录日志</i>
        </div>
        <!--登录日志-->
        <ul class="tensense_setup_log tensense_global">
            <li class="title">
                <i class="iconfont icon-technology">&nbsp;登录次数统计（
                    <span class="tensense_home_time">*单击条目显示用户操作日志明细</span>
                    ）
                </i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content search_time">
                        <label for="time" class="text_label">时间范围:</label>
                        <input type="text" class="text_input time_input_begin outline" name="time" placeholder="开始时间" id="time_begin" readonly="readonly">
                        <i class="iconfont icon_time_begin icon-calendar"></i>
                        <span>-</span>
                        <input type="text" class="text_input time_input_end outline" placeholder="结束时间" id="time_end" readonly="readonly">
                        <i class="iconfont icon_time_end icon-calendar"></i>
                    </div>
                    <div class="search_content">
                        <label for="user_name" class="text_label">用户姓名:</label>
                        <input type="text" class="text_input outline" name="user_name" placeholder="用户姓名" id="user_name">
                    </div>
                    <div class="search_content search_btn">
                        <input type="submit" class="submit_btn outline" value="查询">
                    </div>
                </form>
            </li>
            <li>
                <table class="overflowTable">
                    <tr>
                        <th>序号</th>
                        <th>标段</th>
                        <th>单位</th>
                        <th>试验室</th>
                        <th>姓名</th>
                        <th>操作动作</th>
                        <th>登录次数</th>
                    </tr>
                    <?php if (empty($loginList)) { ?>
                        <tr>
                            <td colspan="7">暂无数据</td>
                        </tr>
                    <? } else {
                        foreach($loginList as $value) { ?>
                            <tr class="log_click">
                                <!--onclick="location='<?/*=site_url("tensense/conlog/".$value["user_id"])*/?>'"-->
                                <td><?=$value['user_id'];?></td>
                                <td>DSF-CS标</td>
                                <td>第三方测试单位</td>
                                <td>第三方试验室</td>
                                <td><?=$value['user_name'];?></td>
                                <td>用户登录</td>
                                <td><?=$value['user_login_num'];?></td>
                            </tr>
                        <? }
                    } ?>
                </table>
            </li>
        </ul>
        <!--操作日志明细-->
        <ul class="tensense_setup_logDetail tensense_global">
            <li class="title">
                <i class="iconfont icon-check">&nbsp;操作日志明细</i>
            </li>
            <li>
                <table class="overflowTable">
                    <tr>
                        <th>序号</th>
                        <th>姓名</th>
                        <th>操作动作</th>
                        <th>操作时间</th>
                        <th>退出时间</th>
                        <th>登录IP</th>
                    </tr>
                    <?php for($i=1;$i<=4;$i++) { ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td>007</td>
                            <td>设备管理</td>
                            <td>2018-06-12 10:23:19</td>
                            <td>2018-06-12 10:24:19</td>
                            <td>127.0.0.1</td>
                        </tr>
                    <? } ?>
                </table>
            </li>
        </ul>
    </div>
</div>
<!--尾部内容-->
<?php include 'tensense_footer.php';?>
