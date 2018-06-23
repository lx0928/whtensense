<?php
    class Tensense_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        /*查询用户信息*/
        public function getLogin($username) {
            $result = $this->db->select('user_id, user_name, user_password, user_login_num')
                ->from('tensense_user')
                ->where('user_name',$username)
                ->get()
                ->row_array();
            return $result;
        }

        /*修改密码*/
        public function updatePwd($newPwd,$username) {
            $data = array('user_password'=>$newPwd);//更新数据
            $where = array('user_name'=>$username);//满足条件
            return $this->db->update('tensense_user', $data, $where);
        }

        /*更新用户信息*/
        public function updateUser($userId,$userLoginNum) {
            $loginTime = time();
            $loginIp = $this->getIP();
            $data = array('user_login_dateline'=>$loginTime,'user_login_ip'=>$loginIp,'user_login_num'=>$userLoginNum+1);
            $where = array('user_id'=>$userId);
            return $this->db->update('tensense_user', $data, $where);
        }

        //更新注销时间
        public function getOutTime($username) {
           $logoutTime = time();
           $data = array('user_logout_dateline'=>$logoutTime);
           $where = array('user_name'=>$username);
           return $this->db->update('tensense_user', $data, $where);
        }

        //获取信息
        public function getInfo() {
            $result = array(
                'loginList' => $this->db->select('user_id, user_name, user_login_num')
                    ->from('tensense_user')
                    ->order_by('user_id ASC')
                    ->limit(5)
                    ->get()
                    ->result_array(),
            );
            return $result;
        }

        //获取搜索信息
        public function getSearchInfo($username) {
            $result = array(
                'loginInfo' => $this->db->select('user_id, user_name, user_login_num')
                    ->from('tensense_user')
                    ->where('user_name',$username)
                    ->get()
                    ->row_array(),
            );
            return $result;
        }

        //不同环境下获取真实的IP
        public function getIp(){
            if (isset($_SERVER)) {
                if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $realIp = $_SERVER['HTTP_CLIENT_IP'];
                } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $realIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $realIp = $_SERVER['REMOTE_ADDR'];
                }
            } else {
                if (getenv('HTTP_CLIENT_IP')) {
                    $realIp = getenv('HTTP_CLIENT_IP');
                } else if (getenv('HTTP_X_FORWARDED_FOR')) {
                    $realIp = getenv('HTTP_X_FORWARDED_FOR');
                } else {
                    $realIp = getenv('REMOTE_ADDR');
                }
            }
            if (strcmp('::1', $realIp) == 0 || !$realIp) {
                $realIp = '127.0.0.1';
            }
            return $realIp;
        }

        //获得登录日志
        public function getConlog($id) {
            $result = array(
                'conlogInfo' => $this->db->select('tc.conlog_id, tc.conlog_action, tc.conlog_action_detail, tc.conlog_in_time, tu.user_name, tu.user_login_dateline, tu.user_logout_dateline, tu.user_login_ip')
                ->from('tensense_conlog as tc')
                ->join('tensense_user as tu','tu.user_id = tc.user_id')
                ->order_by('tc.user_id ASC')
                ->get()
                ->result_array(),
            );
            return $result;
        }

        //获取试验项目
        public function getProject() {
            return $this->db->select('project_id, project_name')
                ->from('tensense_project')
                ->order_by('project_id ASC')
                ->get()
                ->result_array();
        }
        //获取试验类型
        public function getProjCategory() {
            return $this->db->select('category_id, category_name')
                ->from('tensense_project_category')
                ->order_by('category_id ASC')
                ->get()
                ->result_array();
        }
        //获取试验标准
        public function getProjStandard() {
            return $this->db->select('standard_id, standard_name')
                ->from('tensense_project_standard')
                ->order_by('standard_id ASC')
                ->get()
                ->result_array();
        }
        //获取人员
        public function getMember() {
            return $this->db->select('tm.member_id, tm.member_name, tm.member_sex, tm.member_mobile, tm.member_email, tm.member_age, tm.member_work_year, tm.member_school, tm.member_major, tm.member_company, ts.section_name, ts.section_unit, ts.section_laboratory, tb.background_name, tp.position_name, tt.technology_name')
                ->from('tensense_member as tm')
                ->join('tensense_member_background as tb','tb.background_id = tm.background_id')
                ->join('tensense_member_position as tp','tp.position_id = tm.position_id')
                ->join('tensense_member_technology as tt','tt.technology_id = tm.technology_id')
                ->join('tensense_section as ts','ts.section_id = tm.section_id')
                ->order_by('tm.member_id ASC')
                ->get()
                ->result_array();
        }
        //获取人员学历
        public function getMembBackground() {
            return $this->db->select('background_id, background_name')
                ->from('tensense_member_background')
                ->order_by('background_id ASC')
                ->get()
                ->result_array();
        }
        //获取人员职务
        public function getMembPosition() {
            return $this->db->select('position_id, position_name')
                ->from('tensense_member_position')
                ->order_by('position_id ASC')
                ->get()
                ->result_array();
        }
        //获取人员技术职称
        public function getMembTechnology() {
            return $this->db->select('technology_id, technology_name')
                ->from('tensense_member_technology')
                ->order_by('technology_id ASC')
                ->get()
                ->result_array();
        }
        //获取问题
        public function getProblem() {
            return $this->db->select('tp.problem_id, tp.problem_num, tp.problem_dateline, tp.problem_source, tp.problem_description, tp.problem_confirm, tp.problem_rect_results, tp.problem_rect_confirm, tp.problem_logout, tp.problem_buckle_score, tc.category_name, ts.status_name, se.section_name, se.section_unit, se.section_laboratory, se.section_header_unit, se.section_header, tl.level_name')
                ->from('tensense_problem as tp')
                ->join('tensense_problem_category as tc','tc.category_id = tp.category_id')
                ->join('tensense_problem_status as ts','ts.status_id = tp.status_id')
                ->join('tensense_section as se','se.section_id = tp.section_id')
                ->join('tensense_problem_level as tl','tl.level_id = tp.level_id')
                ->order_by('tp.problem_id ASC')
                ->get()
                ->result_array();
        }
        //获取时间限制下的问题
        public function getProbTime() {
            $now = date('Y-m-d',time());
            $time = strtotime($now) - 3600*24*3;
            return $this->db->select('tp.problem_id, tp.problem_num, tp.problem_dateline, tp.problem_source, tp.problem_description, tp.problem_confirm, tp.problem_rect_results, tp.problem_rect_confirm, tp.problem_logout, tp.problem_buckle_score, tc.category_name, ts.status_name, se.section_name, se.section_unit, se.section_laboratory, se.section_header_unit, se.section_header, tl.level_name')
                ->from('tensense_problem as tp')
                ->join('tensense_problem_category as tc','tc.category_id = tp.category_id')
                ->join('tensense_problem_status as ts','ts.status_id = tp.status_id')
                ->join('tensense_section as se','se.section_id = tp.section_id')
                ->join('tensense_problem_level as tl','tl.level_id = tp.level_id')
                ->where('tp.problem_dateline >=',$time)
                ->order_by('tp.problem_id ASC')
                ->get()
                ->result_array();
        }
        //获取问题类型
        public function getProbCategory() {
            return $this->db->select('category_id, category_name')
                ->from('tensense_problem_category')
                ->order_by('category_id ASC')
                ->get()
                ->result_array();
        }
        //获取问题状态
        public function getProbStatus() {
            return $this->db->select('status_id, status_name')
                ->from('tensense_problem_status')
                ->order_by('status_id ASC')
                ->get()
                ->result_array();
        }
        //获取问题级别
        public function getProbLevel() {
            return $this->db->select('level_id, level_name')
                ->from('tensense_problem_level')
                ->order_by('level_id ASC')
                ->get()
                ->result_array();
        }
        //人员删除操作
        public function getMemberDelete($id = null) {
             return $this->db->delete('tensense_member', array('member_id' => $id));
        }
        //获取试验信息
        public function getTest() {
            return $this->db->select('tt.test_id, tt.test_engineer_info, tt.test_detect_info, tt.test_report_dateline, tt.test_report_num, tt.test_approval_dateline, tt.is_receive, tt.test_laboratory, tp.project_name, te.entrust_num, te.entrust_dateline, te.entrust_agency, te.trustee_agency, tc.category_name, ts.standard_name')
                ->from('tensense_project_test as tt')
                ->join('tensense_project as tp','tp.project_id = tt.project_id')
                ->join('tensense_project_entrust as te','te.entrust_id = tt.entrust_id')
                ->join('tensense_project_category as tc','tc.category_id = tt.category_id')
                ->join('tensense_project_standard as ts','ts.standard_id = tt.standard_id')
                ->order_by('tt.test_id ASC')
                ->get()
                ->result_array();
        }
        //获取时间限制下的试验
        public function getTestTime() {
            $now = date('Y-m-d',time());
            $time = strtotime($now) - 3600*24*3;
            return $this->db->select('tt.test_id, tt.test_engineer_info, tt.test_detect_info, tt.test_report_dateline, tt.test_report_num, tt.test_approval_dateline, tt.is_receive, tt.test_laboratory, tp.project_name, te.entrust_num, te.entrust_dateline, te.entrust_agency, te.trustee_agency, tc.category_name, ts.standard_name')
                ->from('tensense_project_test as tt')
                ->join('tensense_project as tp','tp.project_id = tt.project_id')
                ->join('tensense_project_entrust as te','te.entrust_id = tt.entrust_id')
                ->join('tensense_project_category as tc','tc.category_id = tt.category_id')
                ->join('tensense_project_standard as ts','ts.standard_id = tt.standard_id')
                ->where('tt.test_report_dateline >=',$time)
                ->order_by('tt.test_id ASC')
                ->get()
                ->result_array();
        }
        //获取设备信息
        public function getEquipment() {
            return $this->db->select('te.equipment_id, te.equipment_name, te.equipment_model, te.equipment_num, te.equipment_manufacturer, te.equipment_amount, te.equipment_test_case, te.equipment_dateline_before, te.equipment_dateline_after')
                ->from('tensense_equipment as te')
                ->order_by('te.equipment_id ASC')
                ->get()
                ->result_array();
        }
        //获取技术文件信息
        public function getTechDocument() {
            return $this->db->select('td.document_id, td.document_name, td.document_num, td.document_revise_dateline, td.document_keyword, td.document_version_num, td.document_download_address, td.document_institution, tc.category_name, ts.status_name')
                ->from('tensense_technology_document as td')
                ->join('tensense_technology_category as tc','tc.category_id = td.category_id')
                ->join('tensense_technology_status as ts','ts.status_id = td.status_id')
                ->order_by('td.document_id ASC')
                ->get()
                ->result_array();
        }
        //获取技术文件类型
        public function getTechCategory() {
            return $this->db->select('category_id, category_name')
                ->from('tensense_technology_category')
                ->order_by('category_id ASC')
                ->get()
                ->result_array();
        }
        //获取技术文件受控状态
        public function getTechStatus() {
            return $this->db->select('status_id, status_name')
                ->from('tensense_technology_status')
                ->order_by('status_id ASC')
                ->get()
                ->result_array();
        }
    }
?>