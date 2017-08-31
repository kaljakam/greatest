<?php

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex($m = 'jghadlsglks afsgjlkhds h')
    {
      $n = 'sdgdg';
        return $this->render('index', compact('m', 'n'));
    }

}
