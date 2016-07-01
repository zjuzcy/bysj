<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Org\Sms\SmsBao;
class User2ViewController extends Controller{

    public function test(){
        $this->success('hehe');
    }
    public function user2Info(){
        $id=I('post.id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.name,a.introduction,a.logo,a.email,a.place,b.name departname,c.name hos_name
            FROM hos_user2 a,hos_department b,hos_hospital c where
            b.hos_id = c.id AND a.depart_id=b.id AND a.id=".$id);
        $this->ajaxReturn($result);
    }

    public function changeInfo(){
            $Data=D('user2');
            $where = array();
            $r=array();
            $where['id'] = I('post.id');
            $where['introduction'] = I('post.introduction');
            $where['email']    = I('post.email');
            if($Data->create() && $Data->save($where)){
                $r['st']=1;
                $this->ajaxReturn($r);
            }
            else{
                $errors=$Data->getError();
                if($errors=='Email格式错误！') $r['email']=1;
                $this->ajaxReturn($r);
            }
        }
    public function yuyuelist(){
        $doc_id=I('post.doc_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.doc_id,b.name,a.create_time,a.pre_time,a.st1,a.st2,a.isright,a.content,c.nickname FROM hos_yuyue a,hos_user2 b ,hos_user3 c where a.doc_id=b.id AND a.doc_id=".$doc_id." AND a.peo_id=c.username ORDER BY create_time DESC");
        $this->ajaxReturn($result);
    }

    public function set_yuyue(){
        $id=I('post.id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.content,a.pre_time,a.create_time,a.st1,a.st2,a.isright ,b.nickname ,b.email FROM hos_yuyue a,hos_user3 b WHERE a.peo_id=b.username AND a.id=".$id);
        $this->ajaxReturn($result);
    }

    public function agree_yuyue(){

        $id=I('post.id');
        $User = M("yuyue");
        $pre_time = $User->where('id='.$id)->getField('pre_time');
        $username =$User->where('id='.$id)->getField('peo_id');
        $message="您于".$pre_time."的预约已成功，请您届时前来医院。";

        $User2 = M("user3");
        $phonenum = $User2->where("username='".$username."'")->getField('phonenum');


        $sms = new SmsBao("hfut_zcy", "ZCY94712008");//在短信宝注册的账户名和密码
        $str = $sms->sendSms($phonenum, $message);//支持批量发送，多个手机号之间用英文逗号分隔，返回值为数组


        $Model=new Model();
        $result=$Model->query("UPDATE hos_yuyue set isright=1 WHERE id=".$id);
        $this->ajaxReturn($result);
    }

    public function refuse_yuyue(){
        $id=I('post.id');
        $Model=new Model();

        $User = M("yuyue");
        $pre_time = $User->where('id='.$id)->getField('pre_time');
        $username =$User->where('id='.$id)->getField('peo_id');
        $message="您于".$pre_time."的预约被拒绝，非常抱歉。";

        $User2 = M("user3");
        $phonenum = $User2->where("username='".$username."'")->getField('phonenum');


        $sms = new SmsBao("hfut_zcy", "ZCY94712008");//在短信宝注册的账户名和密码
        $str = $sms->sendSms($phonenum, $message);//支持批量发送，多个手机号之间用英文逗号分隔，返回值为数组


        $result=$Model->query("UPDATE hos_yuyue set isright=2 WHERE id=".$id);
        $this->ajaxReturn($result);
    }
    public function liuyanlist(){
        $doc_id=I('post.doc_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.peo_id,a.doc_id,b.nickname,a.create_time,a.st1,a.st2,a.flag,a.content FROM hos_liuyan a,hos_user3 b where a.peo_id=b.username AND doc_id='".$doc_id."' ORDER BY create_time DESC");
        $this->ajaxReturn($result);
    }
    public function readliuyan(){
        $doc_id=I('post.doc_id');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_liuyan set st2=1 WHERE doc_id='".$doc_id."'");
        $this->ajaxReturn($result);
    }
    public function userinfo(){
        $username =I('post.id');
        $Model=new Model();
        $result=$Model->query("SELECT *FROM hos_user3 WHERE username='".$username."'");
        $this->ajaxReturn($result);
    }
    public function liuyan(){
        $Data=D('liuyan');
        $where=array();
        $where['peo_id']=I('post.peo_id');
        $where['doc_id']=I('post.doc_id');
        $where['content']=I('post.content');
        $where['st1']=0;
        $where['st2']=1;
        $where['flag']=1;

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
    public function touxiang(){
        $doc_id=I('post.doc_id');
        $Model=new Model();
        $result=$Model->query("SELECT * FROM hos_user2 WHERE id=".$doc_id);
        $this->ajaxReturn($result);
    }
    public function shangchuan(){
        if (empty($_FILES)) {
            $this->error('必须选择上传文件');
        }
        else {
            $doc_id=session('doc_id');
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg');// 设置附件上传类型
            $upload->rootPath = './Public/images/user2logo';
            $upload->savePath = './'; // 设置附件上传目录
            $upload->autoSub = false;
            $upload->saveName = $doc_id ;
            $upload->replace = true ;
            $info = $upload->upload();

            if (!$info) {// 上传错误提示错误信息
                $this->ajaxReturn(0);
            }
            else {// 上传成功
                $Model=new Model();
                $result=$Model->query("UPDATE hos_user2 SET logo='../../../Public/images/user2logo/".$doc_id.".jpg' WHERE id=".$doc_id);
                $this->ajaxReturn(1);
            }

        }
    }


}