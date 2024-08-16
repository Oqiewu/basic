<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deal $model */

$this->title = $model->name;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы уверены, что хотите удалить эту сделку?',
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
        <th>Наименование</th>
        <td><?= Html::encode($model->name) ?></td>
    </tr>
    <tr>
        <th>Сумма</th>
        <td><?= Html::encode($model->amount) ?></td>
    </tr>
    <tr>
        <th>Контакт</th>
        <td>
            <?php if ($model->contact): ?>
                <?= Html::encode($model->contact->getFullName()) ?>
            <?php else: ?>
                Не указан
            <?php endif; ?>
        </td>
    </tr>
</table>
