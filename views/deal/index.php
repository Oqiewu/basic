<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deal[] $deal */

$this->title = 'Сделки';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать сделку', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Сумма</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($deals as $deal): ?>
            <tr>
                <td><?= Html::encode($deal->id) ?></td>
                <td><?= Html::encode($deal->name) ?></td>
                <td><?= Html::encode($deal->amount) ?></td>
                <td>
                    <?= Html::a('Просмотр', ['view', 'id' => $deal->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Редактировать', ['update', 'id' => $deal->id], ['class' => 'btn btn-warning']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $deal->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить эту сделку?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
