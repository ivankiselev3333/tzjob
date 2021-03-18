<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =  Yii::t('frontend',$this->title); 
$this->params['breadcrumbs'][] = Yii::t('frontend',$this->title);
?>
<div class="site-signup">

    <h2><?= Html::encode(Yii::t('frontend','Signup')) ?></h2>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?> 

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(Yii::t('frontend','имя'),['class'=>'label-class'])  ?>

         <?= $form->field($model, 'email')->label(Yii::t('frontend','почта'),['class'=>'label-class']) ?>

                <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('frontend','пароль'),['class'=>'label-class']) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('frontend','Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
