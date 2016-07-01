<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>健康关爱平台</title>

<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/fonts/font-awesome/css/font-awesome.css" />

<!-- Slider
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/owl.theme.css" />

<!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/prettyPhoto.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/fonts/sns_fonts/iconfont.css" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-medkit"></i>  健康关爱平台</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">用户登录</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#works">加盟单位</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">联系我们</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>健康<span class="brand-heading">关爱平台</span></h1>
                        <p class="intro-text">珍惜生命，关爱健康</p>
                        <a href="#services" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Services Section -->
<div id="services" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>用户 <strong>登陆</strong></h2>
      <hr>
      </div>
    <div class="space"></div>
    <div class="row">
      <div class="col-md-4 col-sm-6 service"> <i class="fa fa-laptop" id="login1"></i>
        <h3><strong>管理员</strong></h3>
      </div>

      <div class="col-md-4 col-sm-6 service"> <i class="fa fa-user-md" id="login2"></i>
        <h4><strong>医师</strong></h4>
      </div>

      <div class="col-md-4 col-sm-6 service"> <i class="fa fa-plus-square" id="login3"></i>
        <h3><strong >患者</strong></h3>
      </div>

    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="works">
  <div class="container"> <!-- Container -->
    <div class="section-title text-center center">
      <h2>加盟 <strong>医院</strong></h2>
      <hr>
      <div class="clearfix"></div>
    </div>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">所有</a></li>
            <li><a href="#" data-filter=".hh1">三甲医院</a></li>
            <li><a href="#" data-filter=".hh2">二甲医院</a></li>
            <li><a href="#" data-filter=".hh3">中医院</a></li>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items" id="proitem">

        <div class="col-sm-6 col-md-3 col-lg-3 hh1">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href='http://www.layy.cn/' target='_blank' title="六安市人民医院">六安市人民医院</a></h4>
                <small>三级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/01.jpg" class="img-responsive" alt="六安市人民医院"></div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 hh2">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href="http://www.laey.net/" target='_blank' title="六安市第二人民医院">六安市第二人民医院</a></h4>
                <small>二级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/02.jpg" class="img-responsive" alt="六安市第二人民医院"></div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 hh1">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href="http://www.ay2fy.com/index.jsp" target='_blank' title="安徽医科大学第二附属医院">安徽医科大学第二附属医院</a></h4>
                <small>三级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/03.jpg" class="img-responsive" alt="安徽医科大学第二附属医院"></div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 hh1 hh3">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href='http://www.laszyy.cn/' target='_blank' title="六安市中医院">六安市中医院</h4>
                <small>三级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/04.jpg" class="img-responsive" alt="六安市中医院"></div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 hh2">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href='http://www.hqey.cn/' target='_blank' title="霍邱县第二人民医院 ">霍邱县第二人民医院 </a></h4>
                <small>二级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/05.jpg" class="img-responsive" alt="霍邱县第二人民医院 ">
			  </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 hh2">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href="http://www.ahlasy.cn/" target='_blank' title="六安市第四人民医院">六安市第四人民医院</a></h4>
                <small>二级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/06.jpg" class="img-responsive" alt="六安市第四人民医院"></div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 hh2">
          <div class="portfolio-item">
            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href="http://www.laslyy.com/" target='_blank' title="六安市立医院">六安市立医院</a></h4>
                <small>二级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i> </div>
              <img src="Public/proImages/hos_images/07.jpg" class="img-responsive" alt="六安市立医院"></div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 hh2">
          <div class="portfolio-item">

            <div class="hover-bg">
              <div class="hover-text">
                <h4><a href='http://www.ahscxyy.com/' target='_blank' title="舒城县人民医院">舒城县人民医院 </a></h4>
                <small>二级甲等</small>
                <div class="clearfix"></div>
                <i class="fa fa-search"></i>
				</div>
              <img src="Public/proImages/hos_images/08.jpg" class="img-responsive" alt="舒城县人民医院">
		    </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

	<div id="achivements" class="section dark-bg">
			<div class="container">	
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="achivement-box">
							<i class="fa fa-ambulance"></i>
							<span class="count"><?php echo ($count2); ?></span>
							<h4>已加盟医院</h4>
						</div>
					</div> 
					<div class="col-md-6 col-sm-6">
						<div class="achivement-box">
							<i class="fa fa-male"></i>
							<span class="count"><?php echo ($count1); ?></span>
							<h4>注册用户</h4>
						</div>
					</div>
				</div>
			</div>
		</div>


<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2><strong>和我们</strong> 联系</h2>
      <hr>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4"> <i class="fa fa-map-marker fa-2x"></i>
        <p>安徽省宣城市宣州区薰化路301号</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-envelope-o fa-2x"></i>
        <p>331674560@qq.com</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-phone fa-2x"></i>
        <p>13515638362</p>
      </div>
      <hr>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <hr>
      <h3>给我发邮件</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="姓名" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="邮箱" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="内容" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">确认发送</button>
      </form>
    </div>
  </div>
</div>
</div>
<nav id="footer">
  <div class="container">
    <div class="pull-left fnav">
      <p>Copyright &copy; 2016 作者：赵超逸
	 </p>
    </div>
  </div>
</nav>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/MyDemo/Public/js/bootstrap.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.isotope.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/jquery.counterup.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/waypoints.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/contact_me.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/login.js"></script>

<!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="/MyDemo/Public/js/main.js"></script>
    <script type="text/javascript" src="/MyDemo/Public/js/hosinfo.js"></script>
    <!--- 常量文件-->
    <script type="text/javascript" src="/MyDemo/Public/js/CONST.js"></script>
</body>
</html>