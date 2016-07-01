$(function () {
    showzhuye();
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

    $('#hos_change').click(function(){
        hos_change();

    });

    $('#depart_ma').click(function(){
        depart_ma();
    });
    $('#go_Add_doctor').click(function(){
        go_Add_doctor();
    });

    $('#ma_ma').click(function(){
        doctor_ma();
    });

    $('#Add_logo').click(function(){
        Add_logo();
    });
});
function showzhuye(){
    $('#mycontent').html("<div class='jumbotron masthead text-yellow'>" +
        "<div class='container'>"+
        "<h1><i class='fa fa-medkit'></i>&nbsp;&nbsp;健康关爱平台</h1>"+
        "<h2><i class='fa fa-eye'></i>&nbsp;&nbsp;珍惜生命，关爱健康</h2>"
        +"<h4 class='text-gg'>普通管理员</h4>"+
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

function hos_change(){
    var id=$('#ma_hos_id').val();
    var url=SET_URL+"Home/AdminView/hos_info";
    $.ajax({
            type: "POST",
            url: url,
            data: {
                hos_id: id
            },
            success: function(data){
                var o="";
                o+="<div class='panel panel-success'>";
                o+="<div class='panel-heading'>医院详情及信息修改</div>";
                o+="<div class='panel-body'>";
                o+="<div class='thumbnail'>";
                o+="<div class='row'>";
                o+="<div class='col-sm-3'></div>";
                o+="<img src='"+data[0].src+"' class='img-rounded img-responsive center-block col-sm-6' alt='400*600'>";
                o+="<div class='col-sm-3'></div>";
                o+="</div>";
                o+="<div class='caption'>";
                o+="<h2 class='text-center'>"+data[0].name+"</h2>";
                o+= "<br>";
                o+="<form action='' method='POST' class='form-horizontal' role='form'>";
                o+="<div class='form-group'>";
                o+="<label class='text-warning col-sm-2 '>医院类型：</label>";
                if(data[0].zhongorxi==0)
                    o+="<label class='col-sm-10 text-info'>综合医院</label>";
                else
                    o+="<label class='col-sm-10 text-danger'>中医院</label>";
                o+="</div>";

                o+="<div class='form-group'>";
                o+="<label class='text-warning col-sm-2'>医院等级：</label>";
                if(data[0].level==3)
                    o+="<label class='col-sm-10 text-info'>三甲医院</label>";
                else
                    o+="<label class='col-sm-10 text-danger'>二甲医院</label>";
                o+="</div>";

                o+="<div class='form-group'>";
                o+="<label class='text-warning col-sm-2'>医院网址：</label>";
                o+="<a class='col-sm-10 text-info' href='"+data[0].weburl+"'>"+data[0].weburl+"</a>";
                o+="</div>";

                o+="<div class='form-group'>";
                o+="<label class='col-sm-2 text-warning'>医院地址</label>";
                o+="<div class='col-sm-10'>";
                o+="<input type='text' class='form-control' id='hos_adress' value='"+data[0].adress+"'>";
                o+="</div></div>";

                o+="<div class='form-group'>";
                o+="<label class='col-sm-2 text-warning'>医院简介</label>";
                o+="<div class='col-sm-10'>";
                o+="<textarea class='form-control' id='hos_info' rows='8'>"+data[0].info+"</textarea>";
                o+="</div></div>";

                o+="<div class='form-group'>";
                o+="<div class='col-sm-10'></div>";
                o+="<div class='col-sm-2'>";
                o+="<button type='button' class='btn btn-info' id='go_change_hos_info'>提交修改</button>";
                o+="</div></div>";

                o+="</form>";
                o+="</div></div>";
                o+="</div></div>";
                $('#mycontent').html(o);

                $('#go_change_hos_info').click(function(){
                    go_change_hos_info();
                });

            }


        });


}
function  go_change_hos_info(){
    var id=$('#ma_hos_id').val();
    var url=SET_URL+"Home/AdminView/go_change_hos_info";
    var adress=$('#hos_adress').val();
    var info=$('#hos_info').html();

    $.ajax({
        type : "POST",
        url  : url,
        data :{
            id:id,
            adress:adress,
            info:info
        },
        success : function(data){
            if(data==1) {
                alert('修改成功');
            }
        }
    });
}

function depart_ma(){
    var o="";
    var url2=SET_URL+"Home/AdminView/depart_ma";
    var id=$('#ma_hos_id').val();
    o+="<div class='panel panel-success'>";
    o+="<div class='panel-heading'>科室管理</div>";
    o+="<div class='panel-body'>";
    o+="<button class='btn btn-warning' id='add_depart'>添加科室</button>"
    o+="</div>";
    o+="<table class='table table-hover table-bordered'>";
    o+="<thead>";
    o+="<tr>";
    o+="<th class='text-center'><i>科室名称</i></th>";
    o+="<th class='text-center'><i>门类</i></th>";
    o+="<th class='text-center'><i>创建时间</i></th>";
    o+="<th class='text-center'><i>操作</i></th>";
    o+="</tr></thead>";
    o+="<tbody class='table-striped table-hover'>";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data :{
           hos_id:id
        },

        success: function(data){
            for(i in data){
                if(data[i].category=='外科')
                    o+="<tr class='success'>";
                else if(data[i].category=='内科')
                    o+="<tr class='info'>";
                else
                    o+="<tr class='warning'>";
                o+="<td class='text-center'>"+data[i].name+"</td>";
                o+="<td class='text-center'><span class='text-warning'>"+data[i].category+"</span></td>";

                o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                o+="<td class='text-center'><button type='button' class='btn btn-info' onclick='depart_info("+data[i].id+")'>" +
                    "详情"+"</button>&nbsp;&nbsp;&nbsp;&nbsp;"+"<button type='button' class='btn btn-success' onclick='add_doctor("+data[i].id+")'>"+"医师添加"+"</button></td>";
                o+="</td>";


            }
        }


    });
    o+="</tbody></table><br><br></div>";
    $('#mycontent').html(o);
    $('#add_depart').click(function(){
        add_depart();
    });
}

function add_depart(){
    $('#Add_department').modal('show');
    $('#go_Add_department').click(function(){
        go_Add_department();
    });
}

function depart_info(id){
    var url=SET_URL+"Home/AdminView/get_depart_info";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            depart_id: id
        },
        success: function(data){
            $('#Add_depart_title').html(data[0].name+"详情及信息修改");
            var o="";
            o+="<div class='thumbnail'>";
            o+="<div class='caption'>";
            o+="<form action='' method='POST' class='form-horizontal' role='form'>";
            o+="<div class='form-group'>";
            o+="<label class='text-warning col-sm-2 '>科室类型：</label>";
                o+="<label class='col-sm-10 text-info'>"+data[0].category+"</label>";
            o+="</div>";




            o+="<div class='form-group'>";
            o+="<label class='col-sm-2 text-warning'>科室简介</label>";
            o+="<div class='col-sm-10'>";
            o+="<textarea class='form-control' id='depart_info' rows='8'>"+data[0].content+"</textarea>";
            o+="</div></div>";

            o+="<div class='form-group'>";
            o+="<div class='col-sm-10'></div>";
            o+="<div class='col-sm-2'>";
            o+="<button type='button' class='btn btn-info' id='go_change_depart_info'>提交修改</button>";
            o+="</div></div>";

            o+="</form>";
            o+="</div></div>";
            $('#Add_depart_body').html(o);

            $('#go_change_depart_info').click(function(){
                go_change_depart_info(id);
            });

            $('#change_depart').modal('show');

        }


    });

}

function go_change_depart_info(id){
    var content=$('#depart_info').html();
    var url=SET_URL+"Home/AdminView/go_change_depart_info";
    $.ajax({
        type : "POST",
        url  : url,
        data :{
            id:id,
            content:content
        },
        success : function(data){
            if(data==1) {
                alert('修改成功');
            }
        }
    });

}

function  go_Add_department(){
    var hos_id=$('#ma_hos_id').val();
    var url=SET_URL+"Home/AdminView/go_Add_department";
    var name=$('#Add_department_name').val();
    var category=$('#Add_department_category').val();

    $.ajax({
        type : "POST",
        url  : url,
        data :{
            hos_id:hos_id,
            name:name,
            category:category
        },
        success : function(data){
            if(data==1) {
                alert("添加成功!");
                $('#Add_department_name').val("");
                $('#Add_department_category').val("");
                $('#Add_department').modal('hide');
                depart_ma();


            }
        }
    });
}

function add_doctor(id){

    var url=SET_URL+"Home/AdminView/get_depart_info";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            depart_id: id
        },
        success: function(data){
            $('#depart_id').val(id);
            $('#Add_doctor_title').html(data[0].name+"医师添加");
            $('#Add_doctor_name').val('');
            $('#Add_doctor_password').val('');
            $('#Add_doctor_repassword').val('');
            $('#Add_doctor_errepassword').html("");
            $('#Add_doctor_place').val('');
            $('#Add_doctor').modal('show');

        }


    });

}
function  go_Add_doctor(){

    var url=SET_URL+"Home/AdminView/go_Add_doctor";

    var id=$('#depart_id').val();
    var doc_name=$('#Add_doctor_name').val();
    var password=$('#Add_doctor_password').val();
    var repassword=$('#Add_doctor_repassword').val();
    var place=$('#Add_doctor_place').val();
    if(password!=repassword)
        $('#Add_doctor_errepassword').html("密码不一致");
    else{
        $.ajax({
            type : "POST",
            url  : url,
            data :{
                depart_id:id,
                name:doc_name,
                password:password,
                place:place
            },
            success : function(data){
                if(data==1) {
                    alert("添加成功!");
                    $('#Add_department_name').val("");
                    $('#Add_department_category').val("");
                    $('#Add_doctor').modal('hide');

                }
            }
        });

    }


}

function doctor_ma(){
    var hos_id=$('#ma_hos_id').val();
    var url=SET_URL+"Home/AdminView/doctor_ma";
    var o="";

    o+="<div class='panel panel-success'>";
    o+="<div class='panel-heading'>医师管理</div>";
    o+="<div class='panel-body'>";
    o+="</div>";
    o+="<table class='table table-hover table-bordered'>";
    o+="<thead>";
    o+="<tr>";
    o+="<th class='text-center'><i>工号</i></th>";
    o+="<th class='text-center'><i>姓名</i></th>";
    o+="<th class='text-center'><i>创建时间</i></th>";
    o+="<th class='text-center'><i>密码</i></th>";
    o+="<th class='text-center'><i>职称</i></th>";
    o+="<th class='text-center'><i>状态</i></th>";
    o+="<th class='text-center'><i>所属科室</i></th>";
    o+="<th class='text-center'><i>操作</i></th>";
    o+="</tr></thead>";
    o+="<tbody class='table-striped table-hover'>";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data :{
            hos_id:hos_id
        },

        success: function(data){
            for(i in data){
                if(data[i].stauts==0)
                    o+="<tr class='warning'>";
                else
                    o+="<tr class='info'>";
                o+="<td class='text-center'>"+data[i].id+"</td>";
                o+="<td class='text-center'>"+data[i].name+"</td>";
                o+="<td class='text-center'>"+getLocalTime(data[i].create_time)+"</td>";
                o+="<td class='text-center'>"+data[i].password+"</td>";
                o+="<td class='text-center'>"+data[i].place+"</td>";
                if(data[i].stauts==0)
                    o+="<td class='text-center'><span class='text-warning'>离职</span></td>";
                else
                    o+="<td class='text-center'><span class='text-success'>在职</span></td>";
                o+="<td class='text-center'>"+data[i].departname+"</td>";


                if(data[i].stauts==0)
                    o+="<td class='text-center'><button type='button' class='btn btn-success' onclick='change_doctor_A("+data[i].id+")'>" +
                        "激活"+"</button>"+"</td>";
                else
                    o+="<td class='text-center'><button type='button' class='btn btn-danger' onclick='change_doctor_B("+data[i].id+")'>" +
                        "冻结"+"</button>"+"</td>";


            }
        }


    });
    o+="</tbody></table><br><br></div>";
    $('#mycontent').html(o);
}

function change_doctor_A(id){
    var url=SET_URL+"Home/AdminView/change_doctor_A";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id:id
        },
        success: function(data){
            alert('用户已激活！');
            doctor_ma();
        }


    });
}
function change_doctor_B(id){
    var url=SET_URL+"Home/AdminView/change_doctor_B";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id:id
        },
        success: function(data){
            alert('用户已冻结！');
            doctor_ma();
        }


    });
}


function Add_logo(){
    var hos_id=$('#ma_hos_id').val();
    var url2=SET_URL+"Home/AdminView/Add_logo";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data: {
            hos_id: hos_id
        },
        success: function(data){
            var o="";
            o+="<div class='panel panel-success'>";
            o+="<div class='panel-heading'>图片修改</div>";
            o+="<div class='panel-body'>";
            o+="<div class='row'>";
            o+="<div class='thumbnail'>";
            o+="<div class='row'>";
            o+="<div class='col-sm-3'></div>";
            o+="<img src='"+data[0].src+"' alt='400*600' id='img' class='col-sm-6'>";
            o+="<div class='col-sm-3'></div>";
            o+="</div>";
            o+="<div class='caption'>";
            o+="<h2 class='text-center'>";
            o+="当前图片</h2>";
            o+="<p><input type='file' name='Img' id='imgs' class='btn btn-warning center'></p>";
            o+="<p><a class='btn btn-success center' role='button' id='sub_touxiang'>上传图片</a></p>"
            o+="</div></div></div>"
            $('#mycontent').html(o);
            $("#imgs").change(function(e){
                var $file = $(this);
                var fileObj = $file[0];
                var windowURL = window.URL || window.webkitURL;
                var dataURL;
                var $img = $("#img");
                if(fileObj && fileObj.files && fileObj.files[0]){
                    dataURL = windowURL.createObjectURL(fileObj.files[0]);
                    $img.attr('src',dataURL);
                }else{
                    dataURL = $file.val();
                    var imgObj = document.getElementById("preview");
                    imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
                }
            });
            $('#sub_touxiang').click(function(){
                ajaxFileUpload();
            });
        }


    });
}

function ajaxFileUpload() {
    var url=SET_URL+"Home/AdminView/shangchuan";
    $.ajaxFileUpload({
        url: url,//需要链接到服务器地址
        type:"POST",
        secureuri: false,
        fileElementId: 'imgs',//文件选择框的id属性
        dataType: 'text',
        success: function (data) {
            if(data=="<pre>"+0+"</pre>") {
                alert('上传失败，请上传jpg格式的文件');
                change_logo();
            }
            else {
                alert('上传成功');
            }


        }

    });
}
