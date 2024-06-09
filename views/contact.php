<h1>Contact page</h1>

<?php
use app\core\Form\Form;

$form =  Form::begin('', 'post');?>

<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'subject'); ?>
<?php echo $form->textareaField($model, 'body'); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php $form->end(); ?>