<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>健康关爱平台</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/fonts/font-awesome/css/font-awesome.css" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/MyDemo/Public/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/Splogin1View/mmss.css" />

    <!--jquery ui 日期控件 -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/jquery.datetimepicker.css" />

</head>
<header>
    <div class="container-fluid navbar-fixed-top bg-gogo">
        <ul class="nav navbar-nav  left">
            <li class="text-yellow h4">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-medkit"></i>
                &nbsp;&nbsp;<b class="office_info" id="title">健康关爱平台</b>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-pills right ">
            <li class="bg-info dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-user"></i>&nbsp;<span>管理员</span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="text-center"><a href="#" data-toggle="modal" data-target="#myModal"><span class="text-primary">用户须知</span></a></li>


                    <li class="divider"><a href="#"></a></li>
                    <li class="text-center"><a href="login1"><span class="text-primary">退出</span></a></li>
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

<!--科室详情-->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="change_depart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Add_depart_title"></h4>
            </div>
            <div class="modal-body" id="Add_depart_body">

            </div>
        </div>
    </div>
</div>


<!--科室添加-->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="Add_department">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="ma_title">科室添加</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">

                    <!-- 用户名 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">科室名称  <i class="fa fa-smile-o"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Add_department_name" value="">
                        </div>
                    </div>
                    <!-- 门类 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">所属门类 <i class="fa fa-arrows-v"></i></label>
                        <div class="col-sm-6">
                            <select id="Add_department_category" class="form-control">
                                <option value="外科">外科</option>
                                <option value="内科">内科</option>
                                <option value="其他门类">其他门类</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="go_Add_department">用户添加</button>
            </div>
        </div>
    </div>
</div>

<!--科室添加-->
<div class="modal fade bs-example-modal-lg "tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="Add_doctor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Add_doctor_title"></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <INPUT type="hidden" id="depart_id" value="">
                    <!-- 医师姓名 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">医师姓名  <i class="fa fa-smile-o"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Add_doctor_name" value="">
                        </div>
                    </div>

                    <!-- 密码 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">密码  <i class="fa fa-check-square-o"></i></label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="Add_doctor_password" value="">
                        </div>
                    </div>
                    <!-- 确认密码 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">确认密码  <i class="fa fa-check-square"></i></label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="Add_doctor_repassword" value="">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label text-danger" id="Add_doctor_errepassword"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">职称  <i class="fa fa-dot-circle-o"></i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Add_doctor_place" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="go_Add_doctor">医师添加</button>
            </div>
        </div>
    </div>
</div>

<div id="div1"><img src="/MyDemo/Public/images/background/5.jpg" /></div>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="true"
                       aria-controls="collapseOne" id="hos_change">
                        <i class="fa fa-plus-square"></i> 医院信息修改
                    </a>

                </div>
                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href=""  aria-expanded="true"
                       aria-controls="collapseOne" id="depart_ma">
                        <i class="fa fa-hospital-o"></i> 科室管理
                    </a>

                </div>

                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href=""  aria-expanded="true"
                       aria-controls="collapseOne" id="ma_ma">
                        <i class="fa fa-user-md"></i> 医师管理
                    </a>

                </div>

                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href=""  aria-expanded="true"
                       aria-controls="collapseOne" id="Add_logo">
                        <i class="fa fa-star-o"></i> 上传医院图片
                    </a>

                </div>

            </div>
        </div>
        <!--右侧内容开始-->
        <div class="col-xs-10">
            <br/>
            <br/>
            <br/>
            <INPUT type="hidden" id="ma_hos_id" value=<?php echo ($userinfo["hos_id"]); ?>>
            <div id="mycontent">
            </div>
            <!----------------------------------------------------------    ------------------------------------------->
        </div>
        <!--右侧内容结束-->
    </div>
</div>
</body>
<script type="text/javascript" src="/MyDemo/Public/js/View1Function.js"></script>
<!--- 常量文件-->
<script type="text/javascript" src="/MyDemo/Public/js/CONST.js"></script>
<script type="text/javascript" src="/MyDemo/Public/js/ajaxfileupload.js"></script>

<link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/SpLogin1View/mystyle.css" />
</html>