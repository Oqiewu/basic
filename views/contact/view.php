<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contact[] $contacts */

$this->title = $model->first_name . ' ' . $model->last_name;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы уверены, что хотите удалить этот контакт?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= Html::encode($model->id) ?></td>
    </tr>
    <tr>
        <th>Имя</th>
        <td><?= Html::encode($model->first_name) ?></td>
    </tr>
    <tr>
        <th>Фамилия</th>
        <td><?= Html::encode($model->last_name) ?></td>
    </tr>
</table>
