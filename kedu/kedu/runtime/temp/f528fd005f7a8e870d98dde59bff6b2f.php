<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\xiaoshi\code\day09\xm\kedu\kedu\public/../application/admin\view\index\index.html";i:1524016643;s:78:"D:\xiaoshi\code\day09\xm\kedu\kedu\application\admin\view\template\layout.html";i:1524529658;s:76:"D:\xiaoshi\code\day09\xm\kedu\kedu\application\admin\view\template\menu.html";i:1524529726;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>后台管理</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/static/admin/ace1.4/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="/static/admin/ace1.4/assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="/static/admin/ace1.4/assets/js/html5shiv.min.js"></script>
        <script src="/static/admin/ace1.4/assets/js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="<?php echo url('Index/index'); ?>" class="navbar-brand">
                        <small>
                            <i class="fa fa-ra"></i>
                            后台管理
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                   

                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="/static/admin/ace1.4/assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo session('user_name'); ?>
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?php echo url('admin/public_edit_info'); ?>">
                                        <i class="ace-icon fa fa-user"></i>
                                        个人设置
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo url('login/logout'); ?>">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        退出
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo URL('Index/index'); ?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> HOME PAGE </span>
        </a>
        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 管理员管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="">
                    <i class="menu-icon fa fa-caret-right"></i>
                    管理员列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    管理员分组
                </a>
                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    权限管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    组权限管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
            <a href="<?php echo url('admin/info'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                操作日志
            </a>
            <b class="arrow"></b>
        </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 商品管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="<?php echo url('Goodsbrand/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    品牌管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('GoodsCategory/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    品类管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('Goods/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    单品管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('Recycler/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商品回收站
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商品列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商品属性
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 促销管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    活动管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('admin/info'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    自定义活动
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 客服管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="<?php echo url('UserComment/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    购买评论
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('UserAccount/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    账户信息
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    退换货申请
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    退款申请
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('UserFeedback/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    建议或投诉
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('UserAccount/recycle'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户账单回收站
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 订单管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="/admin/menu">
                    <i class="menu-icon fa fa-caret-right"></i>
                    订单列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    订单审核
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    订单录入
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    发货列表单
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    退货单申请
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 系统设置 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="/admin/menu">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商店设置
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    支付方式
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    配送方式
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    地区列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    友情链接
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    广告管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    授权证书
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    自定义导航栏
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 用户管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="<?php echo url('User/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    品类管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo url('UserGrade/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户等级
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户留言
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户浏览记录
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    用户购买记录
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 库存管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="/admin/menu">
                    <i class="menu-icon fa fa-caret-right"></i>
                    库存列表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    票据管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    出库管理
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    库存管理
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 报表管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="/admin/menu">
                    <i class="menu-icon fa fa-caret-right"></i>
                    搜索报表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    销售报表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    客服报表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    财务报表
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    仓储物流报表
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 财务管理 </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="/admin/menu">
                    <i class="menu-icon fa fa-caret-right"></i>
                    供应商结算
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    配送结算
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin/group">
                    <i class="menu-icon fa fa-caret-right"></i>
                    内部结算
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
</ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <i class="ace-icon fa fa-check green"></i>
                Welcome to
                <strong class="green">
                    KeDu
                    <small> (v1.0)</small>
                </strong>,
                欢迎进入科都商城后台页面！  .
            </div>

            <div class="row">
                <div class="space-6"></div>

                <div class="col-sm-7 infobox-container">
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-comments"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $comment; ?></span>
                            <div class="infobox-content">增加的评论数量</div>
                        </div>

                        <div class="stat stat-success"><?php echo $cper; ?>%</div>
                    </div>

                    <div class="infobox infobox-blue">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-twitter"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $user; ?></span>
                            <div class="infobox-content">注册用户</div>
                        </div>
                    </div>

                    <div class="infobox infobox-pink">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-shopping-cart"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $order; ?></span>
                            <div class="infobox-content">新生成的订单</div>
                        </div>
                        <div class="stat stat-success"><?php echo $oper; ?>%</div>
                    </div>

                    <div class="infobox infobox-red">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-flask"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $goods; ?></span>
                            <div class="infobox-content">商品数量</div>
                        </div>
                    </div>

                    <div class="infobox infobox-orange2">
                        <div class="infobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $brand; ?></span>
                            <div class="infobox-content">品牌数量</div>
                        </div>
                    </div>

                    <div class="infobox infobox-blue2">
                        <div class="infobox-progress">
                            <div class="easy-pie-chart percentage" data-percent="42" data-size="46">
                                <span class="percent">42</span>%
                            </div>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-text">traffic used</span>

                            <div class="infobox-content">
                                <span class="bigger-110"></span>
                                58GB remaining
                            </div>
                        </div>
                    </div>
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder"><a href="http://www.lv13992.cn" target="_blank">KeDu</a></span>
                             &copy; 2018-2018
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script  type="text/javascript" src="/static/admin/ace1.4/assets/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="/static/admin/ace1.4/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="/static/admin/ace1.4/assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <script src="/static/admin/ace1.4/assets/js/excanvas.min.js"></script>
        <![endif]-->
    

        <!-- ace scripts -->
        <script src="/static/admin/ace1.4/assets/js/ace-elements.min.js"></script>
        <script src="/static/admin/ace1.4/assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <link href="/static/admin/artDialog/dialog.css" rel="stylesheet" />
        <script src="/static/admin/artDialog/dialog.js"></script>
        <!--artDialog end-->
        
        
        <script>
                    var u = $(".active").parent('ul');
                    
                    var uc = u.attr("class");//
                   
                    if (uc == 'submenu') {
                       u.parent().attr("class", "open active");
                       if(u.parent().parent().attr('class')=='submenu'){
                           u.parent().parent().parent().attr("class","open active");
                       }
                    }

                    //弹出图片
                    function alert_img(url, width, heigth, title) {

                        art.dialog({
                            padding: 0,
                            title: title,
                            content: '<img src="' + url + '" width="' + width + '" height="' + heigth + '" />',
                            lock: true
                        });
                    }
                    //弹出确认操作
                    function alert_del(url, title) {
                        art.dialog({
                            lock: true,
                            background: '#300', // 背景色
                            opacity: 0.87, // 透明度
                            content: title,
                            ok: function () {
                                return window.location.href = url;
                            },
                            cancel: true
                        });
                    }
        </script>
    </body>
</html>
