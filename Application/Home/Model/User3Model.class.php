<?php

/**
* 数据表User3模型，用于存储患者用户基本数据
 * username-->用户名
 * password-->密码的MD5值
 * logo-->头像地址
 * nickname->昵称
 * phonenum->手机号码
 * email->邮箱
 * create_time->用户创建时间
 * last_login_time->最后登录时间
 * ip->用户最后登陆的ip地址
*/
namespace Home\Model;
use Think\Model;
class User3Model extends Model
{
    protected $_validate = array(
        array(
            'username',
            'require',
            '用户名必须！'
        ), // 用户名必须
        array(
            'email',
            'email',
            'Email格式错误！',
            2
        ), // 如果输入则验证Email格式是否正确
        array(
            'password',
            '2,30',
            '密码长度不正确',
            0,
            'length'
        ), // 验证密码是否在指定长度范围
        array(
            'confirm_password',
            'password',
            '两次密码不一致',
            0,
            'confirm'
        ), // 验证确认密码是否和密码一致
        array(
            'sex',
            '0,1,2',
            '请不要篡改性别',
            self::VALUE_VALIDATE,
            'in',
            self::MODEL_BOTH
        ) ,
        array(
            'birthday',
            'checkBirthday',
            '生日超出可能范围',
            self::VALUE_VALIDATE,
            'callback',
            self::MODEL_BOTH
        ) ,
        array('phonenum','/^1[3|4|5|8][0-9]\d{4,8}$/','请输入正确的手机号码','0','regex',3)
    );
    /**
     * [checkBirthday description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    function checkBirthday($value) {

        $start = strtotime('1900-1-1');
        $end = NOW_TIME;
        $value_time = strtotime($value);

        return $value_time >= $start && $value_time <= $end;
    }
    protected $_auto = array (
        array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('logo','Public/images/user3logo/touxiang.jpg'),
        array('stauts','1'),
        array('sex',0),
        array('birthday','1950-10-01'),
        array('ip', 'get_client_ip', self::MODEL_BOTH, 'function'),

    );


}