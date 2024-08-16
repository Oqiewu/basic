<?php
use yii\helpers\Html;
?>
<table>
    <tr><td>ID</td><td><?= Html::encode($deal->id) ?></td></tr>
    <tr><td>Наименование</td><td><?= Html::encode($deal->name) ?></td></tr>
    <tr><td>Сумма</td><td><?= Html::encode($deal->amount) ?></td></tr>
    <tr><td>Контакт</td><td>
        <ul>
        <?php if ($contact = $deal->contact): ?>
            <?= Html::encode($contact->getFullName()) ?>
        <?php endif ?>
        </ul>
    </td></tr>
</table>
