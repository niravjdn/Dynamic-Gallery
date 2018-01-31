<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'photo_name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'photo_title',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'photo_desc',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'photo_priority',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'photo_category',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
