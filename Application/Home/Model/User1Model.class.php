<?php
/**
* 数据表User1模型，用于存储管理员用户基本数据
* username-->用户名
* password-->密码的MD5值
* st-->管理员类型 0表示系统管理员，1表示对应医院的管理员
* hos_id->医院id，标记管理员所属医院
*/
namespace Home\Model;
use Think\Model;
class User1Model extends Model{

    protected $_validate = array(
        array(
            'username',
            'require',
            '用户名必须！'
        ), // 用户名必须
        array('username','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
    );

    protected $_auto = array (
        array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('st',1),

    );


}