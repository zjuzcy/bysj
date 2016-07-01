<?php
/**
 * 数据表hospital模型，用于医院信息
 * id-->数据编号
 * name-->医院名称
 * src-->医院图片地址
 * adress-->医院地址
 * weburl-->医院网址
 * level-->医院等级，3表示三甲医院
 * zhongorxi-->是否为中医院，1表示是
 * create_time-->创建时间
 */
namespace Home\Model;
use Think\Model;
class HospitalModel extends Model
{
    protected $_auto = array (
        array('create_time','time',self::MODEL_INSERT,'function'), // 对create_time字段在新增的时候写入当前时间戳
        array('src','../../../Public/proImages/hos_images/0.jpg'),
        array('info','待更新'),
        array('weburl','待更新'),
        array('adress','待更新'),

    );

}