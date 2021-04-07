<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Oadode */

$this->title = 'Create Application';
$this->params['breadcrumbs'][] = ['label' => 'Oadodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([ 'id' => 'ride-form', 'enableClientValidation'=>false,]); ?>
	<h4>A. BUSINESS INFORMATION(To be completed by Designated Official)</h4>
  <?php echo $form->field($model, 'legal_name')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_name')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_address')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_mailing_address')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_phone')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_fax')->textInput(array('class' => 'form-control')); ?>
	<?php echo $form->field($model, 'business_email')->textInput(array('class' => 'form-control')); ?>
  <h4>8. Description of the controlled goods the applicant may be required to examine, possess or transfer</h4>
  <h4>(Refer to the Export Control List(ECL))</h4>
	<div class="border-r-2 border-l-2 border-t-2 border-black">
    <table class="table-fixed">
      <thead>
        <tr>
          <th scope="col" class="col-md-1"></th>
          <th scope="col" class="text-center col-md-7">Description of Controlled Goods</th>
          <th scope="col" class="text-center col-md-2">ECL Group No.</th>
          <th scope="col" class="text-center col-md-2">ECL Item No.</th>
        </tr>
      </thead>
      <tbody class="table">
        <?php foreach ($goods as $index => $good) { ?>
            <tr>
              <th scope="row">
                <div class="form-group">
                  <span><?=$index+1?></span>
                </div>
              </th>
              <td>
                <?php echo $form->field($good, "[$index]description")->textInput(array('class' => 'form-control'))->label(false); ?>
              </td>
              <td>
                <?php echo $form->field($good, "[$index]ecl_group")->textInput(array('class' => 'form-control'))->label(false); ?>
              </td>
              <td>
                <?php echo $form->field($good, "[$index]ecl_item")->textInput(array('class' => 'form-control'))->label(false); ?>
              </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <h4>B. APPLICANT INFORMATION(To be completed by the applicant)</h4>
  <?php echo $form->field($model, 'application_type')->radioList(array(1 => 'New', 2 => 'Re-Assessment')); ?>
  <?php echo $form->field($model, 'business_title')->checkboxList([
                        'owner' => 'Owner',
                        'authorized_individual' => 'Authorized Individual',
                        'designated_official' => 'Designated Official',
                        'officer' => 'Officer',
                        'director' => 'Director',
                        'employee' => 'Employee'], 
                        ['separator' => '<br>']); ?>
  <?php echo $form->field($model, 'lang')->radioList(array(1 => 'English', 2 => 'French')); ?>
	<div class="form-actions">
		<?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
	</div>
<?php ActiveForm::end(); ?>
