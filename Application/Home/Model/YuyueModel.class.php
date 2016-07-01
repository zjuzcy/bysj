<?php

/**
 * 数据表Yuyue模型，用于存储患者用户预约的信息
 * id-->主键，预约信息的编号
 * peo_id-->患者用户名
 * doc_id-->医师id
 * content->备注
 * pre_time->预约时间
 * create_time->预约创建时间
 * st1->患者是否阅读，0表示未读，1表示已读
 * st2->医师是否阅读，0表示未读，1表示已读
 * isright->预约状态 0表示待审核，1表示成功预约，2表示预约失败
 */
namespace Home\Model;
use Think\Model;
class YuyueModel extends Model
{
    protected $_validate = array(

        array(
            'pre_time',
            'checkTime',
            '预约时间必须是三天后且不超过三周',
            self::VALUE_VALIDATE,
            'callback',
            self::MODEL_BOTH
        ) ,
    );


    function checkTime($value) {
        $day3 = strtotime("+3 days")+8*60*60;
        $day21 = strtotime("+21 days")+8*60*60;
        $value_time = strtotime($value);

        return $value_time <= $day21 && $value_time >=$day3;
    }
    protected $_auto = array (
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('st1','1'),
        array('st2','0'),
        array('isright','0'),

    );


}