<?php
use yii\widgets\DetailView;
?>

<?php
use yii\jui\DatePicker;
?>
<?= DatePicker::widget(['name' => 'date']); ?>



<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',               // title attribute (in plain text)
        'age',    // description attribute formatted as HTML
        [                      // the owner name of the model
            'label' => 'Owner-name',
            'value' => $model->owner->name,
        ],

    ],
]);?>

<h1>我是红色吗</h1>


