<?php
$this->breadcrumbs=array(
	'Photoses',
);

$this->menu=array(
	array('label'=>'Upload Photo','url'=>array('create')),
	array('label'=>'Manage Photos','url'=>array('admin')),
);
?>

<h1>Photos</h1>

<?php

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'photos-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'photo_name',
		'photo_title',
		'photo_desc',
		'photo_priority',
        'photo_category',
		
	),
));

/*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
