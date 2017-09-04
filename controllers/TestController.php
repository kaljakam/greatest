<?php

namespace app\controllers;

use app\models\DB\Test;
use yii\web\Controller;
use yii\web\HttpException;

class TestController extends Controller
{
  public function actionIndex() {
    $id = getVar('id');
    if (!$test = Test::findOne($id)) {
      throw new HttpException(404, 'page not found');
    }
    
    return $this->render('index', compact('test', 'id'));
  }
}