<?php
namespace app\admin\model;

use think\Db;
use think\Model;
use think\Session;

class System extends Model
{
    function LoadSetting(){
        $res = Db::table("basicsetting")->find(1);
        return $res;
    }

    function SaveSetting(){
       return Db::table("basicsetting")->where('BSid',1)->update($_POST);
    }

    function GetPaySetting(){
        $res = Db::table("paymentsetting")->find(1);
        return $res;
    }

    function SavePaySetting(){
        $data = [
          "OpenPayMent" => input("post.OpenPayMent"),
          "OpenBalance" => input("post.OpenBalance"),
          "OpenCash" => input("post.OpenCash"),
          "OpenCashMinMoney" => input("post.OpenCashMinMoney"),
          "PaySuccessEmail" => input("post.PaySuccessEmail"),
          "PaySuccessEmailTemp" => input("post.PaySuccessEmailTemp"),
          "PaySuccessSMS" => input("post.PaySuccessSMS"),
          "PaySuccessSMSTemp" => input("post.PaySuccessSMSTemp"),
        ];
       return Db::table("paymentsetting")->where('SiteKey',1)->update($data);
    }
}
?>