<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {

    public function index(){

        $user3=M('User3');
        $hospital=M('Hospital');
        $user2=M('User2');
        $user1=M('User1');
        $user3Count=$user3->count();
        $user2Count=$user2->count();
        $user1Count=$user1->count();

        $count2=$hospital->count();
        $this->assign('count1',$user3Count+$user2Count+$user1Count);
        $this->assign('count2',$count2);
        $this->display();

    }

    public function  mail(){
        if(empty($_POST['name'])  		||
            empty($_POST['email']) 		||
            empty($_POST['message'])	||
        !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            echo "No arguments Provided!";
        }

        $name = $_POST['name'];
        $email_address = $_POST['email'];
        $message = $_POST['message'];

        // Create the email and send the message
        $to = '331674560@qq.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
            $email_subject = "Website Contact Form:  $name";
        $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
        $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address";
        mail($to,$email_subject,$email_body,$headers);

    }
    public function Login3(){
        $this->display();
    }
    public function login2(){
        $this->display();
    }
    public function login1(){
        $this->display();
    }
    public function register(){
        $this->display();
    }
    public function proitm(){
        $Model=new Model();
        $data=$Model->query("select * from hos_hospital");
        $this->ajaxReturn($data);
    }
    public function login3judge(){
        $name=I('post.username');
        $pass=md5(I('post.password'));
        $Data=M('user3');
        $where = array();
        $where['username'] = $name;
        $result = $Data->where($where)->field('username,logo,nickname,phonenum,email,password,stauts,sex,birthday')->find();
        if($result && $result['password']==$pass) {
            if ($result['stauts']==1) {
                $shu['username']=$name;
                $shu['last_login_time']=time();
                $Data->save($shu);
                $this->assign('userinfo',$result);

                $Model=new Model();
                $no_read_yuyue=$Model->query("SELECT COUNT(*) count FROM hos_yuyue WHERE st1=0 AND peo_id='".$name."'");
                $this->assign('count1',$no_read_yuyue);

                $Model2=new Model();
                $no_read_liuyan=$Model2->query("SELECT COUNT(*) count FROM hos_liuyan WHERE st1=0 AND peo_id='".$name."'");
                $this->assign('count2',$no_read_liuyan);
                $this->display('User3View:user3View');
            }
            else
                $this->error('用户被锁定');
        }
        else
            $this->error('用户名或密码错，请重新输入');
    }
    public function login2judge(){
        $name=I('post.username');
        $pass=md5(I('post.password'));
        $Data=M('user2');
        $where = array();
        $where['id'] = $name;
        $result = $Data->where($where)->field('id,name,introduction,create_time,logo,email,stauts,password,place')->find();
        if($result && $result['password']==$pass) {
            if ($result['stauts']==1) {
                $this->assign('userinfo',$result);

                session('doc_id',$name);

                $Model=new Model();
               $no_read_yuyue=$Model->query("SELECT COUNT(*) count FROM hos_yuyue WHERE isright=0 AND doc_id='".$name."'");
               $this->assign('count1',$no_read_yuyue);

                $Model2=new Model();
                $no_read_liuyan=$Model2->query("SELECT COUNT(*) count FROM hos_liuyan WHERE st2=0 AND doc_id='".$name."'");
                $this->assign('count2',$no_read_liuyan);
                $this->display('User2View:user2View');
            }
            else
                $this->error('用户被锁定');
        }
        else
            $this->error('用户名或密码错，请重新输入');
    }

    public function login1judge()
    {
        $name = I('post.username');
        $pass = md5(I('post.password'));
        $Data = M('user1');
        $where = array();
        $where['username'] = $name;
        $result = $Data->where($where)->field('username,password,st,hos_id')->find();
        if ($result && $result['password'] == $pass) {
            if ($result['st'] == 0) {
                $this->display('User1View:adminView');
            }
            else{
                $this->assign('userinfo',$result);
                $this->display('User1View:user1View');
            }

        }
        else{
            $this->error('用户名或密码错，请重新输入');
        }

    }
    public function user3Add()
    {
        $user = D('User3');
        if (IS_POST) {
            if ($user->create($_POST,1)) {
                if($user->add()) {
                    $this->success('新增成功，即将返回登陆页面', 'login3');
                }
                else{
                    $this->error('用户名已存在');
                }

            } else {
                $this->error($user->getError());
            }
        }
    }
}