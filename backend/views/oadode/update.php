<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Oadode */

$this->title = 'Edit Application: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oadodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="oadode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
