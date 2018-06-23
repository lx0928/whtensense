<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：首页</i>
        </div>
        <!--问题库-->
        <ul class="tensense_home_warehouse tensense_global">
           <li class="title">
               <i class="iconfont icon-problem">&nbsp;问题库（
                   <span class="tensense_home_time"><?=date('Y-m-d 00:00:00 ',strtotime('-3 days'));?>-&nbsp;<?=date('Y-m-d 23:59:59',time());?>
                   </span>
                   ）
               </i>
           </li>
            <li class="info">
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
                    </tr>
                    <?php if (empty($problemTimeList)) { ?>
                        <tr>
                            <td colspan="17">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($problemTimeList as $problem) { ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$problem['status_name']?></td>
                                <td><?=date('Y-m-d',$problem['problem_dateline'])?></td>
                                <td><?=$problem['problem_num']?></td>
                                <td><?=$problem['category_name']?></td>
                                <td><?=$problem['section_name']?></td>
                                <td><?=$problem['section_unit']?></td>
                                <td><?=$problem['section_laboratory']?></td>
                                <td><?=$problem['problem_source']?></td>
                                <td><?=$problem['problem_description']?></td>
                                <td><?=$problem['level_name']?></td>
                                <td><?=$problem['problem_buckle_score']?>分</td>
                                <td><?=$problem['section_header_unit']?></td>
                                <td><?=$problem['problem_confirm'] == 1 ? '<span class="tensense_unfinished">问题存在</span>' : '<span class="tensense_finished">问题不存在</span>'?></td>
                                <td><?=$problem['problem_rect_results'] == 1 ? '<span class="tensense_unfinished">未整改</span>' : '<span class="tensense_finished">已整改</span>'?></td>
                                <td><?=$problem['problem_rect_confirm'] == 1 ? '<span class="tensense_unfinished">不满足要求</span>' : '<span class="tensense_finished">满足要求</span>'?></td>
                                <td><?=$problem['problem_logout'] == 1 ? '<span class="tensense_unfinished">不同意</span>' : '<span class="tensense_finished">同意</span>'?></td>
                            </tr>
                            <? $i++;
                        }
                    } ?>
                </table>
            </li>
        </ul>
        <!--检测台帐-->
        <ul class="tensense_home_detection tensense_global">
            <li class="title">
                <i class="iconfont icon-detection">&nbsp;检测台账（
                    <span class="tensense_home_time"><?=date('Y-m-d 00:00:00 ',strtotime('-3 days'));?>-&nbsp;<?=date('Y-m-d 23:59:59',time());?>
                   </span>
                    ）
                </i>
                <a href="<?=site_url('tensense/nav/detn')?>" class="work_detection">更多>></a>
            </li>
            <li>
                <table class="overflowTable">
                    <tr>
                        <th>序号</th>
                        <th>试验室</th>
                        <th>项目</th>
                        <th>报告日期</th>
                        <th>报告编号</th>
                        <th>委托编号</th>
                        <th>是否合格</th>
                        <th>签收状态</th>
                        <th>查看报告</th>
                    </tr>
                    <?php if (empty($testTimeList)) { ?>
                        <tr>
                            <td colspan="10">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($testTimeList as $test) { ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$test['test_laboratory']?></td>
                                <td><?=$test['project_name']?></td>
                                <td><?=date('Y-m-d H:i:s',$test['test_report_dateline'])?></td>
                                <td><?=$test['test_report_num']?></td>
                                <td><?=$test['entrust_num']?></td>
                                <td><?=$test['category_name']?></td>
                                <td><?=$test['is_receive'] == 0 ? '<span class="tensense_unfinished">未签收</span>' : '<span class="tensense_finished">已签收</span>'?></td>
                                <td>
                                    <a href="javascript:;" class="tensense_operate_btn tensense_view_btn">
                                        <i class="iconfont icon-view"></i>
                                    </a>
                                    <input type="hidden" value="<?=$test['test_id'] ?>" class="testInfo" name="testInfo">
                                </td>
                            </tr>
                            <? $i++;
                        }
                    } ?>
                </table>
            </li>
        </ul>
        <!--月度考核排名-->
        <ul class="tensense_home_reviewMonthly tensense_global">
            <li class="title">
                <i class="iconfont icon-check">&nbsp;月度考核排名（
                    <span class="tensense_home_time">已确认问题</span>
                    ）
                </i>
            </li>
            <li>
                <table class="fixedTable">
                    <tr>
                        <th>序号</th>
                        <th>单位名称</th>
                        <th>得分</th>
                        <th>排名</th>
                    </tr>
                    <?php for($i=1;$i<=4;$i++) { ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td>LQTJ-1标-中铁十四局-中心试验室</td>
                        <td>100</td>
                        <td>1</td>
                    </tr>
                    <? } ?>
                </table>
            </li>
        </ul>
        <!--月度试验检测统计-->
        <ul class="tensense_home_testMonthly tensense_global">
            <li class="title">
                <i class="iconfont icon-test">&nbsp;月度试验检测统计</i>
            </li>
            <li>
                <table class="fixedTable">
                    <tr>
                        <th>序号</th>
                        <th>单位名称</th>
                        <th>资料数</th>
                    </tr>
                    <?php for($i=1;$i<=4;$i++) { ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td>LQTJ-1标-中铁十四局-中心试验室</td>
                        <td>1</td>
                    </tr>
                    <? } ?>
                </table>
            </li>
        </ul>
    </div>
</div>
<!--尾部内容-->
<?php include 'tensense_footer.php';?>
