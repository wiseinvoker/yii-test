<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "description_of_goods".
 *
 * @property integer $id
 * @property integer $application_id
 * @property integer $customer_id
 * @property integer $user_id
 * @property string  $description
 * @property string  $ecl_group
 * @property string  $ecl_item
 */
class GoodsDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'description_of_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application_id', 'customer_id', 'user_id', 'ecl_group', 'ecl_item'], 'required'],
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'customer_id' => 'Customer ID',
            'user_id' => 'User ID',
            'description' => 'Description',
            'ecl_group' => 'ECL Group',
            'ecl_item' => 'ECL Item',
        ];
    }
}
