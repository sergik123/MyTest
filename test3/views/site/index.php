<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <a href=""></a>
    <table border=1 >
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>Редактировать</th>
        <th>Номер телефона</th>
        <th>Удалить</th>
        <th>Добавить номер</th>
        <?php foreach ($model as $value): ?>

         <tr>
          <td>
          <?=$value['name'];?> 
         </td>
          <td>
            <?=$value['lastname'];?> 
         
          </td>
           <td>
             <?=$value['middlename'];?> 
          
          </td>
          <td>
       <a href="<?= Yii::$app->urlManager->createUrl(['site/edit','id'=>$value['id']]) ?>" >редактировать</a>
          </td>
          <td>
            <?php foreach ($number as $value1): ?>
            
              <?php if ($value1['id_numbers']==$value['id']):?>
                <?=$value1['numbers']?>
                 <a href="<?= Yii::$app->urlManager->createUrl(['site/change','id'=>$value1['id']]) ?>" >Изменить</a><br> 

              <?php endif ?>
            <?php endforeach ?>
             
          
         </td>

           
         <td>
         <a href="<?= Yii::$app->urlManager->createUrl(['site/delete','id'=>$value['id']]) ?>">удалить</a>
         </td>
           <td>
          <a href="<?= Yii::$app->urlManager->createUrl(['site/addnumber','id'=>$value['id']]) ?>">Добавить номер</a>
         </td>
          </tr>
        
        <?php endforeach;  ?>
       
        
    </table>
</div>
