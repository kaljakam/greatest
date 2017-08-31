<?php
/* @var $this yii\web\View */

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?=$m?></h1>
<h2><?=$n?></h2>
<h3>Z nen</h3>
<? 
print_r($_GLOBALS);
?>
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
