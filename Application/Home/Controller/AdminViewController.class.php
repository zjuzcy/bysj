<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class AdminViewController extends Controller {
    public function userManage(){
        $Model=new Model();
        $result=$Model->query("SELECT *FROM hos_user3");
        $this->ajaxReturn($result);
    }

    public function stopUser(){
        $id=I('post.username');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_user3 set stauts=0 WHERE username='".$id."'");
        $this->ajaxReturn($result);
    }
    public function startUser(){
        $id=I('post.username');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_user3 set stauts=1 WHERE username='".$id."'");
        $this->ajaxReturn($result);
    }

    public function search_user(){
        $id=I('post.name');
        $Model=new Model();
        $result=$Model->query("SELECT *FROM hos_user3 WHERE nickname LIKE '%".$id."%'");
        $this->ajaxReturn($result);
    }

    public function hos_ma(){
        $Model=new Model();
        $result=$Model->query("select * FROM hos_hospital");
        $this->ajaxReturn($result);
    }

    public function hos_info(){
        $hos_id=I('post.hos_id');
        $Model=new Model();
        $result=$Model->query("SELECT *FROM hos_hospital WHERE id=".$hos_id);
        $this->ajaxReturn($result);
    }

    public function add_Admin()
    {
        $user = D('User1');
        $hos_id = I('post.hos_id');
        $data = array();
        $data['hos_id'] = $hos_id;
        $data['password'] = I('post.password');
        $data['username']=I('post.username');
        $data['st']=1;
        if ($user->create($data)) {
            if($user->add()){
                $this->ajaxReturn(1);
            }
            else {
                $this->ajaxReturn(-1);
            }

        }
        else
            $this->ajaxReturn(0);
    }


    public function go_add_Admin(){
        $Data=D('hospital');
        $where=array();
        $where['name']=I('post.name');
        $where['LEVEL']=I('post.level');
        $where['hos_zhongorxi']=I('post.hos_zhongorxi');
        if($Data->create($where)){
            if($Data->add()){
                $this->ajaxReturn(1);
            }
            else{
                $this->ajaxReturn(0);
            }
        }

        else{
            $this->ajaxReturn($Data->getError());
        }
    }

    function ma_info(){
        $Model=new Model();
        $result=$Model->query("SELECT a.st,a.username,a.`password`,a.create_time,b.`name` FROM hos_user1 a,hos_hospital b WHERE a.hos_id=b.id");
        $this->ajaxReturn($result);
    }

    function go_change_hos_info(){

        $Data=D('hospital');
        $where = array();
        $where['id'] = I('post.id');
        $where['adress'] = I('post.adress');
        $where['info']    = I('post.info');
        if($Data->create() && $Data->save($where)){
            $this->ajaxReturn(1);
        }
        else{
            $this->ajaxReturn(0);
        }

    }

    function depart_ma(){
        $hos_id=I('post.hos_id');
        $Model=new Model();
        $result=$Model->query("SELECT * FROM hos_department WHERE hos_id=".$hos_id);
        $this->ajaxReturn($result);
    }

    function get_depart_info(){
        $depart_id=I('post.depart_id');
        $Model=new Model();
        $result=$Model->query("SELECT * FROM hos_department WHERE id=".$depart_id);
        $this->ajaxReturn($result);
    }

    function go_change_depart_info(){
        $Data=D('department');
        $where = array();
        $where['id'] = I('post.id');
        $where['content'] = I('post.content');
        if($Data->create() && $Data->save($where)){
            $this->ajaxReturn(1);
        }
        else{
            $this->ajaxReturn(0);
        }
    }

    function go_Add_department(){
        $Form   =   D('department');
        $data['name']  =I('post.name');
        $data['category']  =I('post.category');
        $data['hos_id']  =I('post.hos_id');
        $Form->create($data,1);
        $Form->add();
        $this->ajaxReturn(1);
    }

    function go_Add_doctor(){

        $Form   =   D('user2');
        $data['name']  =I('post.name');
        $data['depart_id']  =I('post.depart_id');
        $data['password']  =I('post.password');
        $data['place']  =I('post.place');
        $Form->create($data,1);
        $Form->add();
        $this->ajaxReturn(1);

    }

    function doctor_ma(){
        $hos_id=I('post.hos_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.create_time,a.`name`,a.`password`,a.place,a.stauts,b.`name` departname FROM hos_user2 a,hos_department b WHERE a.depart_id=b.id AND b.hos_id=".$hos_id);
        $this->ajaxReturn($result);
    }


    function change_doctor_A(){
        $id=I('post.id');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_user2 set stauts=1 WHERE id='".$id."'");
        $this->ajaxReturn($result);
    }

    function change_doctor_B(){
        $id=I('post.id');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_user2 set stauts=0 WHERE id='".$id."'");
        $this->ajaxReturn($result);
    }

    function Add_logo(){
        $id=I('post.hos_id');
        session('hos_id',$id);
        $Model=new Model();
        $result=$Model->query("SELECT * FROM hos_hospital WHERE id=".$id);
        $this->ajaxReturn($result);
    }

    function shangchuan(){
        if (empty($_FILES)) {
            $this->error('必须选择上传文件');
        }
        else {
            $hos_id=session('hos_id');
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg');// 设置附件上传类型
            $upload->rootPath = './Public/proImages/hos_images';
            $upload->savePath = './'; // 设置附件上传目录
            $upload->autoSub = false;
            $upload->saveName = "0".$hos_id ;
            $upload->replace = true ;
            $info = $upload->upload();

            if (!$info) {// 上传错误提示错误信息
                $this->ajaxReturn(0);
            }
            else {// 上传成功
                $Model=new Model();
                $Model->query("UPDATE hos_hospital SET src='../../../Public/proImages/hos_images/0".$hos_id.".jpg' WHERE id=".$hos_id);
                $this->ajaxReturn(1);
            }

        }
    }

}