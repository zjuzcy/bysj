<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class User3ViewController extends Controller{
    public function user3View()
    {
        $Data=D('user3');
        $where = array();
        $r=array();
        $where['username'] = I('post.username');
        $where['nickname'] = I('post.nickname');
        $where['email']    = I('post.email');
        $where['birthday'] = I('post.birthday');
        $where['sex']      = I('post.sex');
        $where['phonenum'] = I('post.phonenum');
        if($Data->create() && $Data->save($where)){
            $r['st']=1;
            $this->ajaxReturn($r);
        }
        else{
            $errors=$Data->getError();
//            $r['nickname'] = $errors['nickname'];
//            $r['email']    = $errors['email'];
//            $r['birthday'] = $errors['birthday'];
//            $r['sex']      = $errors['sex'];
//            $r['phonenum'] = $errors['phonenum'];
            if($errors=='Email格式错误！') $r['email']=1;
            if($errors=='请不要篡改性别') $r['sex']=1;
            if($errors=='生日超出可能范围') $r['birthday']=1;
            if($errors=='请输入正确的手机号码') $r['phonenum']=1;
            $this->ajaxReturn($r);
        }
    }
    public function user3Info(){
        $username=I('post.username');
        $Data=M('user3');
        $where = array();
        $where['username'] = $username;
        $result = $Data->where($where)->field('username,logo,nickname,phonenum,email,password,stauts,sex,birthday')->find();
        $this->ajaxReturn($result);
    }
    public function hosInfo(){
        $Model = new Model();// 实例化一个model对象 没有对应任何数据表
        $result =$Model->query("select * from hos_hospital");
        $this->ajaxReturn($result);
    }
    public function officeInfo(){
        $id=I('post.hos_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.name,a.category,a.content,a.hos_id,b.name hos_name FROM hos_department a,hos_hospital b where
a.hos_id = b.id AND b.id=".$id);

        $this->ajaxReturn($result);
    }
    public function officeInfo2(){
        $part_id=I('post.depart_id');
        $Model=new Model();
        $result=$Model->query("SELECT *FROM hos_user2 WHERE stauts=1 AND depart_id=".$part_id);
        $this->ajaxReturn($result);
    }
    public function doctorInfo(){
        $id=I('post.id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.name,a.introduction,a.logo,a.email,a.place,b.name departname,c.name hos_name
            FROM hos_user2 a,hos_department b,hos_hospital c where
            b.hos_id = c.id AND a.depart_id=b.id AND a.id=".$id);
        $this->ajaxReturn($result);
    }
    public function yuyue(){
        $Data=D('yuyue');
        $peo_id=I('post.peo_id');
        $doc_id=I('post.doc_id');
        $pre_time=I('post.pre_time');
        $content=I('post.content');
        $where = array();
        $where['peo_id']=$peo_id;
        $where['doc_id']=$doc_id;
        $where['pre_time']=$pre_time;
        $where['content']=$content;
        if($Data->create($where)){
            if($Data->add()){
                $this->ajaxReturn(1);
            }
            else{
                $this->ajaxReturn($peo_id." ".$doc_id." ".$pre_time." ".$content);
            }
        }

        else{
            $this->ajaxReturn($Data->getError());
        }

    }
    public function liuyan(){
        $Data=D('liuyan');
        $where=array();
        $where['peo_id']=I('post.peo_id');
        $where['doc_id']=I('post.doc_id');
        $where['content']=I('post.content');
        $where['st1']=1;
        $where['st2']=0;
        $where['flag']=0;

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
    public function yuyuelist(){
        $peo_id=I('post.peo_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.doc_id,b.name,a.create_time,a.pre_time,a.st1,a.st2,a.isright,a.content FROM hos_yuyue a,hos_user2 b where a.doc_id=b.id AND peo_id='".$peo_id."' ORDER BY create_time DESC");
        $this->ajaxReturn($result);
    }
    public function readyuyue(){
        $peo_id=I('post.peo_id');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_yuyue set st1=1 WHERE peo_id='".$peo_id."'");
        $this->ajaxReturn($result);
    }
    public function liuyanlist(){
        $peo_id=I('post.peo_id');
        $Model=new Model();
        $result=$Model->query("SELECT a.id,a.doc_id,b.name,a.create_time,a.st1,a.st2,a.flag,a.content FROM hos_liuyan a,hos_user2 b where a.doc_id=b.id AND peo_id='".$peo_id."' ORDER BY create_time DESC");
        $this->ajaxReturn($result);
    }
    public function readliuyan(){
        $peo_id=I('post.peo_id');
        $Model=new Model();
        $result=$Model->query("UPDATE hos_liuyan set st1=1 WHERE peo_id='".$peo_id."'");
        $this->ajaxReturn($result);
    }

    public function no_read_yuyue(){
        $peo_id=I('post.peo_id');
        $Model=new Model();
        $result=$Model->query("SELECT COUNT(*) count  FROM hos_yuyue WHERE st1=0 AND peo_id='".$peo_id."'");
        $this->ajaxReturn($result);
    }

}