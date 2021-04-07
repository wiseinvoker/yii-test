<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oadode".
 *
 * @property int $id
 * @property int|null $application_id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property string|null $legal_name
 * @property string|null $business_name
 * @property string|null $business_address
 * @property string|null $business_mailing_address
 * @property string|null $business_phone
 * @property string|null $business_fax
 * @property string|null $business_email
 * @property int|null $application_type
 * @property string|null $business_title
 * @property int|null $lang
 */
class Oadode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oadode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['legal_name', 'business_name', 'business_address', 'business_mailing_address', 'business_phone', 'business_email', 'business_title', 'application_id', 'customer_id', 'user_id', 'application_type', 'lang'], 'required'],
            [['application_id', 'customer_id', 'user_id', 'application_type', 'lang'], 'integer'],
            [['legal_name', 'business_name', 'business_address', 'business_mailing_address', 'business_phone', 'business_fax', 'business_email'], 'string', 'max' => 255],
            ['business_title', 'checkTitles'],
        ];
    }

    public function checkTitles($attribute, $params)
    {
        if ($this->business_title) {
            $titles = explode(',', $this->business_title);
            if (in_array('officer', $titles) && in_array('director', $titles)) {
                $this->addError($attribute, 'Provided titles are not valid.');
            } else if (in_array('director', $titles) && in_array('employee', $titles)) {
                $this->addError($attribute, 'Provided titles are not valid.');
            }
        } else {
            $this->addError($attribute, 'Provided titles are not valid.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'customer_id' => 'Customer ID',
            'user_id' => 'User ID',
            'legal_name' => '1. Legal Name',
            'business_name' => '2. Business Name (if different from legal name)',
            'business_address' => '3. Civic Address',
            'business_mailing_address' => '4. Business Mailing Address (if different from civic address)',
            'business_phone' => '5. Business Phone',
            'business_fax' => '6. Business Fax',
            'business_email' => '7. Business Email',
            'application_type' => '9. Type of Application',
            'business_title' => '10. Business Title (Select all that apply)',
            'lang' => '11. Preferred Language of Correspondence',
        ];
    }
}
