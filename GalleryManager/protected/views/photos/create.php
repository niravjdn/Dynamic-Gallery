<?php
$this->breadcrumbs=array(
	'Photoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Photos','url'=>array('index')),
	array('label'=>'Manage Photos','url'=>array('admin')),
);
?>

<h1>Upload Photos</h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable" >
      
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>   
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="alert alert-danger alert-dismissable"  >
      
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>   

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>