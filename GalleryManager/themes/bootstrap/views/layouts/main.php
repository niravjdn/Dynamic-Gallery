<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<?php echo Yii::app()->bootstrap->init();?>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->bootstrap->registerAllCss(); ?>
</head>

<body>

<?php
$this->widget('bootstrap.widgets.TbNavbar',array(
    'collapse' => true,
    'htmlOptions' => array('style' => 'position:absolute', 'class'=>"navbar-inverse"),
    'items'=>array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',

            'type' => 'navbar',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                //array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Manage Category', 'url'=>array('/category/'),'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Manage Gallary', 'url'=>array('/photos/'),'visible'=>!Yii::app()->user->isGuest),
                
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),

                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

              
                
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
<br>
	<div id="footer" class="footer" align="center">
		Copyright &copy; <?php date_default_timezone_set("Asia/Kolkata"); echo date('Y'); ?> by Nirav Patel.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

<style>
    #footer-comment{
        position:fixed;
        height:50px;
        bottom:0px;
        left:0px;
        right:0px;
        margin-bottom:20px;
    }
    body{
        margin-bottom:50px;
    }
</style>
</body>

</html>
