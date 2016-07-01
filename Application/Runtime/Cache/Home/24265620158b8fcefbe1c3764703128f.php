<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>医院详情</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/fonts/font-awesome/css/font-awesome.css" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.1.11.1.js"></script>
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
                <span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;<b>健康关爱平台</b>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-pills right ">
            <li class="bg-warning ">
                <a tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom"
                   data-container="body" data-content="您当前有1封预约请求回复待您查看。" title="消息通知"
                ><i class="fa fa-calendar"></i><span class="badge">1</span></a>
            </li>
            <li class="bg-success">
                <a tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom"
                   data-container="body" data-content="您当前有2封医师留言待您查看。" title="消息通知"><span class="glyphicon glyphicon-envelope"></span><span class="badge">2</span></a>
            </li>
            <li class="bg-info dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-male"></i>&nbsp;<span><?php echo ($userinfo["nickname"]); ?></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="text-center"><a data-toggle="modal" href='#modal-id'><span class="text-primary">个人资料</span></a></li>
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

<!--用户详细信息修改-->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">个人信息</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo U('User3View/user3view');?>" method="POST" class="form-horizontal" role="form">
                    <INPUT type="hidden" name="username" value="<?php echo ($userinfo["username"]); ?>">
                    <!-- 昵称 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">昵称</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nickname" value="<?php echo ($userinfo["nickname"]); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php if(isset($errors['nickname'])): ?><label class="control-label text-danger"><?php echo ($errors["nickname"]); ?></label><?php endif; ?>
                        </div>
                    </div>
                    <!-- 电子邮件 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" value="<?php echo ($userinfo["email"]); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php if(isset($errors['email'])): ?><label class="control-label text-danger"><?php echo ($errors["email"]); ?></label><?php endif; ?>
                        </div>
                    </div>
                    <!-- 生日 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">生日</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="birthday"  value="<?php echo ($userinfo["birthday"]); ?>"  id="datetimepicker">
                        </div>
                        <div class="col-sm-4">
                            <?php if(isset($errors['birthday'])): ?><label class="control-label text-danger"><?php echo ($errors["birthday"]); ?></label><?php endif; ?>
                        </div>
                    </div>
                    <!-- 性别 -->
                    <div class="form-group">
                        <label class="col-sm-2">性别</label>
                        <div class="col-sm-6">
                            <select name="sex" class="form-control" value="{userinfo.sex}">
                                <option value="0">不确定</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <?php if(isset($errors['sex'])): ?><label class="control-label text-danger"><?php echo ($errors["sex"]); ?></label><?php endif; ?>
                        </div>
                    </div>
                    <!-- 手机号码 -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="phonenum" value="<?php echo ($userinfo["phonenum"]); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php if(isset($errors['phonenum'])): ?><label class="control-label text-danger"><?php echo ($errors["phonenum"]); ?></label><?php endif; ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">提交修改</button>
            </div>
            </form>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="index.html" aria-expanded="true"
                       aria-controls="collapseOne">
                        <i class="icon-home icon-large"></i> 主页
                    </a>
                </div>
                <div class="panel panel-default menu-first">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                       aria-controls="collapseOne">
                        <i class="icon-user-md icon-large"></i> 系统管理</a>
                    </a>

                    <div id="collapseOne" class="panel-collapse collapse " >
                        <ul class="nav nav-list menu-second">
                            <li><a href="p1.html"><i class="icon-user"></i> 表格p1</a></li>
                            <li><a href="p2.html"><i class="icon-edit"></i> 图表p2</a></li>
                            <li><a href="p3.html"><i class="icon-trash"></i> p3</a></li>
                            <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default menu-first">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                       aria-expanded="false" aria-controls="collapseTwo">
                        <i class="icon-book icon-large"></i> 用户管理</a>
                    </a>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <ul class="nav nav-list menu-second">
                            <li><a href="#"><i class="icon-user"></i> 子选项1</a></li>
                            <li><a href="#"><i class="icon-edit"></i> 子选项2</a></li>
                            <li><a href="#"><i class="icon-trash"></i> 子选项3</a></li>
                            <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default menu-first">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                       aria-expanded="false" aria-controls="collapseThree">
                        <i class="icon-book icon-large"></i> 其他管理</a>
                    </a>

                    <div id="collapseThree" class="panel-collapse collapse">
                        <ul class="nav nav-list menu-second">
                            <li><a href="#"><i class="icon-user"></i> 子选项1</a></li>
                            <li><a href="#"><i class="icon-edit"></i> 子选项2</a></li>
                            <li><a href="#"><i class="icon-trash"></i> 子选项3</a></li>
                            <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--右侧内容开始-->
        <div class="col-xs-10">
            <br/>
            <br/>
            <br/>
            <h1 class="text-center text-white">健康关爱平台</h1>
            <!----------------------------------------------------------    ------------------------------------------->
        </div>
        <!--右侧内容结束-->
        </div>
    </div>
</body>
<<script type="text/javascript" src="/MyDemo/Public/js/view3Function.js"></script>>
</html>