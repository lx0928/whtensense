<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：考核管理&nbsp;>&nbsp;问题库</i>
        </div>
        <!--问题库-->
        <ul class="tensense_check_problem tensense_global">
            <li class="title">
                <i class="iconfont icon-warehouse">&nbsp;问题库</i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content search_time">
                        <label for="time" class="text_label">产生时间:</label>
                        <input type="text" class="text_input time_input_begin outline" name="time" readonly="readonly" placeholder="开始时间" id="time_begin">
                        <i class="iconfont icon_time_begin icon-calendar"></i>
                        <span>-</span>
                        <input type="text" class="text_input time_input_end outline" readonly="readonly" placeholder="结束时间" id="time_end">
                        <i class="iconfont icon_time_end icon-calendar"></i>
                    </div>
                    <div class="search_content">
                        <label for="problem_number" class="text_label">问题编号:</label>
                        <input type="text" class="text_input outline" name="problem_number" placeholder="问题编号" id="problem_number">
                    </div>
                    <div class="search_content">
                        <label for="problem_category" class="text_label">问题类型:</label>
                        <select name="problem_category" id="problem_category" class="text_input outline">
                            <option value="0">所有类型</option>
                            <?php foreach ($categoryList as $value) { ?>
                                <option value="<?=$value['category_id']?>"><?=$value['category_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="problem_level" class="text_label">问题级别:</label>
                        <select name="problem_level" id="problem_level" class="text_input outline">
                            <option value="0">所有级别</option>
                            <?php foreach ($levelList as $value) { ?>
                                <option value="<?=$value['level_id']?>"><?=$value['level_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="problem_confirm" class="text_label">问题确认:</label>
                        <select name="problem_confirm" id="problem_confirm" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">问题存在</option>
                            <option value="2">问题不存在</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="rectification_result" class="text_label">整改结果:</label>
                        <select name="rectification_result" id="rectification_result" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">未整改</option>
                            <option value="2">已整改</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="rectification_result_confirm" class="text_label">整改结果确认:</label>
                        <select name="rectification_result_confirm" id="rectification_result_confirm" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">满足要求</option>
                            <option value="2">不满足要求</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="logout_confirm" class="text_label">销号确认:</label>
                        <select name="logout_confirm" id="logout_confirm" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">同意</option>
                            <option value="2">不同意</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="problem_status" class="text_label">问题状态:</label>
                        <select name="problem_status" id="problem_status" class="text_input outline">
                            <option value="0">未选择</option>
                            <?php foreach ($statusList as $value) { ?>
                                <option value="<?=$value['status_id']?>"><?=$value['status_name']?></option>
                            <? } ?>
                        </select>
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
                        <th>状态</th>
                        <th>产生时间</th>
                        <th>问题编号</th>
                        <th>问题类型</th>
                        <th>标段</th>
                        <th>单位</th>
                        <th>试验室</th>
                        <th>问题来源</th>
                        <th>问题描述</th>
                        <th>问题级别</th>
                        <th>扣分值</th>
                        <th>责任单位</th>
                        <th>问题确认</th>
                        <th>整改结果</th>
                        <th>整改结果确认</th>
                        <th>销号确认</th>
                        <th>责任人</th>
                    </tr>
                    <?php if (empty($problemList)) { ?>
                        <tr>
                            <td colspan="18">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($problemList as $problem) { ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?=$problem['status_name']?></td>
                                <td><?=date('Y-m-d H:i:s',$problem['problem_dateline'])?></td>
                                <td><?=$problem['problem_num']?></td>
                                <td><?=$problem['category_name']?></td>
                                <td><?=$problem['section_name']?></td>
                                <td><?=$problem['section_unit']?></td>
                                <td><?=$problem['section_laboratory']?></td>
                                <td><?=$problem['problem_source']?></td>
                                <td><?=$problem['problem_description']?></td>
                                <td><?=$problem['level_name']?></td>
                                <td><?=$problem['problem_buckle_score']?>分</td>
                                <td><?=$problem['section_unit']?></td>
                                <td><?=$problem['problem_confirm'] == 1 ? '<span class="tensense_unfinished">问题存在</span>' : '<span class="tensense_finished">问题不存在</span>'?></td>
                                <td><?=$problem['problem_rect_results'] == 1 ? '<span class="tensense_unfinished">未整改</span>' : '<span class="tensense_finished">已整改</span>'?></td>
                                <td><?=$problem['problem_rect_confirm'] == 1 ? '<span class="tensense_unfinished">不满足要求</span>' : '<span class="tensense_finished">满足要求</span>'?></td>
                                <td><?=$problem['problem_logout'] == 1 ? '<span class="tensense_unfinished">不同意</span>' : '<span class="tensense_finished">同意</span>'?></td>
                                <td><?=$problem['section_header']?></td>
                            </tr>
                        <? $i++; }
                    }?>
                </table>
            </li>
        </ul>
    </div>
</div>

<?php include 'tensense_footer.php';?>