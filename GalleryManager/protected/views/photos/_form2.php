<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->fileFieldRow($model,'photo_name',array('class'=>'span5','maxlength'=>50,'htmlOptions'=>'padding: 10px;')); ?>

	<p style="padding-bottom: 10px"></p>


	<?php echo $form->textFieldRow($model,'photo_name',array('class'=>'span5','maxlength'=>30,'readonly'=>'readonly')); ?>
	<?php echo $form->textFieldRow($model,'photo_title',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'photo_desc',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'photo_priority',array('class'=>'span5')); ?>

    <?php echo $form->dropDownListRow($model,'photo_category',
        CHtml::listData(Category::model()->findAll(), 'category_name', 'category_name')
    ); ?>

     <?php //echo $form->textFieldRow($model,'photo_category',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	<?php if($model->isNewRecord!='1'){ ?>
<div class="row">
     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/img/thumbs/'.$model->photo_name,"photo_name",array("width"=>200,"height"=>200)); ?>
</div>


<?php } $this->endWidget(); ?>
