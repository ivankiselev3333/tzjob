<?php

namespace frontend\controllers;

use frontend\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'frontend\models\user';
}
