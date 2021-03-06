<?php 
use yii\helpers\Html;
use backend\components\TimeLine;

$session = \Yii::$app->session;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?= Html::encode(\Yii::$app->params['backend_assets']).'css/admin/'; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= Html::encode(\Yii::$app->params['backend_assets']).'css/admin/'; ?>AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= Html::encode(\Yii::$app->params['backend_assets']).'css/admin/'; ?>skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery 2.1.4 -->
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'plugins/' ?>jQuery-2.1.4.min.js"></script>
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'js/plugins/'; ?>jquery.validate.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'js/admin/' ?>app.js" type="text/javascript"></script>
    <style>
      td{
        text-align:center;
      }
      .post_td{
        text-align: left;
      }
      th{
        background: #ecf0f5;
      }
      .box-extra{
        height: 62px;
      }
      .self_border td{
        border:solid 1px #59a4d5;
      }
      #coach_form{
        width: 600px;
      }
      .coach_form{
        display: inline;
      }
      .table_box{
        width: 75%;
      }
      .business_list_th{
        color: white;
        font-weight: bold;
      }
      .business_table_td{
        text-align: center;
        background: #51a7d8;
        color: white;
        font-weight: bold;
      }
      .business_table_td2{
        text-align: left;
      }
      .applicants_table{
        margin: auto;
      }
      .recommend{
        background: #dff0d8;
      }
      .test{
        border-top: 1px solid #f4f4f4;
        border-bottom: 1px solid #f4f4f4;
        border-left: 5px solid #367fa9;
        padding: 10px;
        color: #444;
      }
      .timeline_item{
        width: 65%;
      }
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
      .leaveword_select{
        display: inline;
        width: 20%;
      }
      .business-create-form label {
        display: none;
      }
      .form-group.field-business-business_number {
        display: inline;
      }
      .business-create-label {
        margin-bottom: 2px;
      }

      .field-leaveword-to_uid {
        display: inline;
      }
      .field-leaveword-content label,.field-leaveword-to_uid label,
      .field-leaveword-handle_remarks label {
        display: none;
      }
      .field-leaveword-to_uid select{
        width: 20%;
        display: inline;
      }
    </style>
  </head>

  <body class="skin-blue sidebar-mini">
  <?php $this->beginBody() ?>
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Q</b>GZX</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>家教网</b>后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- 留言模块开始 -->
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?= $this->params['leavewords_count'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">
                    <?php if($this->params['leavewords_count'] != 0): ?>
                      目前有<span class="label label-success"><?= $this->params['leavewords_count'] ?></span>条未处理的留言
                    <?php else: ?>
                      目前没有需要处理的留言
                    <?php endif; ?>
                  </li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                      <!-- 留言item开始 -->
                      <?php foreach($this->params['leavewords'] as $leaveword): ?>
                      <li><!-- start message -->
                        <a href="<?= \Yii::$app->urlManager->createUrl(['leaveword-admin/handle', 'id'=>$leaveword->id]) ?>">
                          <div class="pull-left">
                            <img src="<?= Html::encode(\Yii::$app->params['backend_assets'].'images/head_images/'.$leaveword->from->head_image) ?>" class="img-circle" alt="User Image" />
                          </div>
                          <h4>
                            <?= $leaveword->from->username." <span class='text-success'><b>To</b></span> ".$leaveword->to->username ?>
                            <small><i class="fa fa-clock-o"></i><?= ' '.(new TimeLine($leaveword->leave_time))->handle(); ?></small>
                          </h4>
                          <p><?= Html::encode($leaveword->content) ?></p>
                        </a>
                      </li><!-- end message -->
                      <?php endforeach; ?>
                      <!-- 留言item结束 -->
                     
                    </ul>
                  </li>
                  <li class="footer"><?= Html::a('查看所有留言',['leaveword-admin/index'],['class' => 'btn btn-default btn-lg']) ?></li>
                </ul>
              </li>
              <!-- 留言模块结束 -->

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?= $this->params['businesses_count'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">
                    <span class="label label-warning"><?= $this->params['businesses_count'] ?></span>份未处理业务
                  </li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php foreach($this->params['businesses'] as $business): ?>
                        <li>
                          <a href="<?= \Yii::$app->urlManager->createUrl(['business-admin/view','id'=>$business->id]) ?>">
                            <i class="fa fa-users text-aqua"></i> <?= Html::encode($business->business_number.'（登记人:'.$business->admin->username.'）') ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                      <!-- <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li> -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">查看全部</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <!-- <span class="label label-danger">9</span> -->
                </a>
                <ul class="dropdown-menu">
                  <li class="header">信息统计</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= Html::encode(\Yii::$app->params['backend_assets']).'images/admin/' ?>user2-160x160.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?= Html::encode($session['username']) ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= Html::encode(\Yii::$app->params['backend_assets']).'images/admin/' ?>user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">个人信息</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= \Yii::$app->urlManager->createUrl(['admin/logout']) ?>" class="btn btn-default btn-flat">退出登录</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= Html::encode(\Yii::$app->params['backend_assets']).'images/head_images/'.Html::encode($session['head_image']) ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?= Html::encode($session['username']); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>  

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>网站建设</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['site-admin/base']) ?>"><i class="fa fa-circle-o"></i> 基本信息</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> 轮显图片</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> 友情链接</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-mortar-board"></i>
                <span>家教管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['coach-admin/create']) ?>"><i class="fa fa-circle-o"></i> 发布家教</a></li>
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['coach-admin/admin']) ?>"><i class="fa fa-circle-o"></i> 家教管理</a></li>
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['business-admin/create']) ?>"><i class="fa fa-circle-o"></i> 业务登记</a></li>
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['business-admin/index']) ?>"><i class="fa fa-circle-o"></i> 业务管理</a></li>
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['business-admin/pending']) ?>"><i class="fa fa-circle-o"></i> 待处理业务</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-cny"></i>
                <span>兼职管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> 发布兼职</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> 兼职管理</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> 业务登记</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> 业务管理</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> 待处理业务</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>教员管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= \Yii::$app->urlManager->createUrl(['teacher-admin/index']) ?>"><i class="fa fa-circle-o"></i> 教员库</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> 教员搜索</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-comments"></i> <span>交接班留言</span>
                <small class="label bg-blue">12</small>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= \yii::$app->urlManager->createUrl(['leaveword-admin/add']) ?>"><i class="fa fa-circle-o"></i> 添加留言</a></li>
                <li><a href="<?= \yii::$app->urlManager->createUrl(['leaveword-admin/index']) ?>"><i class="fa fa-circle-o"></i> 留言管理</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>新闻动态</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> 发布新闻</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> 新闻管理</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-question-circle"></i> <span>常见问题</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> 添加问题</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> 问题管理</a></li>
              </ul>
            </li>

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
        
        <!-- ====================================================== -->

        <?= $content ?>

        <!-- ====================================================== -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'js/admin/' ?>bootstrap.min.js" type="text/javascript"></script>
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'js/admin/' ?>pages/dashboard.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= Html::encode(\Yii::$app->params['backend_assets']).'js/admin/' ?>demo.js" type="text/javascript"></script>
  

<?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
