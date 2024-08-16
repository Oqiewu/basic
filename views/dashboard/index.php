<?php
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var app\models\Contact[] $contacts */
/** @var app\models\Deal[] $deals */
/** @var string $selectedType */
/** @var app\models\Contact|app\models\Deal|null $selectedItem */

$this->title = 'Dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            vertical-align: top;
        }
        .selected {
            background-color: yellow;
        }
        .btn {
            cursor: pointer;
            display: block;
            margin: 5px 0;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td id="menu">
                <div class="btn <?= $selectedType === 'contact' ? 'selected' : '' ?>" onclick="changeView('contact')">Контакты</div>
                <div class="btn <?= $selectedType === 'deal' ? 'selected' : '' ?>" onclick="changeView('deal')">Сделки</div>
            </td>
            <td id="list">
                <?php if ($selectedType === 'contact'): ?>
                    <?php foreach ($contacts as $contact): ?>
                        <div class="btn list-item <?= $selectedItem && $selectedItem->id === $contact->id ? 'selected' : '' ?>" data-id="<?= $contact->id ?>" data-type="contact">
                            <?= Html::encode($contact->getFullName()) ?>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($selectedType === 'deal'): ?>
                    <?php foreach ($deals as $deal): ?>
                        <div class="btn list-item <?= $selectedItem && $selectedItem->id === $deal->id ? 'selected' : '' ?>" data-id="<?= $deal->id ?>" data-type="deal">
                            <?= Html::encode('Сделка #' . $deal->id) ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
            <td id="content">
                <?php if ($selectedItem): ?>
                    <?php if ($selectedType === 'contact'): ?>
                        <table>
                            <tr><td>Имя</td><td><?= Html::encode($selectedItem->getFirstName()) ?></td></tr>
                            <tr><td>Фамилия</td><td><?= Html::encode($selectedItem->getLastName()) ?></td></tr>
                            <tr><td>Сделки</td><td>
                                <ul>
                                    <?php foreach ($selectedItem->deals as $deal): ?>
                                        <li>Сделка #<?= Html::encode($deal->id) ?> - <?= Html::encode($deal->amount) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td></tr>
                        </table>
                    <?php elseif ($selectedType === 'deal'): ?>
                        <table>
                            <tr><td>ID</td><td><?= Html::encode($selectedItem->id) ?></td></tr>
                            <tr><td>Наименование</td><td><?= Html::encode($selectedItem->name) ?></td></tr>
                            <tr><td>Сумма</td><td><?= Html::encode($selectedItem->amount) ?></td></tr>
                            <tr><td>Контакты</td><td>
                                <ul>
                                    <?php foreach ($selectedItem->contacts as $contact): ?>
                                        <li><?= Html::encode($contact->getFullName()) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td></tr>
                        </table>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Выберите элемент из списка.</p>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateContent(html) {
                document.querySelector('#content').innerHTML = html;
            }

            function addListItemListeners() {
                const listItems = document.querySelectorAll('.list-item');
                listItems.forEach(function(item) {
                    item.addEventListener('click', function() {
                        listItems.forEach(function(el) {
                            el.classList.remove('selected');
                        });
                        this.classList.add('selected');

                        const id = this.getAttribute('data-id');
                        const type = this.getAttribute('data-type');
                        
                        const url = `/dashboard/get-content?id=${id}&type=${type}`;
                        fetch(url)
                            .then(response => response.text())
                            .then(html => {
                                updateContent(html);
                            });
                    });
                });
            }

            window.changeView = function(type) {
                const url = `/dashboard/index?type=${type}`;
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        const newContent = new DOMParser().parseFromString(html, 'text/html');
                        document.querySelector('#menu').innerHTML = newContent.querySelector('#menu').innerHTML;
                        document.querySelector('#list').innerHTML = newContent.querySelector('#list').innerHTML;
                        document.querySelector('#content').innerHTML = newContent.querySelector('#content').innerHTML;
                        addListItemListeners();
                    });
            }

            addListItemListeners();
        });
    </script>
</body>
</html>
