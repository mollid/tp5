<?php
namespace app\admin\controller;

class Admin extends Base{
    public function UserInfoSetting(){
        if(request()->isPost()){
            $AdminModel = model("admin");
            $saved = [
                        "TrueName"=>input("post.TrueName"),
                        "Tel"=>input("post.Tel"),
                        "Status"=>input("post.Status"),
                        "Remark"=>input("post.Remark"),
                    ];
            $psd = input("post.PassWord");
            if(!empty($psd)){
                $saved['PassWord'] = md5($psd);
            }
            $AdminModel->save($saved,["Uid"=>$this->admin_info['Uid']]);
        }
        return $this->fetch();
    }
}

?>