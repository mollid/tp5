<?php
namespace app\admin\controller;

class System extends Base{
    public function WebSetting(){
        $_system = model("System");
        if(request()->isPost()){
            $res = $_system->SaveSetting();
        }
        $row = $_system->LoadSetting();
        $this->assign("row",$row);
        return $this->fetch();
    }

    public function PaySetting(){
        $PaySettingModel = model("System");
        if(request()->isPost()){
            $PaySettingModel->SavePaySetting();
            $ReturnMsg = ["error"=>1,"msg"=>"保存成功"];
            $this->assign("ReturnMsg",$ReturnMsg);
        }
        $PaySetting = $PaySettingModel->GetPaySetting();
        $this->assign("PaySetting",$PaySetting);
        return $this->fetch();
    }
}

?>