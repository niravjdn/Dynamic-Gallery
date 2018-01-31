<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->photo_name),array('view','id'=>$data->photo_name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_title')); ?>:</b>
	<?php echo CHtml::encode($data->photo_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_desc')); ?>:</b>
	<?php echo CHtml::encode($data->photo_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_priority')); ?>:</b>
	<?php echo CHtml::encode($data->photo_priority); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('photo_category')); ?>:</b>
    <?php echo CHtml::encode($data->photo_category); ?>
    <br />

</div>
