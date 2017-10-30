<?php $this->beginContent('@app/views/layouts/main.php'); ?>



    <?= $this->blocks['block1'] ?>

    <?= $this->blocks['block3'] ?>


        <h1>Hello</h1>
        <?= $content ?>

<?php $this->endContent(); ?>