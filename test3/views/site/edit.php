<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-edit">
    <h1><?= Html::encode($this->title) ?></h1>
  
   <?php $form = ActiveForm::begin(['id' => 'editform']); ?>

                    <?= $form->field($userselected, 'name')->textInput()->label('Имя'); ?>

                    <?= $form->field($userselected, 'lastname')->textInput()->label('Фамилия'); ?>

                    <?= $form->field($userselected, 'middlename')->textInput()->label('Отчество'); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Редактировать контакт', ['class' => 'btn btn-primary', 'name' => 'editbutton']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
</div>