<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：综合管理&nbsp;>&nbsp;设备管理</i>
        </div>
        <!--设备台账-->
        <ul class="tensense_integrated_equipment tensense_global">
            <li class="title">
                <i class="iconfont icon-equipment">&nbsp;设备台账</i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content">
                        <label for="manage_number" class="text_label">管理编号:</label>
                        <input type="text" class="text_input outline" name="manage_number" placeholder="管理编号" id="manage_number">
                    </div>
                    <div class="search_content">
                        <label for="equipment" class="text_label">设备名称:</label>
                        <select name="equipment" id="equipment" class="text_input outline">
                            <option value="0">全部设备</option>
                            <?php foreach ($equipmentList as $value) { ?>
                                <option value="<?=$value['equipment_id']?>"><?=$value['equipment_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="manufacturer" class="text_label">生产厂家:</label>
                        <input type="text" class="text_input outline" name="manufacturer" placeholder="生产厂家" id="manufacturer">
                    </div>
                    <div class="search_content">
                        <label for="model" class="text_label">规格型号:</label>
                        <input type="text" class="text_input outline" name="model" placeholder="规格型号" id="model">
                    </div>
                    <div class="search_content">
                        <label for="verification" class="text_label">检定情况:</label>
                        <select name="verification" id="verification" class="text_input outline">
                            <option value="0">未选择</option>
                            <option value="1">未检定</option>
                            <option value="2">已检定</option>
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
                        <th>标段</th>
                        <th>单位</th>
                        <th>试验室</th>
                        <th>管理编号</th>
                        <th>设备名称</th>
                        <th>生产厂家</th>
                        <th>规格型号</th>
                        <th>数量</th>
                        <th>检定情况</th>
                        <th>上次检验日期</th>
                        <th>预计下次检验日期</th>
                        <th>检定周期</th>
                        <th>查看详细</th>
                    </tr>
                    <?php if (empty($equipmentList)) { ?>
                        <tr>
                            <td colspan="10">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($equipmentList as $equipment) { ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td>4</td>
                                <td>LQTJ-1标-中铁十四局</td>
                                <td>LQTJ-1标-中铁十四局-中心实验室</td>
                                <td><?=$equipment['equipment_num']?></td>
                                <td><?=$equipment['equipment_name']?></td>
                                <td><?=$equipment['equipment_manufacturer']?></td>
                                <td><?=$equipment['equipment_model']?></td>
                                <td><?=$equipment['equipment_amount']?></td>
                                <td><?=$equipment['equipment_test_case'] == 1 ? '<span class="tensense_unfinished">未检定</span>' : '<span class="tensense_finished">已检定</span>'?></td>
                                <td><?=date('Y-m-d H:i:s',$equipment['equipment_dateline_before'])?></td>
                                <td><?=date('Y-m-d H:i:s',$equipment['equipment_dateline_after'])?></td>
                                <td><?=date('d',$equipment['equipment_dateline_after']-$equipment['equipment_dateline_before'])?>天</td>
                                <td>
                                    <a href="javascript:;" class="tensense_operate_btn tensense_view_btn">
                                        <i class="iconfont icon-view"></i>
                                    </a>
                                    <input type="hidden" value="<?=$equipment['equipment_id'] ?>" class="equipmentInfo" name="equipmentInfo">
                                </td>
                            </tr>
                            <? $i++;
                        }
                    } ?>
                </table>
            </li>
        </ul>
    </div>
</div>
<!--尾部内容-->
<?php include 'tensense_footer.php';?>