<?php
/**
 * 数据表department模型，用于医院信息
 * id-->科室编号
 * name-->科室名称
 * category-->门类
 * hos_id-->医院编号
 * content-->简介
 * create_time-->创建时间
 */
namespace Home\Model;
use Think\Model;
class DepartmentModel extends Model
{
    protected $_auto = array (
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('content','待更新'),

    );

}