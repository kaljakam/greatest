<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DB\TestQuestion */

$this->title = 'Create Test Question';
$this->params['breadcrumbs'][] = ['label' => 'Test Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
