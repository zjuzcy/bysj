<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>医院详情</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/fonts/font-awesome/css/font-awesome.css" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/MyDemo/Public/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/login3View/mmss.css" />

    <!--jquery ui 日期控件 -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/jquery.datetimepicker.css" />

</head>
<header>
    <div class="container-fluid navbar-fixed-top bg-primary">
        <ul class="nav navbar-nav  left">
            <li class="text-white h4">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-medkit"></i>
                &nbsp;&nbsp;<b class="office_info"id="title">健康关爱平台</b>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-pills right ">
            <li class="bg-warning " id="yuyue_count">
                <a tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom"
                   data-container="body" data-content="您当前有<?php echo ($count1[0]["count"]); ?>封预约请求回复待您查看。" title="预约申请"
                ><i class="fa fa-calendar"></i><span class="badge" id="yuyuecount"><?php echo ($count1[0]["count"]); ?></span></a>
            </li>
            <li class="bg-success liuyan_count">
                <a tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom"
                   data-container="body" data-content="您当前有<?php echo ($count2[0]["count"]); ?>封医师留言待您查看。" title="留言回复"><span class="glyphicon glyphicon-envelope"></span><span class="badge"><?php echo ($count2[0]["count"]); ?></span></a>
            </li>
            <li class="bg-info dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-male"></i>&nbsp;<span><?php echo ($userinfo["nickname"]); ?></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="text-center"><a data-toggle="modal" href='#modal-id'><span class="text-primary" id="info">个人资料</span></a></li>
                    <li class="text-center"><a href="#" data-toggle="modal" data-target="#myModal"><span class="text-primary">用户须知</span></a></li>


                    <li class="divider"><a href="#"></a></li>
                    <li class="text-center"><a href="login3"><span class="text-primary">退出</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<body>
<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header " role="alert">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="label label-info">用户须知</span></h4>
            </div>
            <div class="modal-body alert alert-success " role="alert">

                本系统为测试所用，最终解释权归开发者所有。<br>
                珍惜生命，关爱健康。<br><br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">我知道了</button>
            </div>
        </div>
    </div>
</div>

<!-- 医师详情页-->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="doctor-info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="doc-title"></h4>
            </div>
            <div class="modal-body" id="doc-info">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">我知道了</button>
            </div>
        </div>
    </div>
</div>

<!--医生预约信息 -->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="yuyue">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="yuyue_doc"></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <INPUT type="hidden" id="peo_id" value="">
                    <INPUT type="hidden" id="doc_id" value="">
                    <INPUT type="hidden" id="doc_name" value="">
                    <!-- 预约时间 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">预约时间  <i class="fa fa-indent"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="yuyue_time" value="">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label text-danger" id="er_yuyue_time"></label>
                        </div>
                    </div>
                    <!-- 备注 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">备注  <i class="fa fa-list-alt"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="yuyue_content" value="">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label text-danger"id="er_yuyue_content"></label>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="go_yuyue" >提交预约请求</button>
            </div>
        </div>
    </div>
</div>

<!--给医师留言 -->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="liuyan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="liuyan_doc"></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <!-- 留言内容 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">留言 <i class="fa fa-indent"></i></label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="liuyan_info" rows="3"></textarea>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="go_liuyan" >提交留言</button>
            </div>
        </div>
    </div>
</div>
<!--用户详细信息修改-->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">个人信息</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <INPUT type="hidden" id="username" value="<?php echo ($userinfo["username"]); ?>">

                    <!-- 昵称 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">昵称  <i class="fa fa-smile-o"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nickname" value="<?php echo ($userinfo["nickname"]); ?>">
                        </div>
                        <div class="col-sm-4">
                                <label class="control-label text-danger" id="ernickname"></label>
                        </div>
                    </div>
                    <!-- 电子邮件 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱  <i class="fa fa-envelope-o"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="uemail" value="<?php echo ($userinfo["email"]); ?>">
                        </div>
                        <div class="col-sm-4">
                                <label class="control-label text-danger"id="eremail"><?php echo ($errors["email"]); ?></label>

                        </div>
                    </div>
                    <!-- 生日 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">生日  <i class="fa fa-credit-card"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="datetimepicker"  value="<?php echo ($userinfo["birthday"]); ?>">
                        </div>
                        <div class="col-sm-4">
                                <label class="control-label text-danger" id="erbirthday"></label>
                        </div>
                    </div>
                    <!-- 性别 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">性别  <i class="fa fa-male"></i></label>
                        <div class="col-sm-6">
                            <select id="sex" class="form-control" value="0">
                                <option value="0">不确定</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                                <label class="control-label text-danger"id="ersex"><?php echo ($errors["sex"]); ?></label>
                        </div>
                    </div>
                    <!-- 手机号码 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机  <i class="fa fa-phone-square"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phonenum" value="<?php echo ($userinfo["phonenum"]); ?>">
                        </div>
                        <div class="col-sm-4">
                                <label class="control-label text-danger" id="erphonenum"></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="go">提交修改</button>
            </div>
        </div>
    </div>
</div>


<div id="div1"><img src="/MyDemo/Public/images/background/1.jpg" /></div>
<div class="container-fluid">
    <div class="row ">
        <div class="col-xs-2 bg-blue">
            <br/>
            <br/>
            <br/>
            <div class="panel-group sidebar-menu" id="accordion" aria-multiselectable="true">
                <div class="panel panel-default menu-first menu-first-active">
                    <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true"
                       aria-controls="collapseOne" id="zhuye" href="" onclick="showzhuye()">
                        <i class="fa fa-bank"></i> <span>主页</span>
                    </a>
                </div>
                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href=""  aria-expanded="true"
                       aria-controls="collapseOne" id="hos_info">
                        <i class="fa fa-heartbeat"></i> 加盟医院概况</a>
                    </a>

                </div>
                <div class="panel panel-default menu-first">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                       aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-user-md"></i> 科室介绍</a>
                    </a>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <ul class="nav nav-list menu-second" id="hos_list">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="true"
                       aria-controls="collapseOne" id="hos_yuyue">
                        <i class="fa fa-tag"></i> 预约信息</a>
                    </a>

                </div>
                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href=""  aria-expanded="true"
                       aria-controls="collapseOne" id="hos_liuyan">
                        <i class="fa fa-square-o"></i> 留言信息</a>
                    </a>

                </div>
            </div>
        </div>
        <!--右侧内容开始-->
        <div class="col-xs-10">
            <br/>
            <br/>
            <br/>
            <div id="mycontent">
            </div>
            <!----------------------------------------------------------    ------------------------------------------->
        </div>
        <!--右侧内容结束-->
        </div>
    </div>
</body>
<<script type="text/javascript" src="/MyDemo/Public/js/view3Function.js"></script>
<!--- 常量文件-->
<script type="text/javascript" src="/MyDemo/Public/js/CONST.js"></script>

<link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/login3View/mystyle.css" />
</html>