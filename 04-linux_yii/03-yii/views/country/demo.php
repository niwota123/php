<?php
use yii\widgets\ListView;
use yii\grid\GridView;
?>
<?= ListView::widget([
    'dataProvider' => $provider,
    'itemView' => '_d',
]);?>

<?= GridView::widget([
    'dataProvider' => $provider,
]);?>
