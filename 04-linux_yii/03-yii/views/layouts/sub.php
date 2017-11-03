<?php $this->beginContent('@app/views/layouts/main.php'); ?>



    <?= $this->blocks['block1'] ?>

    <?= $this->blocks['block3'] ?>

        <?= $content ?>

<?php $this->endContent(); ?>