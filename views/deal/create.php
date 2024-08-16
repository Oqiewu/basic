<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Deal $model */
/** @var app\models\Contact[] $contacts */

$this->title = 'Создать сделку';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="deal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'contact_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($contacts, 'id', 'fullName'),
        ['prompt' => 'Выберите контакт']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
