<?php
    class Tensense extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        /*登录*/
        public function index() {
            $this->load->view('tensense_login');
        }

        /*导航切换*/
        public function nav() {
            $title = $this->uri->segment(3, 0);
            if ($title == FALSE) {
                //公司简介
                $this->load->view('tensense_index');
            } else if ($title == 'home') {
                //首页
                $data = array(
                    'problemTimeList' => $this->tensense_model->getProbTime(),
                    'testTimeList' => $this->tensense_model->getTestTime(),
                );
                $this->load->view('tensense_home',$data);
            } else if ($title == 'test') {
                //试验委托

                $data = array(
                    'projectList' => $this->tensense_model->getProject(),
                    'categoryList' => $this->tensense_model->getProjCategory(),
                    'standardList' => $this->tensense_model->getProjStandard(),
                    'testList' => $this->tensense_model->getTest(),
                );
                $this->load->view('tensense_work_test',$data);
            } else if ($title == 'detn') {
                //检测台账
                $data = array(
                    'projectList' => $this->tensense_model->getProject(),
                    'categoryList' => $this->tensense_model->getProjCategory(),
                    'standardList' => $this->tensense_model->getProjStandard(),
                    'testList' => $this->tensense_model->getTest(),
                );
                $this->load->view('tensense_work_detection',$data);
            } else if ($title == 'apte') {
                //资质管理
                $this->load->view('tensense_integrated_aptitude');
            } else if ($title == 'staf') {
                //人员管理
                $data = array(
                    'memberList' => $this->tensense_model->getMember(),
                    'backgroundList' => $this->tensense_model->getMembBackground(),
                    'positionList' => $this->tensense_model->getMembPosition(),
                    'technologyList' => $this->tensense_model->getMembTechnology(),
                );
                $this->load->view('tensense_integrated_staff',$data);
            } else if ($title == 'eqmt') {
                //设备管理
                $data = array(
                    'equipmentList' => $this->tensense_model->getEquipment(),
                );
                $this->load->view('tensense_integrated_equipment',$data);
            } else if ($title == 'tely') {
                //技术管理
                $data = array(
                    'documentList' => $this->tensense_model->getTechDocument(),
                    'categoryList' => $this->tensense_model->getTechCategory(),
                    'statusList' => $this->tensense_model->getTechStatus(),
                );
                $this->load->view('tensense_integrated_technology',$data);
            } else if ($title == 'prbm') {
                //问题库
                $data = array(
                    'problemList' => $this->tensense_model->getProblem(),
                    'categoryList' => $this->tensense_model->getProbCategory(),
                    'statusList' => $this->tensense_model->getProbStatus(),
                    'levelList' => $this->tensense_model->getProbLevel()
                );
                $this->load->view('tensense_check_problem',$data);
            } else if ($title == 'asmt') {
                //考核库
                $this->load->view('tensense_check_assessment');
            } else if ($title == 'log') {
                //登录日志
                $data = $this->tensense_model->getInfo();
                $this->load->view('tensense_setup_conlog',$data);
            } else if ($title == 'pwd') {
                //修改密码
                $this->load->view('tensense_setup_password');
            } else {
                //回到登录
                $this->load->view('tensense_login');
            }
        }
        
        /*个人详细资料*/
        public function resume() {
            $this->load->view('tensense_resume');
        }
        
        //登录日志
        public function conlog($id = null) {
            $data = $this->tensense_model->getConlog($id);
            $this->load->view('tensense');
        }

        /*修改密码判断*/
        public function password() {
            $username = $_SESSION['username'];
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $bool = $this->tensense_model->getLogin($username);
            $pwd = $this->encryption->decrypt($bool['user_password']);//解密
            if ($old_password == $pwd) {
                if ($new_password != $pwd) {
                    $newPwd = $this->encryption->encrypt($new_password);//加密
                    $result = $this->tensense_model->updatePwd($newPwd, $username);
                    if (!empty($result)) {
                        $this->session->unset_userdata('username');
                        echo json_encode(array('msg' => '3'));/*修改成功*/
                        exit;
                    } else {
                        echo json_encode(array('msg' => '2'));/*修改失败*/
                        exit;
                    }
                } else {
                    echo json_encode(array('msg' => '1'));/*新密码与旧密码相同*/
                    exit;
                }
            } else {
                echo json_encode(array('msg'=>'0'));/*旧密码不正确*/
                exit;
            }
        }

        /*验证码*/
        public function code() {
            $this->load->view('tensense_code');
        }

        /*登录验证*/
        public function login() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $code = $_POST['code'];
            $bool = $this->tensense_model->getLogin($username);
            if (!empty($bool)) {
                $pwd = $this->encryption->decrypt($bool['user_password']);  //解密
                if ($password == $pwd) {
                    if ($code == $_SESSION['code']) {
                        $username = $bool['user_name'];
                        $userId = $bool['user_id'];
                        $userLoginNum = $bool['user_login_num'];
                        $result = $this->tensense_model->updateUser($userId,$userLoginNum);
                        if (!empty($result)) {
                            $this->session->set_userdata('username',$username);
                            echo json_encode(array('msg'=>'4'));  //登录成功
                            exit;
                        } else {
                            echo json_encode(array('msg'=>'3'));  //登录失败
                            exit;
                        }
                    } else {
                        echo json_encode(array('msg'=>'2'));/*验证码错误*/
                        exit;
                    }
                } else {
                    echo json_encode(array('msg'=>'1'));/*密码错误*/
                    exit;
                }
            } else {
                echo json_encode(array('msg'=>'0'));/*用户名不存在*/
                exit;
            }
        }

        /*注销登录*/
        public function logout() {
            $username = $_SESSION['username'];
            $result = $this->tensense_model->getOutTime($username);
            if (!empty($result)){
                $this->session->unset_userdata('username');
                echo json_encode(array('msg'=>'1'));/*注销成功*/
                exit;
            } else {
                echo json_encode(array('msg'=>'0'));/*注销失败*/
                exit;
            }
        }

        //人员删除
        public function memberDelete() {
            $id = $_POST['memberInfo'];
            $bool = $this->tensense_model->getMemberDelete($id);
            if (!empty($bool)) {
                echo json_encode(array('msg'=>'1'));/*删除成功*/
                exit;
            } else {
                echo json_encode(array('msg'=>'0'));/*失败*/
                exit;
            }
        }
    }
?>