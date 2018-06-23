<!--头部内容-->
<?php include 'tensense_header.php';?>
<!--身体内容-->
<div class="main clearfix">
    <?php include 'tensense_nav.php';?>
    <div class="main_info">
        <div class="tensense_position">
            <i class="iconfont icon-home">&nbsp;我的位置：综合管理&nbsp;>&nbsp;技术管理</i>
        </div>
        <!--技术管理台账-->
        <ul class="tensense_integrated_technology tensense_global">
            <li class="title">
                <i class="iconfont icon-technology">&nbsp;技术管理台账</i>
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
                        <label for="document" class="text_label">文档类型:</label>
                        <select name="document" id="document" class="text_input outline">
                            <option value="0">所有类型</option>
                            <?php foreach ($categoryList as $value) { ?>
                                <option value="<?=$value['category_id']?>"><?=$value['category_name']?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="search_content">
                        <label for="text_number" class="text_label">文件编号:</label>
                        <input type="text" class="text_input outline" name="text_number" placeholder="文件编号" id="text_number">
                    </div>
                    <div class="search_content">
                        <label for="text" class="text_label">文件名称:</label>
                        <input type="text" class="text_input outline" name="text" placeholder="文件编号" id="text_number">
                    </div>
                    <div class="search_content">
                        <label for="keyword" class="text_label">关键字 :</label>
                        <input type="text" class="text_input outline" name="keyword_number" placeholder="关键字" id="keyword">
                    </div>
                    <div class="search_content">
                        <label for="controlled" class="text_label">受控状态:</label>
                        <select name="controlled" id="controlled" class="text_input outline">
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
                        <th>机构名称</th>
                        <th>文件编号</th>
                        <th>文件名称</th>
                        <th>文件分类</th>
                        <th>受控状态</th>
                        <th>修订时间</th>
                        <th>关键字</th>
                        <th>版本号</th>
                        <th>文件下载</th>
                    </tr>
                    <?php if (empty($documentList)) { ?>
                        <tr>
                            <td colspan="10">暂无数据</td>
                        </tr>
                    <? } else {
                        $i = 1;
                        foreach ($documentList as $document) { ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$document['document_institution'];?></td>
                                <td><?=$document['document_num'];?></td>
                                <td><?=$document['document_name'];?></td>
                                <td><?=$document['category_name'];?></td>
                                <td><?=$document['status_name'];?></td>
                                <td><?=date('Y-m-d H:i:s',$document['document_revise_dateline']);?></td>
                                <td><?=$document['document_keyword'];?></td>
                                <td><?=$document['document_version_num'];?></td>
                                <td>
                                    <a href="javascript:;" class="tensense_operate_btn tensense_download_btn">
                                        <i class="iconfont icon-download"></i>
                                    </a>
                                    <input type="hidden" value="<?= $document['document_download_address']?>"
                                           class="documentInfo" name="documentInfo">
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