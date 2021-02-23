<?php header("Content-type: text/html; charset=utf-8");?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Language" content="ja" />
	<meta charset="utf-8">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- CSRF PREVENTION -->
	<meta name="csrf-token" content="<?php echo e(Session::token()); ?>">
	<!-- BEGIN PACE PLUGIN FILES -->
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/pace/themes/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css"/>
	<!-- END PACE PLUGIN FILES -->

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/uniform/css/uniform.default.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/select2/select2.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-select/bootstrap-select.css')); ?>"/>
	<?php /* <link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>"/> */ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')); ?>"/>
	<?php /* <link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-fixed-table/table-fixed-header.css')); ?>"/> */ ?>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet"/>

	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css')); ?>" rel="stylesheet"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css')); ?>" rel="stylesheet"/>

	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/clockface/css/clockface.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-tagsinput-latest/bootstrap-tagsinput.css')); ?>"/>

	<?php /* <link rel="stylesheet" type="text/css" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/typeahead/typeahead.css')); ?>"> */ ?>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/css/components-md.css')); ?>" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/css/plugins-md.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/css/layout.css')); ?>" rel="stylesheet" type="text/css"/>
	<?php /* <link id="style_color" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/css/themes/light.css')); ?>" rel="stylesheet" type="text/css"/> */ ?>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/css/themes/darkblue.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/css/custom.css')); ?>" rel="stylesheet" type="text/css"/>

	<?php echo $__env->yieldPushContent('css'); ?>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'favicon.ico')); ?>"/>
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content page-style-square page-container-bg-solid"><?php /* page-md page-header-fixed page-quick-sidebar-over-content page-full-width */ ?>
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="clearfix"></div>

	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<div class="page-content-wrapper">
			<?php echo $__env->yieldContent('content'); ?>
		</div>

	</div>

	<!-- BEGIN FOOTER -->
	<?php /* <div class="page-footer">
		<div class="page-footer-inner col-md-12 col-sm-12 col-xs-12">
			<center class="hidden-xs hidden-sm">ALL RIGHTS RESERVED PRICON MICROELECTRONICS, INC.</center>
			<center class="hidden-md hidden-lg hidden-xl" style="font-size:10px">ALL RIGHTS RESERVED PRICON MICROELECTRONICS, INC.</center>
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div> */ ?>
	<!-- END FOOTER -->

	<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				2017 &copy; PRICON MICROELECTRONICS, INC.
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
	<!-- END FOOTER -->

	<!-- Progress Bar -->
     <div id="progress" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-md gray-gallery">
               <div class="modal-content ">
                    <div class="modal-body">
                         <div id="progressbar" class="progress progress-striped active">
                              <div class="progress-bar progress-bar-success myprogress" id="progressbar-color" role="progressbar" style="width:0%"></div>
                         </div>
                         <div id="progress-msg"></div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" data-dismiss="modal" id="progress-close" class="btn btn-danger" disabled>Close</button>
                    </div>
               </div>
          </div>
     </div>

	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-migrate.min.js')); ?>" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-ui/jquery-ui.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
	<?php /* <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); ?>" type="text/javascript"></script> */ ?>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery.cokie.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/uniform/jquery.uniform.min.js')); ?>" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/select2/select2.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-alert/alert.js')); ?>"></script>
	<?php /* <script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>"></script> */ ?>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/fuelux/js/spinner.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-tagsinput-latest/bootstrap-tagsinput.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-filestyle/bootstrap-filestyle.min.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')); ?>"></script>

	<?php /* <script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-fixed-table/table-fixed-header.js')); ?>"></script> */ ?>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-select/bootstrap-select.js')); ?>"></script>

	<?php /* <script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/typeahead/handlebars.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/typeahead/typeahead.bundle.min.js')); ?>"></script> */ ?>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/ckeditor/ckeditor.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/clockface/js/clockface.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/icheck/icheck.min.js')); ?>"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/date.js')); ?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/metronic.js')); ?>" type="text/javascript"></script>
	<!-- <script src="public/assets/global/scripts/user.js" type="text/javascript"></script> -->
	<?php /* <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jstree/dist/jstree.min.js')); ?>"></script> */ ?>



	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/scripts/layout.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/layout/scripts/demo.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/pages/scripts/index.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/pages/scripts/table-managed.js')); ?>"></script>
	<?php /* <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/datetime.js')); ?>" type="text/javascript"></script> */ ?>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/pages/scripts/components-form-tools.js')); ?>"></script>
	// <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/pages/scripts/components-pickers.js')); ?>"></script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<!-- The basic File Upload plugin -->
	<?php /* <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js')); ?>"></script> */ ?>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/admin/pages/scripts/table-editable.js')); ?>"></script>
	<?php /* <script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/progressbar/dist/js/jquery.progresstimer.js')); ?>"></script> */ ?>

	<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/sorttable.js')); ?>"></script>

	<?php echo $__env->yieldPushContent('script'); ?>
	<!--DITO YUNG STACK SCRIPT-->

	<!-- END:File Upload Plugin JS files-->
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$(".alert").fadeTo(2000, 300).slideUp(300, function(){
				$(".alert").alert('close');
			});
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			//QuickSidebar.init(); // init quick sidebar
			Demo.init(); // init demo features
			TableManaged.init();
			ComponentsFormTools.init();
			ComponentsPickers.init();
			TableEditable.init();
			//FormFileUpload.init();
			//FormiCheck.init();
			// $('select').selectpicker();
			$('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true,
                dateFormat: 'yyyy-mm-dd'
            });
		});
		// window.onload = date_time('date_time');
		// window.onload = load;
	</script>
	<?php if(Session::has('partStartPO')): ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#confirm').modal('show');
			});
		</script>
	<?php endif; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
