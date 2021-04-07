<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%oadode}}`.
 */
class m210407_005245_add_lang_column_to_oadode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%oadode}}', 'lang', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%oadode}}', 'lang');
    }
}
