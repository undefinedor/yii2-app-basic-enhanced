<?php

echo  $this->render('_dropForeignKeys', [
    'table' => $table,
    'foreignKeys' => $foreignKeys,
]);

foreach ($fields as $field): ?>
        $this->dropColumn(static::TABLE_NAME, '<?= $field['property'] ?>');
<?php endforeach;
