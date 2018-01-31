<?php
$this->breadcrumbs=array(
	'Photoses'=>array('index'),
	$model->photo_name=>array('view','id'=>$model->photo_name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Photos','url'=>array('index')),
	array('label'=>'Upload Photo','url'=>array('create')),
	array('label'=>'View Photos','url'=>array('view','id'=>$model->photo_name)),
	array('label'=>'Delete Photos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->photo_name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Photos','url'=>array('admin')),
);
?>

<h1>Update Photo <?php echo $model->photo_name; ?></h1>

<h4>Edit fields of photo, if not required then delete it.</h4>

<?php echo $this->renderPartial('_form2',array('model'=>$model)); ?>