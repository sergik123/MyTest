<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AddUserForm extends Model
{
    public $name;
    public $lastname;
    public $middlename;
    public $number;

    public $id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
        [['name'], 'required','message'=>'Поле обязательно к заполнению'],
            ['name','match','pattern'=>'/^[A-zА-я\s]+$/u','message'=>'Поле должно содержать только буквы'],
             ['middlename','match','pattern'=>'/^[A-zА-я\s]+$/u','message'=>'Поле должно содержать только буквы'],
             ['lastname','match','pattern'=>'/^[A-zА-я\s]+$/u','message'=>'Поле должно содержать только буквы'],
            ['number','match','pattern'=>'/^\d{6,10}$/','message'=>'Номер телефона должен быть не меньше 6 символов, и не больше 11'],
            // email has to be a valid email address
           
        ];
    }
}
