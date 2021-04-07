<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Oadode */

$this->title = 'Create Application';
$this->params['breadcrumbs'][] = ['label' => 'Oadodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oadode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
