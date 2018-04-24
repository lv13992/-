<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"D:\xiaoshi\code\day09\xm\kedu\kedu\public/../application/admin\view\user\save.html";i:1524538485;s:78:"D:\xiaoshi\code\day09\xm\kedu\kedu\application\admin\view\template\layout.html";i:1524529658;s:76:"D:\xiaoshi\code\day09\xm\kedu\kedu\application\admin\view\template\menu.html";i:1524537907;}*/ ?>
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
                <a href="<?php echo url('Goods/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商品列表
                </a>
                <b class="arrow"></b>
            </li>
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
                <a href="<?php echo url('Recycler/index'); ?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    商品回收站
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
    <div class="col-sm-6 pull-right">
        <button class="btn btn-sm btn-primary pull-right" onclick="javascript:window.location.href = '<?php echo url("User/index"); ?>'">
        返回列表
        <i class="icon-reply icon-only"></i>
        </button>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" action="<?php echo url('User/save'); ?>" method="post" name="myfrom" >
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">用户等级名</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="user_grade_id" />
                        <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $data['user_grade_id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['user_grade_id'])): ?>
                <label for="input-user_grade_id" class="text-danger"><?php echo $message['user_grade_id']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">用户名</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" name="name" value="<?php echo $data['name']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['name'])): ?>
                <label for="input-name" class="text-danger"><?php echo $message['name']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">用户真实名</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" name="user_name" value="<?php echo $data['user_name']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['user_name'])): ?>
                <label for="input-user_name" class="text-danger"><?php echo $message['user_name']; ?></label>
                <?php endif; ?>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right"> 密码 </label>

                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Password"  class="col-xs-10 col-sm-5" value="<?php echo $data['password']; ?>"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle"></span>
                        </span>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['password'])): ?>
                <label for="input-password" class="text-danger"><?php echo $message['password']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">身份证号</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" name="id_number" value="<?php echo $data['id_number']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['id_number'])): ?>
                <label for="input-id_number" class="text-danger"><?php echo $message['id_number']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">电话</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" name="tel" value="<?php echo $data['tel']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['tel'])): ?>
                <label for="input-tel" class="text-danger"><?php echo $message['tel']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">邮箱</label>
                    <div class="col-sm-9">
                        <input type="email" class="col-xs-10 col-sm-5" name="email" value="<?php echo $data['email']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['email'])): ?>
                <label for="input-tel" class="text-danger"><?php echo $message['email']; ?></label>
                <?php endif; ?>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">性别</label>
                    <div class="col-sm-9">
                        <input type="radio"  name="sex" value="0" checked />男
                        <input type="radio"  name="sex" value="1"<?php if($data['sex'] == 1): ?>checked<?php endif; ?>/>女
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['sex'])): ?>
                <label for="input-sex" class="text-danger"><?php echo $message['sex']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">密码问题</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5"  name="pw_question" value="<?php echo $data['pw_question']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['pw_question'])): ?>
                <label for="input-pw_question" class="text-danger"><?php echo $message['pw_question']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">密码答案</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5"   name="pw_answer" value="<?php echo $data['pw_answer']; ?>"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <?php if(isset($message['pw_answer'])): ?>
                <label for="input-pw_answer" class="text-danger"><?php echo $message['pw_answer']; ?></label>
                <?php endif; ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">省市区</label>
                    <select name="province" id="province" >>
                        <option value="0" selected>省份/直辖市</option>
                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['region_id']; ?>" <?php if($vo['region_id'] == $data['province']): ?>selected<?php endif; ?>><?php echo $vo['region_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <select name="city" id="city" >
                        <option value="0">市/县</option>
                        <?php if(is_array($city) || $city instanceof \think\Collection || $city instanceof \think\Paginator): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['region_id']; ?>" <?php if($vo['region_id'] == $data['city']): ?>selected<?php endif; ?>><?php echo $vo['region_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <select name="area" id="area">
                        <option value="0">镇/区</option>
                        <?php if(is_array($area) || $area instanceof \think\Collection || $area instanceof \think\Paginator): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['region_id']; ?>" <?php if($vo['region_id'] == $data['area']): ?>selected<?php endif; ?>><?php echo $vo['region_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </select>


                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">详细地址</label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-10 col-sm-5" name="addr" value="<?php echo $data['addr']; ?>"/>
                        </div>
                    </div>
                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button" onclick="myfrom.submit()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                提交
                            </button>
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script src="/static/admin/ace1.4/assets/js/jquery-2.1.4.min.js"></script>
<script>
    $(function () {
        $("#province").change(function () {
            $('#city option:gt(0)').remove();
            var data = {parent_id:$(this).val()};
            $.post("<?php echo url('user/city'); ?>",data,function (r) {
                for(var o in r){
                    $('#city').append('<option value="'+r[o].region_id+'">'+r[o].region_name+'</option>');
                }
            },'json')
        })
        $("#city").change(function () {
            $('#area option:gt(0)').remove();
            var data = {parent_id:$(this).val()};
            $.post("<?php echo url('user/area'); ?>",data,function (r) {
                console.log(r);
                for(var o in r){
                    $('#area').append('<option value="'+r[o].region_id+'">'+r[o].region_name+'</option>');
                }
            },'json')
        })

    })
</script>

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