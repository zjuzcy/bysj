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
    $('#info').click(function(){
        get_info();
        $('#doctor-info').modal('show');
    });
    $('#go-info').click(function(){
        change_info();
    });

    $('#hos_yuyue').click(function(){
        yuyue_button();
    });
    $('#hos_liuyan').click(function(){
        liuyan_button();
    });
    $('#hos_touxiang').click(function(){
        change_logo();
    });
    $('#title').click(function(){
        showzhuye();
    });
});

function showzhuye(){
    $('#mycontent').html("<div class='jumbotron masthead text-yellow'>" +
        "<div class='container'>"+
        "<h1><i class='fa fa-medkit'></i>&nbsp;&nbsp;健康关爱平台</h1>"+
        "<h2><i class='fa fa-eye'></i>&nbsp;&nbsp;珍惜生命，关爱健康</h2>"
        +"<p><a class=\"btn btn-outline-inverse btn-lg\" role=\"button\" id='shezhi'>个人设置</a></p>"+
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
function get_info(){
    var id=$('#username').val();
    var url=SET_URL+"Home/User2View/user2Info";
    var ss="";
    $.ajax({
        type : "POST",
        url  : url,
        data :{
            id:id
        },
        success : function(data){
            $("#logo").attr("src", data[0].logo);
            $('#place').html(data[0].place);
            $('#hospital').html(data[0].hos_name);
            $('#department').html(data[0].departname);
            $('#email').val(data[0].email);
            $('#introduction').html(data[0].introduction);
        }
    });
}
function change_info(){
    var id=$('#username').val();
    var introduction=$('#introduction').html();
    var email=$('#email').val();
    var url=SET_URL+"Home/User2View/changeInfo";
    $.ajax({
        type : "POST",
        url  : url,
        data :{
            id:id,
            introduction:introduction,
            email:email
        },
        success : function(data){
            if(data.st==1) {
                alert('修改成功');
                $('#eremail').html('');
            }
            else
                $('#eremail').html('邮箱格式错误！');
        }
    });
}

function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
}

function yuyue_button(){
    var s1="";
    var s2="";
    var o="";
    var url2=SET_URL+"Home/User2View/yuyuelist";
    var doc_id=$('#username').val();
    var text="";
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            doc_id : doc_id
        },
        async : false,
        success: function(data){
            for(i in data){
                text="";
                if(data[i].isright==0) {
                    text += "<h2 class='text-info'>";
                    text+="患者<i><a onclick='set_yuyue("+data[i].id+")'>&nbsp;"+data[i].nickname+"&nbsp;</a></i>"
                        +"于"+getLocalTime(data[i].create_time);
                    text+="对您的预约尚待处理</h2>";
                }
                else if(data[i].isright==1){
                    text += "<h2 class='text-success'>";
                    text+="您接受了";
                    text+="<i>&nbsp;"+data[i].nickname+"&nbsp;</i>患者在"+data[i].pre_time+"的预约</h2>";
                }
                else{
                    text += "<h2 class='text-danger'>";
                    text+="您拒绝了";
                    text+="<i>&nbsp;"+data[i].nickname+"&nbsp;</i>患者在"+data[i].pre_time+"的预约</h2>";
                }

                if(data[i].isright==0) s1+=text;
                else  s2+=text;
            }
        }

    });
    o+="<div class='panel panel-primary'>"+"<div class='panel-heading'>";
    o+="<button type='button' class='btn btn-info' id='yuyue1'>"+
        "<i class='fa fa-delicious'></i>"+"&nbsp;待处理&nbsp;"+"</button>";
    o+="<button type='button' class='btn btn-danger' id='yuyue2'>"+
        "<i class='fa fa-calendar'></i>"+"&nbsp;已处理&nbsp;"+"</button>";
    o+="</div>"+ "<div class='panel-body' id='ppp'>"+"hehehhe</div></div>";
    $('#mycontent').html(o);
    $('#ppp').html(s1);
    $('#yuyue1').click(function(){
        $('#ppp').html(s1);
    });
    $('#yuyue2').click(function(){
        $('#ppp').html(s2);
    });


}
function set_yuyue(id){
    var url2=SET_URL+"Home/User2View/set_yuyue";
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            id : id
        },
        async : false,
        success: function(data){
            var o="";
            o+="<div class='thumbnail'>";
            o+="<div class='caption'>";
            o+="<p><span class='text-warning'>患者姓名：</span><mark>"+data[0].nickname+"</mark></p>";
            o+="<p><span class='text-warning'>预约时间：</span><mark>"+data[0].pre_time+"</mark></p>";
            o+="<p><span class='text-warning'>患者邮箱：</span><mark>"+data[0].email+"</mark></p>";
            o+="<p><span class='text-warning'>备注：</span><mark>"+data[0].content+"</mark></p>";
            o+="<br>";
            o+="<div class='row'>";
            o+="<div class='col-xs-6'>" +
                "<a class='btn btn-success center' id='agree' role='button'><i class='fa fa-chain'></i>接受</a>" +
                "</div>";
            o+="<div class='col-xs-6'>" +
                "<a id='refuse' class='btn btn-warning center' role='button'><i class='fa fa-check-square-o'></i>拒绝</a></p>" +
                "</div>";
            o+="</div></div></div>";
            $('#yuyue-title').html(data[0].nickname+"用户的预约请求");
            $('#yuyue-info').html(o);
            $('#agree').click(function(){
                var url=SET_URL+"Home/User2View/agree_yuyue";
                $.ajax({
                    type : "POST",
                    url  : url,
                    data :{
                        id:id
                    },
                    success : function(data2){
                        alert('您同意了'+data[0].nickname+"的预约请求");
                        $('#set_yuyue').modal('hide');
                        yuyue_button();
                    }
                });
            });
            $('#refuse').click(function(){
                var url=SET_URL+"Home/User2View/refuse_yuyue";
                $.ajax({
                    type : "POST",
                    url  : url,
                    data :{
                        id:id
                    },
                    success : function(data2){
                        alert('您拒绝了'+data[0].nickname+"的预约请求");
                        $('#set_yuyue').modal('hide');
                        yuyue_button();
                    }
                });
            });
            $('#set_yuyue').modal('show');
        }

    });
}

function liuyan_button(){
    var s1="";
    var s2="";
    var o="";
    var url2=SET_URL+"Home/User2View/liuyanlist";
    var id=$('#username').val();
    var text="";
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            doc_id : id
        },
        async : false,
        success: function(data){
            for(i in data){
                text="";
                if(data[i].flag==0){
                    text+="<h3 class='text-warning'><i>&nbsp;<a title='回复我' onclick='liuyan(\""+data[i].peo_id+"\")'>"+data[i].nickname+"</a>&nbsp;</i>患者于"+getLocalTime(data[i].create_time)+"给您留言，内容是：</h3>";
                    text+="<h4 class='bg-danger'>&nbsp;&nbsp;&nbsp;&nbsp;"+data[i].content+"</h4>";
                }
                else{
                    text+="<h3 class='text-info'>您于"+getLocalTime(data[i].create_time)+"给"+"<i>&nbsp;<a title='回复我' onclick='liuyan(\""+data[i].peo_id+"\")'>"+data[i].nickname+"</a>&nbsp;</i>"+"患者留言，内容是：</h3>";
                    text+="<h4 class='bg-success'>&nbsp;&nbsp;&nbsp;&nbsp;"+data[i].content+"</h4>";

                }
                if(data[i].st2==0)
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
    var url2=SET_URL+"Home/User2View/readliuyan";
    var doc_id=$('#username').val();
    $.ajax({
        type: "POST",
        url: url2,
        data :{
            doc_id: doc_id
        },
        success: function(data){

        }

    });
}
function liuyan(id){

    var doc_id=$('#username').val();
    var peo_id=id;
    var name="";
    var url=SET_URL+"Home/User2View/userInfo";
    $.ajax({
        type: "POST",
        url: url,
        async : false,
        data: {
            id: id
        },
        success: function(data){
            name=data[0].nickname;
        }


    });
    $('#liuyan_doc').html("给&nbsp;<strong class='text-danger'>"+name+"</strong>&nbsp;患者留言");

    $('#go_liuyan').click(function(){
        liuyango(id);
    });

    $('#doctor-info').modal('hide');
    $('#liuyan').modal('show');
}
function liuyango(id){
    var doc_id=$('#username').val();
    var content=$('#liuyan_info').val();
    var url2=SET_URL+"Home/User2View/liuyan";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data: {
            peo_id: id,
            doc_id: doc_id,
            content:content
        },
        success: function(data){
            if(data==1){
                alert('留言成功');
                $('#liuyan_info').val("");
                $('#liuyan').modal('hide');
            }
            else{
                $('#liuyan_info').val("");
                alert('留言失败');
            }
        }


    });
}
function change_logo(){
    var doc_id=$('#username').val();
    var url2=SET_URL+"Home/User2View/touxiang";
    $.ajax({
        type: "POST",
        url: url2,
        async : false,
        data: {
            doc_id: doc_id
        },
        success: function(data){
            var o="";
            o+="<div class='panel panel-success'>";
            o+="<div class='panel-heading'>头像修改</div>";
            o+="<div class='panel-body'>";
            o+="<div class='row'>";
            o+="<div class='thumbnail'>";
            o+="<img src='"+data[0].logo+"' alt='200*300' id='img'>";
            o+="<div class='caption'>";
            o+="<h2 class='text-center'>";
            o+="当前头像</h2>";
            o+="<p><input type='file' name='Img' id='imgs' class='btn btn-warning center'></p>";
            o+="<p><a class='btn btn-primary center' role='button' id='sub_touxiang'>上传头像</a></p>"
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
    var url=SET_URL+"Home/User2View/shangchuan";
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
