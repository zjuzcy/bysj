/**
 * Created by 赵超逸 on 2016/4/4.
 */
$(function(){
    var url=SET_URL+"Home/Index/proitm";
    //$.ajax({
    //    type: "POST",
    //    url: url,
    //   success: function(data) {
    //       $('#proitem').empty();
    //       console.log(123);
    //       alert(data[1].name);
    //       console.log(data);
    //       // $('#proitem').append("<p>hehhh</p>");
    //        var obj = data;
    //        var s1="";
    //        var s2="";
    //        var s3="";
    //        for(i in obj){
    //            if(obj[i].LEVEL==3) {
    //                s1 = "hh1 ";
    //                s3="三级甲等";
    //            }
    //            else {
    //                s1 = "hh2 ";
    //                s3="二级甲等";
    //            }
    //            if(obj[i].zhongorxi==1)
    //                s2="hh3";
    //
    //            $('#proitem').append(
    //                "<div class=\"col-sm-6 col-md-3 col-lg-3 "+s1+s2+
    //                "\">"+"<div class=\"portfolio-item\">"+
    //                "<div class=\"hover-bg\">"+"<div class=\"hover-text\">"+
    //                "<h4>"+"<a href="+"\'"+obj[i].weburl+"\' "+"target=\'_blank\'"+
    //                "title="+"\""+obj[i].name+"\">"+obj[i].name+"</a></h4>"+
    //                "<small>"+s3+"</small>"+"<div class=\"clearfix\"></div>"+
    //                "<i class=\"fa fa-search\"></i> </div>"+"<img src=\""+obj[i].src+"\" "+
    //                "class=\"img-responsive\" "+"alt=\""+obj[i].name+"\"></div>"+
    //                "</div>");
    //
    //        }
    //    }
    //});
})