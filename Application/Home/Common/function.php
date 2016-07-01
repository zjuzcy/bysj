<?php
/**************
 * 发送单条飞信信息 *
$myphone 是发送的手机号码，也就是说，使用什么手机号码发送
$myphonepass是飞信密码
$cellphone 是发送给哪个手机号码
$sendcontent是发送的内容
 *************/
function SendFetion($myphone,$myphonepass,$cellphone,$sendcontent){

    import("lib.PHPFetion");

    //包含飞信接口的类
    vendor('Fetion.class#fetion');

    if(empty($cellphone)){
        return '手机号码不能为空！';
    }
    if(empty($sendcontent)){
        return '短信内容不能为空！';
    }
    if(empty($myphone)){
        return '发送的手机不能为空！';
    }

    if(empty($myphonepass)){
        return '发送的手机的密码不能为空！';
    }

    $fetion = new PHPFetion($myphone, $myphonepass); // 手机号、飞信密码
    $res=$fetion->send($cellphone, $sendcontent); // 接收人手机号、飞信内容
}
