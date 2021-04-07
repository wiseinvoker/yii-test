<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OadodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oadodemo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'application_id',
            'customer_id',
            'user_id',
            'legal_name',
            //'business_name',
            //'business_address',
            //'business_mailing_address',
            //'business_phone',
            //'business_fax',
            //'business_email:email',
            //'application_type',
            //'business_title',
            //'lang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
