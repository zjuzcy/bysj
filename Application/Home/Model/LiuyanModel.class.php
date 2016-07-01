<?php
/**
 * 数据表Liuyan模型，用于存储患者用户留言的信息
 * id-->主键，预约信息的编号
 * peo_id-->患者用户名
 * doc_id-->医师id
 * content->留言内容
 * create_time->创建时间
 * st1->患者是否阅读，0表示未读，1表示已读
 * st2->医师是否阅读，0表示未读，1表示已读
 * flag->预约状态 0表示患者发给医师，1表示医生发给患者
 */
namespace Home\Model;
use Think\Model;
class LiuyanModel extends Model
{


    protected $_auto = array (
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
    );


}