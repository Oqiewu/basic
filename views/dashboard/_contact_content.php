<?php
use yii\helpers\Html;
?>
<table>
    <tr><td>Имя</td><td><?= Html::encode($contact->getFirstName()) ?></td></tr>
    <tr><td>Фамилия</td><td><?= Html::encode($contact->getLastName()) ?></td></tr>
    <tr><td>Сделки</td><td>
        <ul>
            <?php foreach ($contact->deals as $deal): ?>
                <li>Сделка #<?= Html::encode($deal->id) ?> - Сумма: <?= Html::encode($deal->amount) ?></li>
            <?php endforeach; ?>
        </ul>
    </td></tr>
</table>
