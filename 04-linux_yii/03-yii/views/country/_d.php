<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <table class="table table-bordered">
        <tr>
            <td><?= Html::encode($model->code) ?></td>
            <td><?= Html::encode($model->name) ?></td>
            <td><?= Html::encode($model->population) ?></td>
        </tr>
    </table>
</div>