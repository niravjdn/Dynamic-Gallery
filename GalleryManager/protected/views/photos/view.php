<?php

$path = Yii::app()->basePath;
$path = substr($path,0,strlen($path)-10);
$id = $_GET['id'];
$deleted=0;
if(!file_exists($path.'/img/'.$id) ){
    $this->loadModel($id)->delete();
    unlink($path.'/img/'.$id);
    $deleted = 1;
   // echo "not found";
}

$this->breadcrumbs=array(
	'Photoses'=>array('index'),
	$model->photo_name,
);

$this->menu=array(
	array('label'=>'List Photos','url'=>array('index')),
	array('label'=>'Upload Photo','url'=>array('create')),
	array('label'=>'Update Photos','url'=>array('update','id'=>$model->photo_name)),
	array('label'=>'Delete Photos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->photo_name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Photos','url'=>array('admin')),
);
?>

<h1>View Photo #<?php echo $model->photo_name; ?></h1>

<?php if($deleted==1) { ?>}
<div class="alert alert-danger">
  <strong>Error!</strong> File was not uploaded successfully. <br> You will be redirected in 3 seconds.
</div>
<script>setTimeout(function(){window.location.href='<?php echo $this->createUrl('Photos/create');?>'},3000);</script>
<?php } ?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'photo_name',
		'photo_title',
		'photo_desc',
		'photo_priority',
        'photo_category',
	),
)); ?>

