<?php
/* @var $this DonoController */
/* @var $model Dono */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dono-cadastro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<h1><img src="http://graph.facebook.com/<?php echo $username?>/picture"></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_facebook'); ?>
		<?php echo $form->textField($model,'id_facebook'); ?>
		<?php echo $form->error($model,'id_facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm'); ?>
		<?php echo $form->textField($model,'nm'); ?>
		<?php echo $form->error($model,'nm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_email'); ?>
		<?php echo $form->textField($model,'nm_email'); ?>
		<?php echo $form->error($model,'nm_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_cidade'); ?>
		<?php echo $form->textField($model,'nm_cidade'); ?>
		<?php echo $form->error($model,'nm_cidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_estado'); ?>
		<?php echo $form->textField($model,'nm_estado'); ?>
		<?php echo $form->error($model,'nm_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dt_nascimento'); ?>
		<?php echo $form->textField($model,'dt_nascimento'); ?>
		<?php echo $form->error($model,'dt_nascimento'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->