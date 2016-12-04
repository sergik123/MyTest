<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($success):?>
    <h3>Контакт успешно добавлен в базу</h3>
<?php endif; ?>
<div class="site-add">
    <h1><?= Html::encode($this->title) ?></h1>
  
   <?php $form = ActiveForm::begin(['id' => 'add-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->textInput()->label('Имя'); ?>

                    <?= $form->field($model, 'lastname')->textInput()->label('Фамилия'); ?>

                    <?= $form->field($model, 'middlename')->textInput()->label('Отчество'); ?>

                    <?= $form->field($model, 'number')->textInput()->label('Номер телефона');?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить контакт', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div>