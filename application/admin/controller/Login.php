<?php
/**
 * Created by PhpStorm.
 * User: omc
 * Date: 2016/11/3
 * Time: 11:00
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class login extends Controller{
    public function index(){
        $error = Request::instance()->param("error");
        if($error){
            switch($error){
                case 1:
                    $info = "用户不存在";
                    break;
                case 2:
                    $info = "账号或密码错误";
                    break;
                case 3:
                    $info = "您的账号暂时无法登录";
                    break;
                case 4:
                    $info = "您的账号无权限访问";
                    break;
                default:
                    $info = "请稍后重试";
                    break;
            }
            $this->assign("info",$info);
        }

        return $this->fetch();
    }

    /**
     * 2016年11月3日16:25:17
     * 用户登录 暂时做管理员登录 还有 供应商各种角色
     */
    public function check_user(){
        $username = input("post.username");
        $password = input("post.password");

        $admin = model("admin");
        $check_isset_admin = $admin::get(['UserName'=>$username]);
        if(!$check_isset_admin){
            $this->redirect('login/index', ['error' => 1]);
        }else{
            $map['UserName'] = $username;
            $map['Password'] = md5($password);
            $check_admin = $admin->where($map)->find();
            if(!$check_admin){
                $this->redirect('login/index', ['error' => 2]);
            }else{
                if($check_admin['Status'] == 1){
                    $this->redirect('login/index', ['error' => 4]);
                }
                if($check_admin['IsDel'] == 1){
                    $this->redirect('login/index', ['error' => 3]);
                }
                Session::set('admin_session',$check_admin['Uid']."-".$password);
                $this->redirect('Index/index');
            }
        }

    }

    /**
     * 2016年11月9日10:13:09
     * 登出
     */
    function logout(){
        Session::delete('admin_session');
        $this->redirect("Login/index");
    }
}