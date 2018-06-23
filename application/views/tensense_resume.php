<?php require 'tensense_session.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tensense.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/iconfonts/iconfont.css')?>">
    <title>个人履历详细资料</title>
</head>
<body>
    <!--个人详细信息-->
    <div class="personal_details">
        <table class="resume">
            <tr>
                <th colspan="5" class="resume_title">个人详细信息</th>
            </tr>
            <tr>
                <th>姓名：</th>
                <td>007</td>
                <th>性别：</th>
                <td>男</td>
                <td rowspan="4">
                    <img src="./assets/images/logo.jpg" alt="头像" class="resume_img">
                </td>
            </tr>
            <tr>
                <th>年龄：</th>
                <td>24</td>
                <th>身份证号：</th>
                <td>340826199309281055</td>
            </tr>
            <tr>
                <th>联系电话：</th>
                <td>15551201998</td>
                <th>学历：</th>
                <td>本科</td>
            </tr>
            <tr>
                <th>技术职称：</th>
                <td>php工程师</td>
                <th>职务：</th>
                <td>php工程师</td>
            </tr>
            <tr>
                <th>从事本工种年限：</th>
                <td>3</td>
                <th>所学专业：</th>
                <td colspan="3">计算机科学与技术</td>
            </tr>
            <tr>
                <th>毕业时间：</th>
                <td>2017-06</td>
                <th>毕业院校：</th>
                <td colspan="3">安徽工程大学机电学院</td>
            </tr>
        </table>
    </div>
    <div class="work_experience">
        <table class="resume">
            <tr>
                <th colspan="5">工作经历</th>
            </tr>
            <tr>
                <th>年月至年月</th>
                <th colspan="2">参加过的工程项目名称</th>
                <th>担任职务</th>
                <th>备注</th>
            </tr>
            <tr>
                <td>2017-2018</td>
                <td colspan="2">工程检测</td>
                <td>负责人</td>
                <td>即将收尾</td>
            </tr>
        </table>
    </div>
    <div class="trained_experience">
        <table class="resume">
            <tr>
                <th colspan="5">培训经历</th>
            </tr>
            <tr>
                <th>年月至年月</th>
                <th colspan="2">参加过的工程项目名称</th>
                <th>担任职务</th>
                <th>备注</th>
            </tr>
            <tr>
                <td>2017-2018</td>
                <td colspan="2">工程检测</td>
                <td>负责人</td>
                <td>即将收尾</td>
            </tr>
        </table>
    </div>
    <div class="professional_certificate">
        <table class="resume">
            <tr>
                <th colspan="5">专业证书</th>
            </tr>
            <tr>
                <th>年月至年月</th>
                <th colspan="2">参加过的工程项目名称</th>
                <th>担任职务</th>
                <th>备注</th>
            </tr>
            <tr>
                <td>2017-2018</td>
                <td colspan="2">工程检测</td>
                <td>负责人</td>
                <td>即将收尾</td>
            </tr>
        </table>
    </div>
</body>
</html>