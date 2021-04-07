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
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],
            ['description', 'match', 'pattern' => '/^[A-Za-z\s]{2,}$/i', 'message' => 'Only letters and space are allowed'],
            ['ecl_group', 'match', 'pattern' => '/^[0-9]+[0-9\.\,]{1,}$/i', 'message' => 'Only numbers and dot, comma allowed'],
            ['ecl_item', 'match', 'pattern' => '/^[0-9]+[0-9\.\,]{1,}$/i', 'message' => 'Only numbers and dot, comma allowed'],
            ['description', 'required', 'when' => function($model) {
                return empty($model->ecl_group) && empty($model->ecl_item);
            }, 'message' => 'At least one field is required'],
            ['ecl_group', 'required', 'when' => function($model) {
                return empty($model->description) && empty($model->ecl_item);
            }, 'message' => 'At least one field is required'],
            ['ecl_item', 'required', 'when' => function($model) {
                return empty($model->ecl_group) && empty($model->description);
            }, 'message' => 'At least one field is required'],
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
