<?php
/**
 * 数据表User2模型，用于存储医师用户基本数据
 * id-->工号
 * password-->密码的MD5值
 * logo-->头像地址
 * name->姓名
 * email->邮箱
 * create_time->用户创建时间
 * introduction->简介
 * palce->职称
 * stauts->状态 1表示激活 0表示冻结
 * depart——id->部门编号
 */
namespace Home\Model;
use Think\Model;
class User2Model extends Model
{
    protected $_validate = array(
        array(
            'email',
            'email',
            'Email格式错误！',
            2
        ), // 如果输入则验证Email格式是否正确
    );
    protected $_auto = array (
        array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('logo','Public/images/user2logo/0.jpg'),
        array('stauts','1'),
        array('email','331674560@qq.com'),
        array('introduction','待更新'),


    );


}