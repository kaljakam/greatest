<?php

$params = require( __DIR__ . '/params.php' );
$db = require( __DIR__ . '/db.php' );

$config = [
  'id'           => 'basic',
  'basePath'     => dirname(__DIR__),
  'bootstrap'    => [ 'log' ],
  'defaultRoute' => 'tests/index',
  'language' => 'ru',
  'modules' => [
      'admin' => [
          'class' => 'app\modules\admin\Admin',
          'layout' => 'admin.php',
      ],
      'rbac' => [
          'class' => 'mdm\admin\Module',
          'controllerMap' => [
              'assignment' => [
                  'class' => 'mdm\admin\controllers\AssignmentController',
                  /* 'userClassName' => 'app\models\User', */
                  'idField' => 'id',
                  'usernameField' => 'username',
              ],
          ],
          'layout' => 'left-menu',
          'menus' => [
              'assignment' => [
                  'label' => 'Grant Access' // change label
              ],
              'route' => null, // disable menu
          ],
      ]

  ],
  'components'   => [
      'authManager' => [
          'class'           => 'yii\rbac\DbManager',
//          'itemTable'       => 'auth_item',
//          'itemChildTable'  => 'auth_item_child',
//          'assignmentTable' => 'auth_assignment',
//          'ruleTable'       => 'auth_rule',
//          'defaultRoles'    => ['guest'],// роль которая назначается всем пользователям по умолчанию
      ],
    'request'      => [
      'cookieValidationKey' => 'K:JHNfg4hkjhz+Oof09fuSH/FoU3.ZSf',
      'baseUrl'             => '',
    ],
    'cache'        => [
      'class' => 'yii\caching\FileCache',
    ],
    'user'         => [
        'identityClass' => 'mdm\admin\models\User',
        'loginUrl' => ['rbac/user/login'],
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'mailer'       => [
      'class'            => 'yii\swiftmailer\Mailer',
      // send all mails to a file by default. You have to set
      // 'useFileTransport' to false and configure a transport
      // for the mailer to send real emails.
      'useFileTransport' => true,
    ],
    'log'          => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets'    => [
        [
          'class'  => 'yii\log\FileTarget',
          'levels' => [ 'error', 'warning' ],
        ],
      ],
    ],
    'db'           => $db,
    'urlManager'   => [
      'enablePrettyUrl' => true,
      'showScriptName'  => false,
      'rules'           => [
        //              'test/<id:\d+>' => 'test/test',
        'tests/page/<page:\d+>' => 'tests/index',
        'tests'                 => 'tests/index',
        'test/<id:\d+>'         => 'test/index',
        'admin/'                => 'admin/tests/index',
      ],
    ],

  ],
  'as access' => [
      'class' => 'mdm\admin\components\AccessControl',
      'allowActions' => [
          'admin/*', // add or remove allowed actions to this list
          'rbac/*', // add or remove allowed actions to this list
          'site/*', // add or remove allowed actions to this list
          'test/*', // add or remove allowed actions to this list
      ]
  ],
  'params'       => $params,
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
  ];
  
  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
  ];
}

return $config;
