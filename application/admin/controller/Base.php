<?php
/**
 * Created by PhpStorm.
 * User: omc
 * Date: 2016/11/3
 * Time: 11:01
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;

class Base extends controller{
    public $admin_info;
    function _initialize()
    {
        parent::_initialize();
        $admin_seesion = input("session.admin_session");
        if(!$admin_seesion){
            $this->redirect('Login/index');
        }else{
            $info = explode("-",$admin_seesion);
            $admin = model("admin");
            $map['Uid'] = $info[0];
            $map['Password'] = md5($info[1]);
            $admin_info = $admin->where($map)->find();
            if($admin_info){
                if($admin_info['Status']){
                    $this->redirect('Login/index',['error'=>4]);
                }
                $this->admin_info = $admin_info;
                $this->assign("AdminInfo",$admin_info);
            }else{
                $this->redirect('Login/index');
            }
        }
        $this->webConfig();
    }

    function webConfig(){
        $webConf = Db::table("basicsetting")->find(1);
        $this->assign("webconf",$webConf);
        return $webConf;
    }
}