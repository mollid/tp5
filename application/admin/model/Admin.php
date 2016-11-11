<?php
/**
 * Created by PhpStorm.
 * User: omc
 * Date: 2016/11/3
 * Time: 15:46
 */
namespace app\admin\model;

use think\Model;

class Admin extends Model{
//    protected $table = 'admin';
    function FindAdminByID($id){
        $info = $this->find($id);
        if($info){
            return $info;
        }else{
            return false;
        }
    }
    function FindAdminByName($username){
        $info = $this->where('UserName',$username)->find();
        if($info){
            return $info;
        }else{
            return false;
        }
    }
}