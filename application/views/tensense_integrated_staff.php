<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：综合管理&nbsp;>&nbsp;人员管理</i>
        </div>
        <!--人员台账-->
        <ul class="tensense_integrated_staff tensense_global">
            <li class="title">
                <i class="iconfont icon-staff">&nbsp;人员台账</i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content">
                        <label for="name" class="text_label">姓名:</label>
                        <input type="text" class="text_input outline" name="name" placeholder="姓名" id="name">
                    </div>
                    <div class="search_content">
                        <label for="sex" class="text_label">性别:</label>
                        <select name="sex" id="sex" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="background" class="text_label">学历:</label>
                        <select name="background" id="background" class="text_input outline">
                            <option value="">未选择</option>
                            <?php foreach ($backgroundList as $value) { ?>
                                <option value="<?=$value['background_id']?>"><?=$value['background_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="position" class="text_label">职务:</label>
                        <select name="position" id="position" class="text_input outline">
                            <option value="">未选择</option>
                            <?php foreach ($positionList as $position) { ?>
                                <option value="<?=$position['position_id']?>"><?=$position['position_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="technology" class="text_label">技术职称:</label>
                        <select name="technology" id="technology" class="text_input outline">
                            <option value="">未选择</option>
                            <?php foreach ($technologyList as $technology) { ?>
                                <option value="<?=$technology['technology_id']?>"><?=$technology['technology_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="mobile" class="text_label">移动电话:</label>
                        <input type="text" class="text_input outline" name="mobile_number" placeholder="移动电话" id="mobile">
                    </div>
                    <div class="search_content">
                        <label for="email" class="text_label">电子邮箱:</label>
                        <input type="text" class="text_input outline" name="email" placeholder="移动电话" id="mobile">
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
                        <th>公司</th>
                        <th>标段</th>
                        <th>单位</th>
                        <th>试验室</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>职称</th>
                        <th>职务</th>
                        <th>工作年限</th>
                        <th>联系方式</th>
                        <th>邮箱</th>
                        <th>学历</th>
                        <th>毕业学校</th>
                        <th>专业</th>
                        <th>操作</th>
                    </tr>
                    <?php if (empty($memberList)) { ?>
                        <tr>
                            <td colspan="17">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($memberList as $member) { ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $member['member_company']; ?></td>
                                <td><?= $member['section_name']; ?></td>
                                <td><?= $member['section_unit']; ?></td>
                                <td><?= $member['section_laboratory']; ?></td>
                                <td><?= $member['member_name']; ?></td>
                                <td><?= $member['member_sex'] == 1 ? '男' : '女'; ?></td>
                                <td><?= $member['member_age']; ?></td>
                                <td><?= $member['technology_name']; ?></td>
                                <td><?= $member['position_name']; ?></td>
                                <td><?= $member['member_work_year']; ?></td>
                                <td><?= $member['member_mobile']; ?></td>
                                <td><?= $member['member_email']; ?></td>
                                <td><?= $member['background_name']; ?></td>
                                <td><?= $member['member_school']; ?></td>
                                <td><?= $member['member_major']; ?></td>
                                <td>
                                    <a href="javascript:;" class="tensense_operate_btn tensense_delete_btn">
                                        <i class="iconfont icon-delete"></i>
                                    </a>
                                    <input type="hidden" value="<?= $member['member_id'] ?>" class="memberInfo" name="memberInfo">
                                </td>
                            </tr>
                            <? $i++;
                        }
                    } ?>
                </table>
                <script type="text/javascript">
                    $(function(){
                        $('.tensense_delete_btn').click(function() {
                            var memberInfo = $(this).next().val();
                            $.ajax({
                                url: "<?=site_url('tensense/memberDelete')?>",
                                type: 'post',
                                data: {memberInfo:memberInfo},
                                dataType: 'json',
                                success: function (rs) {
                                    if (rs.msg == '1') {
                                        alert('删除成功！');
                                        window.location.reload();
                                    } else {
                                        alert('删除失败！');
                                        window.location.reload();
                                    }
                                }
                            });
                            return false;
                        });
                    });
                </script>
            </li>
        </ul>
    </div>
</div>

<!--尾部内容-->
<?php include 'tensense_footer.php';?>