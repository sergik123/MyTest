<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Изменить телефон';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-edit">
    <h1><?= Html::encode($this->title) ?></h1>
  
   <?php $form = ActiveForm::begin(['id' => 'changeform']); ?>

                    <?= $form->field($numberselected, 'number')->textInput()->label('Телефон'); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Редактировать телефон', ['class' => 'btn btn-primary', 'name' => 'editbutton']) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Удалить телефон', ['class' => 'btn btn-primary', 'name' => 'deletebutton']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
</div>