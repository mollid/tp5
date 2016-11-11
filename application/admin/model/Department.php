<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Department extends Model{
    function getDepartment(){
      $rows = Db::table("admingroup")->select();
      $total = 0;
      $count = 0;
      return ['rows'=>$rows,"total"=>$total,"count"=>$count];
    }
}