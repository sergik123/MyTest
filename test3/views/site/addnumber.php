<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Изменить телефон';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($error){ ?>
    <h2>Вы уже добавили 10 номеров. Больше добавить нельзя.</h2>
    
<?php } else {?>
<div class="site-add">
    <h1><?= Html::encode($this->title) ?></h1>
  
   <?php $form = ActiveForm::begin(['id' => 'addform']); ?>

                    <?= $form->field($addnumber, 'number')->textInput()->label('Телефон'); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить телефон', ['class' => 'btn btn-primary', 'name' => 'addbutton']) ?>
                    </div>
                   
                <?php ActiveForm::end(); ?>
</div>
<?php }; ?>