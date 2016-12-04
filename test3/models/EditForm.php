<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class EditForm extends Model
{
    public $number;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
           
            ['number','match','pattern'=>'/^\d{6,10}$/','message'=>'Номер телефона должен быть не меньше 6 символов, и не больше 11'],
            // email has to be a valid email address
           
        ];
    }
}
