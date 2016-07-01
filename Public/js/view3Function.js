$(function () {
    showzhuye();
    docList();
    $('[data-toggle="popover"]').popover();
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus();
    });
    $('#datetimepicker').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        lang: 'ch'

    });
    $('#yuyue_time').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        lang: 'ch'

    });
    $('#info').click(function () {
        var url = SET_URL + "Home/User3View/user3Info";
        var username = $('#username').val();
        $.ajax({
            type: "POST",
            url: url,
            data: {
                username: username,
            },
            success: function (data) {
                $('#nickname').val(data.nickname);
                $('#uemail').val(data.email);
                $('#datetimepicker').val(data.birthday);
                $('#sex').val(data.sex);
                $('#phonenum').val(data.phonenum);
                $('#ersex').html("");
                $('#eremail').html("");
                $('#erbirthday').html("");
                $('#erphonenum').html("");
            }


        });
    });
    $('#go').click(function () {
        var username = $('#username').val();
        var nickname = $('#nickname').val();
        var uemail = $('#uemail').val();
        var birthday = $('#datetimepicker').val();
        var sex = $('#sex').val();
        var phonenum = $('#phonenum').val();
        var url = SET_URL + "Home/User3View/user3view";
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                username: username,
                nickname: nickname,
                email: uemail,
                birthday: birthday,
                sex: sex,
                phonenum: phonenum,
            },
            url: url,
            success: function (data) {
                if (data.st == 1) {
                    $('#ersex').html("");
                    $('#eremail').html("");
                    $('#erbirthday').html("");
                    $('#erphonenum').html("");
                    alert('修改成功');
                }
                else {
                    if (data.sex == 1)
                        $('#ersex').html("请不要随意篡改性别");
                    else
                        $('#ersex').html("");
                    if (data.email == 1)
                        $('#eremail').html("请输入有效的邮箱地址");
                    else
                        $('#eremail').html("");
                    if (data.birthday == 1)
                        $('#erbirthday').html("请输入有效的出生日期");
                    else
                        $('#erbirthday').html("");
                    if (data.phonenum == 1)
                        $('#erphonenum').html("请输入大陆地区有效手机号码");
                    else
                        $('#erphonenum').html("");

                }
            },
            error: function () {
                alert("修改失败");
                return false;
            }


        });
    });
    $('#yiyuan').click(function () {
        hosinfo();
    })  //主页中医院概况按钮的点击事件
    $('#hos_info').click(function () {
        hosinfo();
    });//左侧医院概况按钮
    $('#hos_yuyue').click(function () {
        hos_yuyue();
    });
    $('#hos_liuyan').click(function(){
        hos_liuyan();
    });
});
function showzhuye(){
    $('#mycontent').html("<div class='jumbotron masthead'>" +
        "<div class='container'>"+
        "<h1><i class='fa fa-medkit'></i>&nbsp;&nbsp;健康关爱平台</h1>"+
        "<h2><i class='fa fa-eye'></i>&nbsp;&nbsp;珍惜生命，关爱健康</h2>"
        +"<p><a class=\"btn btn-outline-inverse btn-lg\" role=\"button\" id='yiyuan'onclick='hosinfo()'>医院概况</a></p>"+
        "</div></div>"+"<div class='bc-social'><div class='container'>" +
        "<ul class='bc-social-buttons'>" +
        "<li class='social-qq'><i class='fa fa-qq'></i>开发者qq：331674560</li>"+
        "<li class='social-forum'><a title='合肥工业大学官方网站' href='http://www.hfut.edu.cn/ch/' target='_blank'><i class='fa fa-comments'></i>合肥工业大学</a></li>"+
        "<li class='social-weibo'><a title='开发者微博' href='http://weibo.com/u/2816553997' target='_blank'><i class='fa fa-weibo'></i>新浪微博：@赵超逸</a></li>"+
        "</ul></div></div>")
}
function hosinfo(){
    var url=SET_URL+"Home/User3View/hosInfo";
    var ss="";
    $.ajax({
        type : "POST",
        url  : url,
        success : function(data){
            for(i in data) {
               ss+="<div class='panel panel-info'>"+"<div class='panel-heading'>"+
                   "<a target='_blank' href='"+data[i].weburl+"'>"+data[i].name+"</a>&nbsp;&nbsp;&nbsp;&nbsp;"+
                   "<span class='label label-success'>";
                if(data[i].level==3) ss+="三甲医院";
                else ss+="二甲医院";
                ss+="</span>"+"&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='label label-info'>";
                if(data[i].zhongorxi==0)
                    ss+="综合医院";
                else
                    ss+="中医院";
                ss+="</span></div>";
                ss+="<div class='panel-body'>"+"<div class='col-xs-4 center-block' >"+
                    "<img src='"+data[i].src+"'"+"class='img-responsive'alt='Responsive image'>"+
                        "<br>"+"<span class='center-block bg-info'>"+"<i class='fa fa-map-marker'></i>"+"&nbsp;&nbsp;地址："+data[i].adress+
                        "</span><br>"+"<button type='button' class='btn btn-success center-block office_info' onclick='office_info("+data[i].id+")'"+
                "name='"+data[i].id+"'>"+"<span class='office_info'>科室介绍</span>"+"</button>"+"</div>";
                ss+="<div class='col-xs-8'>"+data[i].info+"</div></div></div>";
            }
            $('#mycontent').html(ss);
        }
    });
}
function docList(){
    var url=SET_URL+"Home/User3View/hosInfo";
    $.ajax({
        type : "POST",
        url  : url,
        success : function(data){
            for (i in data){
                $('#hos_list').append("<li><a onclick='office_info("+data[i].id+")' class='office_info' name='"+data[i].id+"'>"+"<i class='fa fa-plus-square'></i>"+"&nbsp;&nbsp;"+
                        data[i].name+"</a></li>");
            }
        }
    });
}
function office_info(num){
    var url=SET_URL+"Home/User3View/officeInfo";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            hos_id: num
        },
        success: function(data){
            var ss="";
            var s1="<div class='btn-group'>"+
            "<button type='button' class='btn btn-block btn-warning dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
            "aria-expanded='false'>内科 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            var s2="<div class='btn-group'>"+
                "<button type='button' class='btn btn-block btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
                "aria-expanded='false'>外科 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            var s3="<div class='btn-group'>"+
                "<button type='button' class='btn btn-block btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
                "aria-expanded='false'>其他门类 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            for(i in data){
                if(data[i].category=="内科")
                    s1+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
                else if(data[i].category=="外科")
                    s2+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
                else
                    s3+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
            }
            s1+="</ul></div>";
            s2+="</ul></div>";
            s3+="</ul></div>";
            ss+="<div class='panel panel-primary'><div class='panel-heading'>";
            ss+=s1+s2+s3;
            ss+="</div>";
            ss+="<div class='panel-body'><h2 class='text-success center-block '>"+data[i].hos_name +"科室概况</h2></div></div>";
            $('#mycontent').html(ss);

        }


    });
}
function putDepartmentInfo(depart_id,num){
    var url=SET_URL+"Home/User3View/officeInfo";
    var url2=SET_URL+"Home/User3View/officeInfo2";
    var o="";
    $.ajax({
        type : "POST",
        url  : url2,
        async : false,
        data: {
            depart_id: depart_id
        },
        success : function(data){
            var a=0;
           // o+="<div class='row'>";
            for(i in data){
                a=i;
                if(i%3==0) {
                    o += "<div class='row'>";
                }
                o+="<div class='col-sm-6 col-md-4 '>";
                o+="<div class='thumbnail'>"
                o+="<img src='"+data[i].logo+"' class='img-rounded img-responsive center-block' alt='200*300' onclick='doctorinfo("+data[i].id+")'>";
                o+="<div class='caption'>";
                o+="<h2 class='text-center' onclick='doctorinfo("+data[i].id+")'>"+data[i].name+"</h2>";
                o+="<br>";
                o+="<p class='my-list1'><span class='text-warning'>职称：</span><mark title='"+data[i].place+"'>"+data[i].place+"</mark></p>";
                o+="<p class='my-list2'><span class='text-warning'>简介：</span><mark title='"+data[i].introduction+"'>"+data[i].introduction+"</mark></p>";
                o+="<br>";
                o+="<div class='row'>";
                o+="<div class='col-xs-4'>" +
                    "<a onclick='yuyue("+data[i].id+")' class='btn btn-block btn-success' role='button'><i class='fa fa-chain'></i>预约</a>" +
                    "</div>";
                o+="<div class='col-xs-4'>" +
                    "<a onclick='liuyan("+data[i].id+")' class='btn btn-block btn-warning' role='button'><i class='fa fa-check-square-o'></i>留言</a></p>" +
                    "</div>";
                o+="<div class='col-xs-4'>" +
                    "<a class='btn btn-block btn-info' role='button' onclick='doctorinfo("+data[i].id+")'><i class='fa fa-check-square-o'></i>详情</a></p>" +
                    "</div>";
                o+="</div></div></div></div>";
                if(i%3==2)
                    o+="</div>";
            }
            if(a%3!=2)
                o+="</div>"
            //o+="</div>";
        }
    });
    $.ajax({
        type: "POST",
        url: url,
        data: {
            hos_id: num
        },
        success: function(data){
            var select_id;
            var ss="";
            var s1="<div class='btn-group'>"+
                "<button type='button' class='btn btn-warning dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
                "aria-expanded='false'>内科 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            var s2="<div class='btn-group'>"+
                "<button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
                "aria-expanded='false'>外科 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            var s3="<div class='btn-group'>"+
                "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true'"+
                "aria-expanded='false'>其他门类 <span class='caret'></span></button>"+"<ul class='dropdown-menu'>";
            for(i in data){
                if(data[i].id==depart_id) select_id=i;
                if(data[i].category=="内科")
                    s1+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
                else if(data[i].category=="外科")
                    s2+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
                else
                    s3+="&nbsp;&nbsp;<li><a href='#' onclick='putDepartmentInfo("+data[i].id+","+num+")'>"+data[i].name+"</a></li>";
            }
            s1+="</ul></div>";
            s2+="</ul></div>";
            s3+="</ul></div>";
            ss+="<div class='panel panel-primary'><div class='panel-heading'>";
            ss+=s1+s2+s3;
            ss+="</div>";

            ss+="<div class='panel-body'><h2 class='text-success center-block '>"+data[select_id].hos_name +"<span class='text-danger'><mark>"+data[select_id].name+"</mark></span>科室概况</h2>"+
                "<br>"+data[select_id].content+"<br><br>";
            ss+="<h2 class='text-warning center-block '>专家名师</h2>";
            ss+=o;
            ss+="</div></div>";
            $('#mycontent').html(ss);

        }


    });

}
function doctorinfo(id){
    var url=SET_URL+"Home/User3View/doctorInfo";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        success: function(data){
            var o="";
            o+="<div class='thumbnail'>"
            o+="<img src='"+data[0].logo+"' class='img-rounded img-responsive center-block' alt='200*300'>";
            o+="<div class='caption'>";
            o+="<h2 class='text-center'>"+data[0].name+"</h2>";
            o+="<br>";
            o+="<p><span class='text-warning'>职称：</span><mark>"+data[0].place+"</mark></p>";
            o+="<p><span class='text-warning'>简介：</span><mark>"+data[0].introduction+"</mark></p>";
            o+="<p><span class='text-warning'>所属医院：</span><mark>"+data[0].hos_name+"</mark></p>";
            o+="<p><span class='text-warning'>科室：</span><mark>"+data[0].departname+"</mark></p>";
            o+="<p><span class='text-warning'>邮箱：</span><mark>"+data[0].email+"</mark></p>";
            o+="<br>";
            o+="<div class='row'>";
            o+="<div class='col-xs-6'>" +
                "<a class='btn btn-success center' onclick='yuyue("+data[0].id+")' role='button'><i class='fa fa-chain'></i>预约</a>" +
                "</div>";
            o+="<div class='col-xs-6'>" +
                "<a onclick='liuyan("+data[0].id+")' class='btn btn-warning center' role='button'><i class='fa fa-check-square-o'></i>留言</a></p>" +
                "</div>";
            o+="</div></div></div>";

            $('#doc-title').html("<strong>"+data[0].name+"</strong>"+"&nbsp;&nbsp;详细信息");
            $('#doc-info').html(o);
            $('#doctor-info').modal('show');


        }


    });

}
function yuyue(id){
    var url=SET_URL+"Home/User3View/doctorInfo";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data: {
            id: id
        },
        success: function(data){
            $('#doc_name').val(data[0].name);
        }


    });
    $('#go_yuyue').click(function(){
        yuyuego(id);
    });
    var name=$('#doc_name').val();
    $('#yuyue_doc').html("预约&nbsp;<strong class='text-danger'>"+name+"</strong>&nbsp;医师");
    $('#doctor-info').modal('hide');
    $('#yuyue').modal('show');


}
function liuyan(id){


    var peo_id=$('#username').val();
    var doc_id=id;
    var name;
    var url=SET_URL+"Home/User3View/doctorInfo";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data: {
            id: id
        },
        success: function(data){
            name=data[0].name;
        }


    });
    $('#liuyan_doc').html("给&nbsp;<strong class='text-danger'>"+name+"</strong>&nbsp;医师留言");

    $('#go_liuyan').click(function(){
        liuyango(id);
    });

    $('#doctor-info').modal('hide');
    $('#liuyan').modal('show');
}

function yuyuego(id){
    var peo_id=$('#username').val();
    var content=$('#yuyue_content').val();
    var date=$('#yuyue_time').val();
    var url2=SET_URL+"Home/User3View/yuyue";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data: {
            peo_id: peo_id,
            doc_id: id,
            pre_time:date,
            content:content
        },
        success: function(data){
            if(data==1){
                alert('预约成功！');
                $('#yuyue_time').val("");
                $('#yuyue_content').val("");
                $('#er_yuyue_time').html("");
                $('#yuyue').modal('hide');
            }
            else{
                $('#er_yuyue_time').html("请提前三天到三周预约");
            }
        }


    });
}
function liuyango(id){
    var peo_id=$('#username').val();
    var content=$('#liuyan_info').val();
    var url2=SET_URL+"Home/User3View/liuyan";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data: {
            peo_id: peo_id,
            doc_id: id,
            content:content
        },
        success: function(data){
            if(data==1){
                alert('留言成功');
                $('#liuyan_info').val("");
                $('#liuyan').modal('hide');
            }
            else{
               alert('留言失败');
            }
        }


    });
}

function hos_yuyue(){
    var s1="";
    var s2="";
    var o="";
    var url2=SET_URL+"Home/User3View/yuyuelist";
    var peo_id=$('#username').val();
    var text="";
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            peo_id : peo_id
        },
        async : false,
        success: function(data){
            for(i in data){
                text="";
                if(data[i].isright==0) {
                    text += "<h2 class='text-info'>";
                    text+="您于"+getLocalTime(data[i].create_time);
                    text+="对<i><a onclick='yuyue("+data[i].doc_id+")'>&nbsp;"+data[i].name+"&nbsp;</a></i>医师在"+data[i].pre_time+"的预约尚待处理</h2>";
                }
                else if(data[i].isright==1){
                    text += "<h2 class='text-success'>";
                    text+="您于"+getLocalTime(data[i].create_time);
                    text+="对<i><a onclick='yuyue("+data[i].doc_id+")'>&nbsp;"+data[i].name+"&nbsp;</a>></i>医师在"+data[i].pre_time+"的预约被接受了</h2>";
                }
                else{
                    text += "<h2 class='text-danger'>";
                    text+="您于"+getLocalTime(data[i].create_time);
                    text+="对<i><a onclick='yuyue("+data[i].doc_id+")'>&nbsp;"+data[i].name+"&nbsp;</a></i>医师在"+data[i].pre_time+"的预约被拒绝了</h2>";
                }

                if(data[i].st1==0) s1+=text;
                s2+=text;
            }
        }

    });
    o+="<div class='panel panel-primary'>"+"<div class='panel-heading'>";
    o+="<button type='button' class='btn btn-info' id='yuyue1'>"+
            "<i class='fa fa-delicious'></i>"+"&nbsp;最近更新&nbsp;"+"</button>";
    o+="<button type='button' class='btn btn-danger' id='yuyue2'>"+
        "<i class='fa fa-calendar'></i>"+"&nbsp;全部预约信息&nbsp;"+"</button>";
    o+="</div>"+ "<div class='panel-body' id='ppp'>"+"hehehhe</div></div>";
    $('#mycontent').html(o);
    $('#ppp').html(s1);
    $('#yuyue1').click(function(){
        $('#ppp').html(s1);
        readyuyue();
    });
    $('#yuyue2').click(function(){
        $('#ppp').html(s2);
        readyuyue();
    });

}
function getLocalTime(nS) {
      return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
    }
function readyuyue(){
    var url2=SET_URL+"Home/User3View/readyuyue";
    var peo_id=$('#username').val();
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            peo_id : peo_id
        },
        success: function(data){

        }

    });
}
function hos_liuyan(){
    var s1="";
    var s2="";
    var o="";
    var url2=SET_URL+"Home/User3View/liuyanlist";
    var peo_id=$('#username').val();
    var text="";
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            peo_id : peo_id
        },
        async : false,
        success: function(data){
            for(i in data){
                text="";
                if(data[i].flag==1){
                    text+="<h3 class='text-warning'><i>&nbsp;<a title='回复我' onclick='liuyan("+data[i].doc_id+
                        ")'>"+data[i].name+"</a>&nbsp;</i>医师于"+getLocalTime(data[i].create_time)+"给您留言，内容是：</h3>";
                    text+="<h4 class='bg-danger'>&nbsp;&nbsp;&nbsp;&nbsp;"+data[i].content+"</h4>";
                }
                else{
                    text+="<h3 class='text-info'>您于"+getLocalTime(data[i].create_time)+"给"+"<i>&nbsp;<a title='回复我' onclick='liuyan("+data[i].doc_id+
                        ")'>"+data[i].name+"</a>&nbsp;</i>"+"医师留言，内容是：</h3>";
                    text+="<h4 class='bg-success'>&nbsp;&nbsp;&nbsp;&nbsp;"+data[i].content+"</h4>";

                }
                if(data[i].st1==0)
                    s1+=text;
                s2+=text;
            }
        }


    });

    o+="<div class='panel panel-primary'>"+"<div class='panel-heading'>";
    o+="<button type='button' class='btn btn-info' id='liuyan1'>"+
        "<i class='fa fa-delicious'></i>"+"&nbsp;最新留言&nbsp;"+"</button>";
    o+="<button type='button' class='btn btn-danger' id='liuyan2'>"+
        "<i class='fa fa-calendar'></i>"+"&nbsp;全部留言&nbsp;"+"</button>";
    o+="</div>"+ "<div class='panel-body' id='qqq'>"+"hehehhe</div></div>";

    $('#mycontent').html(o);
    $('#qqq').html(s1);
    $('#liuyan1').click(function(){
        $('#qqq').html(s1);
        readliuyan();
    });
    $('#liuyan2').click(function(){
        $('#qqq').html(s2);
        readliuyan();
    });

}
function readliuyan(){
    var url2=SET_URL+"Home/User3View/readliuyan";
    var peo_id=$('#username').val();
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            peo_id : peo_id
        },
        success: function(data){

        }

    });
}

