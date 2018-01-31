<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>''.CHtml::encode(Yii::app()->name),
)); ?>

<p></p>

<?php $this->endWidget(); ?>

<!--<p>You may change the content of this page by modifying the following two files:</p>-->

<ul>
    <li>Here you can add images and relaed info to be shown on on website according to your preferences.</li>
</ul>


