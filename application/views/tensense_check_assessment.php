<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：考核管理&nbsp;>&nbsp;考核排名</i>
        </div>
        <!--考核排名-->
        <ul class="tensense_check_assessment tensense_global">
            <li class="title">
                <i class="iconfont icon-warehouse">&nbsp;考核排名（
                    <span class="tensense_home_time">按照已确认问题扣分排名</span>
                    ）
                </i>
            </li>
            <li>
                <form action="" method="post" class="search_form">
                    <div class="search_content search_time">
                        <label for="time" class="text_label">时间范围:</label>
                        <input type="text" class="text_input time_input_begin outline" name="time" readonly="readonly" placeholder="开始时间" id="time_begin">
                        <i class="iconfont icon_time_begin icon-calendar"></i>
                        <span>-</span>
                        <input type="text" class="text_input time_input_end outline" readonly="readonly" placeholder="结束时间" id="time_end">
                        <i class="iconfont icon_time_end icon-calendar"></i>
                    </div>
                    <div class="search_content">
                        <label for="project_line" class="text_label">项目线路:</label>
                        <input type="text" class="text_input outline" name="project_line" placeholder="项目线路" id="project_line">
                    </div>
                    <div class="search_content">
                        <label for="project_line" class="text_label">项目线路:</label>
                        <select name="project_line" id="project_line" class="text_input outline">
                            <option value="0">全部</option>
                            <option value="">鲁南高速铁路</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="construction_unit" class="text_label">建设单位:</label>
                        <select name="construction_unit" id="construction_unit" class="text_input outline">
                            <option value="0">全部</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="unit_type" class="text_label">单位类型:</label>
                        <select name="unit_type" id="unit_type" class="text_input outline">
                            <option value="0">全部</option>
                            <option value="">施工单位</option>
                            <option value="">监理单位</option>
                            <option value="">第三方单位</option>
                        </select>
                    </div>
                    <div class="search_content">
                        <input type="radio" class="text_input" id="laboratory_rank" name="rank" checked="checked">
                        <label for="laboratory_rank" class="text_label radio_label">试验室排名</label>
                        <input type="radio" class="text_input" id="unit_rank" name="rank">
                        <label for="unit_rank" class="text_label radio_label">单位排名</label>
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
                        <th>单位名称</th>
                        <th>问题总数</th>
                        <th>扣分总数</th>
                        <th>已确认问题数</th>
                        <th>已确认问题扣分</th>
                        <th>已处理问题数</th>
                        <th>已处理问题扣分</th>
                        <th>得分</th>
                        <th>排名</th>
                    </tr>
                    <?php for($i=1;$i<=8;$i++) { ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td>中铁十四局</td>
                            <td>21</td>
                            <td>12</td>
                            <td>8</td>
                            <td>5</td>
                            <td>13</td>
                            <td>7</td>
                            <td>88</td>
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