<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contact[] $contacts */

$this->title = 'Контакты';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать контакт', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= Html::encode($contact->id) ?></td>
                <td><?= Html::encode($contact->first_name) ?></td>
                <td><?= Html::encode($contact->last_name) ?></td>
                <td>
                    <?= Html::a('Просмотр', ['view', 'id' => $contact->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Редактировать', ['update', 'id' => $contact->id], ['class' => 'btn btn-warning']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $contact->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить этот контакт?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
