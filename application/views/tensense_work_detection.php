<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：工作管理&nbsp;>&nbsp;第三方检测台账</i>
        </div>
        <!--第三方检测台帐-->
        <ul class="tensense_work_detaction tensense_global">
            <li class="title">
                <i class="iconfont icon-test">&nbsp;试验台账</i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content search_time">
                        <label for="time" class="text_label">委托时间:</label>
                        <input type="text" class="text_input time_input_begin outline" name="time" readonly="readonly" placeholder="开始时间" id="time_begin">
                        <i class="iconfont icon_time_begin icon-calendar"></i>
                        <span>-</span>
                        <input type="text" class="text_input time_input_end outline" readonly="readonly" placeholder="结束时间" id="time_end">
                        <i class="iconfont icon_time_end icon-calendar"></i>
                    </div>
                    <div class="search_content">
                        <label for="project" class="text_label">试验项目:</label>
                        <select name="project" id="project" class="text_input outline">
                            <option value="0">全部试验</option>
                            <?php foreach ($projectList as $value) { ?>
                                <option value="<?=$value['project_id']?>"><?=$value['project_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="standard" class="text_label">是否合格:</label>
                        <select name="standard" id="standard" class="text_input outline">
                            <option value="0">未选择</option>
                            <?php foreach ($standardList as $value) { ?>
                                <option value="<?=$value['standard_id']?>"><?=$value['standard_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="category" class="text_label">试验类型:</label>
                        <select name="category" id="category" class="text_input outline">
                            <option value="">未选择</option>
                            <?php foreach ($categoryList as $value) { ?>
                                <option value="<?=$value['category_id']?>"><?=$value['category_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="delegate_number" class="text_label">委托编号:</label>
                        <input type="text" class="text_input outline" name="delegate_number" placeholder="委托编号" id="delegate_number">
                    </div>
                    <div class="search_content">
                        <label for="report_number" class="text_label">报告编号:</label>
                        <input type="text" class="text_input outline" name="report_number" placeholder="报告编号" id="report_number">
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
                        <th>试验室</th>
                        <th>试验项目</th>
                        <th>试验类型</th>
                        <th>工程信息</th>
                        <th>检测信息</th>
                        <th>委托编号</th>
                        <th>报告日期</th>
                        <th>报告编号</th>
                        <th>批准时间</th>
                        <th>是否合格</th>
                        <th>签收状态</th>
                    </tr>
                    <?php if (empty($testList)) { ?>
                        <tr>
                            <td colspan="12">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($testList as $test) { ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$test['test_laboratory'];?></td>
                                <td><?=$test['project_name'];?></td>
                                <td><?=$test['category_name'];?></td>
                                <td><?=$test['test_engineer_info'];?>(反射波)</td>
                                <td><?=$test['test_detect_info'];?></td>
                                <td><?=$test['entrust_num'];?></td>
                                <td><?=date('Y-m-d H:i:s',$test['test_report_dateline']);?></td>
                                <td><?=$test['test_report_num'];?></td>
                                <td><?=date('Y-m-d H:i:s',$test['test_approval_dateline']);?></td>
                                <td><?=$test['standard_name'];?></td>
                                <td><?=$test['is_receive'] == 0 ? '<span class="tensense_unfinished">未签收</span>' : '<span class="tensense_finished">已签收</span>'?></td>
                            </tr>
                        <? $i++; }
                    }?>
                </table>
            </li>
        </ul>
        <!--任务进度-->
        <ul class="tensense_task_progress tensense_global">
            <li class="title">
                <i class="iconfont icon-progress">&nbsp;任务进度</i>
            </li>
        </ul>
    </div>
</div>
<!--尾部内容-->
<?php include 'tensense_footer.php';?>