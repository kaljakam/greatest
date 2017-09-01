<?php

namespace app\controllers;

use yii\data\Pagination;
use yii\web\Controller;
use app\models\DB\Test;

class TestsController extends Controller
{
    public function actionIndex()
    {
      $query = Test::find()->select(['id', 'title', 'description'])->orderBy('id DESC');
      $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
      $tests = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('tests', 'pages'));
    }

}
