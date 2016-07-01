$(function () {
    showzhuye();
    $('#user_ma').click(function(){
        userManage();
    });
    $('#hos_ma').click(function(){
        hos_ma();
    });
    $('#ma_ma').click(function(){
        ma_ma();
    });
});
function showzhuye(){
    $('#mycontent').html("<div class='jumbotron masthead text-yellow'>" +
        "<div class='container'>"+
        "<h1><i class='fa fa-medkit'></i>&nbsp;&nbsp;健康关爱平台</h1>"+
        "<h2><i class='fa fa-eye'></i>&nbsp;&nbsp;珍惜生命，关爱健康</h2>"
        +"<h4 class='text-gg'>超级管理员</h4>"+
        "</div></div>"+"<div class='bc-social'><div class='container'>" +
        "<ul class='bc-social-buttons '>" +
        "<li class='social-qq'><i class='fa fa-qq'></i>开发者qq：331674560</li>"+
        "<li class='social-forum'><a title='合肥工业大学官方网站' href='http://www.hfut.edu.cn/ch/' target='_blank'><i class='fa fa-comments'></i>合肥工业大学</a></li>"+
        "<li class='social-weibo'><a title='开发者微博' href='http://weibo.com/u/2816553997' target='_blank'><i class='fa fa-weibo'></i>新浪微博：@赵超逸</a></li>"+
        "</ul></div></div>");
    $('#shezhi').click(function(){
        get_info();
        $('#doctor-info').modal('show');
    });
}
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
}
function userManage(){
    var o="";
    var url2=SET_URL+"Home/AdminView/userManage";
    o+="<div class='panel panel-success'>";
    o+="<div class='panel-heading'>用户管理</div>";
    o+="<div class='panel-body'>";
    o+="<form class='form-inline'>";
    o+="<div class='center'><input type='text' class='form-control' id='user_nickname' placeholder='用户姓名'>";

    o+="<button class='btn btn-default' onclick='user_go()'>查询</button></div>";
    o+="</div></form>";
    o+="<table class='table table-hover table-bordered'>";
    o+="<thead>";
    o+="<tr>";
    o+="<th class='text-center'><i>用户名</i></th>";
    o+="<th class='text-center'><i>真实姓名</i></th>";
    o+="<th class='text-center'><i>电话号码</i></th>";
    o+="<th class='text-center'><i>邮箱</i></th>";
    o+="<th class='text-center'><i>用户创建时间</i></th>";
    o+="<th class='text-center'><i>最后登录时间</i></th>";
    o+="<th class='text-center'><i>登陆ip地址</i></th>";
    o+="<th class='text-center'><i>状态</i></th>";
    o+="<th class='text-center'><i>操作</i></th>";
    o+="</tr></thead>";
    o+="<tbody class='table-striped table-hover'>";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        success: function(data){
            for(i in data){
                if(data[i].stauts==1){
                    o+="<tr class='success'>";
                    o+="<td class='text-center'>"+data[i].username+"</td>";
                    o+="<td class='text-center'>"+data[i].nickname+"</td>";
                    o+="<td class='text-center'>"+data[i].phonenum+"</td>";
                    o+="<td class='text-center'>"+data[i].email+"</td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].last_login_time)+"</td>";
                    o+="<td class='text-center'>"+data[i].ip+"</td>";
                    o+="<td class='text-center'><span class='text-success'>"+"正常"+"</span></td>";
                    o+="<td class='text-center'><button type='button' class='btn btn-danger' onclick='stopUser(\""+data[i].username+"\")'>" +
                        "冻结用户"+"</button></td>";
                    o+="</td>";
                }


                else{
                    o+="<tr class='warning'>";
                    o+="<td class='text-center'>"+data[i].username+"</td>";
                    o+="<td class='text-center'>"+data[i].nickname+"</td>";
                    o+="<td class='text-center'>"+data[i].phonenum+"</td>";
                    o+="<td class='text-center'>"+data[i].email+"</td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].last_login_time)+"</td>";
                    o+="<td class='text-center'>"+data[i].ip+"</td>";
                    o+="<td class='text-center'><span class='text-danger'>"+"冻结"+"</span></td>";
                    o+="<td class='text-center'><button type='button' class='btn btn-success' onclick='startUser(\""+data[i].username+"\")'>" +
                        "激活用户</button></td>";
                    o+="</td>";
                }

            }
        }


    });
    o+="</tbody></table></div>";
    $('#mycontent').html(o);

}

function stopUser(username){
    var url=SET_URL+"Home/AdminView/stopUser";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data: {
            username: username
        },
        success: function(data){
            alert('用户已冻结！');
            userManage();
        }


    });

}

function startUser(username){
    var url=SET_URL+"Home/AdminView/startUser";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            username: username
        },
        success: function(data){
            alert('用户已激活！');
            userManage();
        }


    });

}

function user_go(){
    var name=$('#user_nickname').val();
    var o="";
    if(name=="") {
        userManage();
    }
    else{
        o+="<div class='panel panel-success'>";
        o+="<div class='panel-heading'>用户管理</div>";
        o+="<div class='panel-body'>";
        o+="<form class='form-inline'>";
        o+="<div class='center'><input type='text' class='form-control' id='user_nickname' placeholder='用户姓名'>";

        o+="<button class='btn btn-default' onclick='user_go()'>查询</button></div>";
        o+="</div></form>";
        o+="<table class='table table-hover table-bordered'>";
        o+="<thead>";
        o+="<tr>";
        o+="<th class='text-center'><i>用户名</i></th>";
        o+="<th class='text-center'><i>真实姓名</i></th>";
        o+="<th class='text-center'><i>电话号码</i></th>";
        o+="<th class='text-center'><i>邮箱</i></th>";
        o+="<th class='text-center'><i>用户创建时间</i></th>";
        o+="<th class='text-center'><i>最后登录时间</i></th>";
        o+="<th class='text-center'><i>登陆ip地址</i></th>";
        o+="<th class='text-center'><i>状态</i></th>";
        o+="<th class='text-center'><i>操作</i></th>";
        o+="</tr></thead>";
        o+="<tbody class='table-striped table-hover'>";

        var url=SET_URL+"Home/AdminView/search_user";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name: name
            },
            async : false,
            success: function(data){
                for(i in data){
                    if(data[i].stauts==1){
                        o+="<tr class='success'>";
                        o+="<td class='text-center'>"+data[i].username+"</td>";
                        o+="<td class='text-center'>"+data[i].nickname+"</td>";
                        o+="<td class='text-center'>"+data[i].phonenum+"</td>";
                        o+="<td class='text-center'>"+data[i].email+"</td>";
                        o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                        o+="<td class='text-center'>"+getLocalTime(data[i].last_login_time)+"</td>";
                        o+="<td class='text-center'>"+data[i].ip+"</td>";
                        o+="<td class='text-center'><span class='text-success'>"+"正常"+"</span></td>";
                        o+="<td class='text-center'><button type='button' class='btn btn-danger' onclick='stopUser(\""+data[i].username+"\")'>" +
                            "冻结用户"+"</button></td>";
                        o+="</td>";
                    }


                    else{
                        o+="<tr class='warning'>";
                        o+="<td class='text-center'>"+data[i].username+"</td>";
                        o+="<td class='text-center'>"+data[i].nickname+"</td>";
                        o+="<td class='text-center'>"+data[i].phonenum+"</td>";
                        o+="<td class='text-center'>"+data[i].email+"</td>";
                        o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                        o+="<td class='text-center'>"+getLocalTime(data[i].last_login_time)+"</td>";
                        o+="<td class='text-center'>"+data[i].ip+"</td>";
                        o+="<td class='text-center'><span class='text-danger'>"+"冻结"+"</span></td>";
                        o+="<td class='text-center'><button type='button' class='btn btn-success' onclick='startUser(\""+data[i].username+"\")'>" +
                            "激活用户</button></td>";
                        o+="</td>";
                    }

                }
            }


        });

        o+="</tbody></table></div>";
        $('#mycontent').html(o);
    }
}
function hos_ma(){
    var o="";
    var url2=SET_URL+"Home/AdminView/hos_ma";
    o+="<div class='panel panel-success'>";
    o+="<div class='panel-heading'>医院管理</div>";
    o+="<div class='panel-body'>";
    o+="<button class='btn btn-warning' id='add_hos'>添加加盟医院</button>"
    o+="</div>";
    o+="<table class='table table-hover table-bordered'>";
    o+="<thead>";
    o+="<tr>";
    o+="<th class='text-center'><i>医院名称</i></th>";
    o+="<th class='text-center'><i>网址</i></th>";
    o+="<th class='text-center'><i>等级</i></th>";
    o+="<th class='text-center'><i>类型</i></th>";
    o+="<th class='text-center'><i>创建时间</i></th>";
    o+="<th class='text-center'><i>操作</i></th>";
    o+="</tr></thead>";
    o+="<tbody class='table-striped table-hover'>";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        success: function(data){
            for(i in data){
                    if(data[i].level==3)
                        o+="<tr class='success'>";
                    else
                        o+="<tr class='info'>";
                    o+="<td class='text-center'>"+data[i].name+"</td>";
                    o+="<td class='text-center'><a href='"+data[i].weburl+"' target='_blank'>"+data[i].weburl+"</a></td>";
                    if(data[i].level==3)
                        o+="<td class='text-center'><span class='text-success'>"+"三甲医院"+"</span></td>";
                    else
                        o+="<td class='text-center'><span class='text-warning'>"+"二甲医院"+"</span></td>";
                    if(data[i].zhongorxi==0)
                        o+="<td class='text-center'><span class='text-success'>"+"综合医院"+"</span></td>";
                    else
                        o+="<td class='text-center'><span class='text-warning'>"+"中医院"+"</span></td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                    o+="<td class='text-center'><button type='button' class='btn btn-info' onclick='addAdmin("+data[i].id+")'>" +
                        "添加管理员"+"</button></td>";
                    o+="</td>";


            }
        }


    });
    o+="</tbody></table></div>";
    $('#mycontent').html(o);
    $('#add_hos').click(function(){
        add_hos();
    });

}
function addAdmin(id){
    var url=SET_URL+"Home/AdminView/hos_info";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data: {
            hos_id: id
        },
        success: function(data){
            $('#ma_title').html(data[0].name+"管理员添加");
        }
    });
    $('#go_ma').click(function(){
        go_add_admin(id);

    });
    $('#hos_id').val(id);
    $('#ma_username').val("");
    $('#erma_username').html("");
    $('#ma_password').val("");
    $('#erma_password').html("");
    $('#ma_repassword').val("");
    $('#erma_repassword').html("");
    $('#Add_ma').modal('show');
}

function go_add_admin(id){
    var url=SET_URL+"Home/AdminView/add_Admin";
    var pass1=$('#ma_password').val();
    var pass2=$('#ma_repassword').val();
    var username=$('#ma_username').val();
    if(pass1!=pass2){
        $('#erma_username').html("");
        $('#erma_password').html("两次密码不一致");
    }
    else {
        $.ajax({
            type: "POST",
            url: url,
            async: false,
            data: {
                username:username,
                hos_id: id,
                password:pass1
            },
            success: function (data) {
                if(data==1) {
                    alert('添加成功！');
                    $('#Add_ma').modal('hide');
                }
                else {
                    $('#erma_username').html("用户名已存在");
                    $('#erma_password').html("");
                    $('#erma_repassword').html("");

                }

            }
        });
    }
}

function add_hos(){
    $('#hos_go').click(function(){
        hos_add_go();
    });
    $('#hos_add').modal('show');
}

function hos_add_go(){
    var url=SET_URL+"Home/AdminView/go_add_Admin";
    var name=$('#hos_name').val();
    var level=$('#hos_level').val();
    var hos_zhongorxi=$('#hos_zhongorxi').val();
    $.ajax({
        type: "POST",
        url: url,
        async: false,
        data: {
            name:name,
            level: level,
            hos_zhongorxi:hos_zhongorxi
        },
        success: function (data) {
            if(data==1) {
                alert('添加成功！');
                $('#hos_add').modal('hide');
                hos_ma();
            }

        }
    });
}

function ma_ma(){
    var o="";
    var url2=SET_URL+"Home/AdminView/ma_info";
    o+="<div class='panel panel-success'>";
    o+="<div class='panel-heading'>管理员查询</div>";
    o+="<div class='panel-body'>";
    o+="<table class='table table-hover table-bordered'>";
    o+="<thead>";
    o+="<tr>";
    o+="<th class='text-center'><i>用户名</i></th>";
    o+="<th class='text-center'><i>密码</i></th>";
    o+="<th class='text-center'><i>所属医院</i></th>";
    o+="<th class='text-center'><i>用户创建时间</i></th>";
    o+="</tr></thead>";
    o+="<tbody class='table-striped table-hover'>";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        success: function(data){
            for(i in data){
                if(data[i].st==1){
                    o+="<tr class='success'>";
                    o+="<td class='text-center'>"+data[i].username+"</td>";
                    o+="<td class='text-center'>"+data[i].password+"</td>";
                    o+="<td class='text-center'>"+data[i].name+"</td>";
                    o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                }

            }
        }


    });
    o+="</tbody></table></div>";
    $('#mycontent').html(o);
}