<?php
namespace app\admin\controller;
//use extend\CRUD;

class Auth extends Base{
    public function Department(){
        $b = new \CRUD\Table();
        $b->set_table("sss");
        echo $b->get_table();
//        return $this->fetch();
    }

    public function GetDepartment(){
        $DepartModel = model("department");
        return $DepartModel->getDepartment();
    }
}

?>