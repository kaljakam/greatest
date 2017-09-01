<?php
/* @var $this yii\web\View */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?=$this->title?></h1>
<?php if(!empty($tests)) { ?>
  <div class="panel-group" id="accordion">
    <?php foreach($tests as $k_test => $test){ ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$k_test?>">
              <?=$test['title']?>
            </a>
            <a href="<?=\yii\helpers\Url::to(['test/index', 'id' => $test['id']])?>">>>></a>
          </h4>
        </div>
        <div id="collapse<?=$k_test?>" class="panel-collapse collapse">
          <div class="panel-body">
            <?=$test['description']?>
          </div>
        </div>
      </div>
      <?php } ?>
  </div>
<?php } ?>
<?= \yii\widgets\LinkPager::widget(['pagination' => $pages])?>

