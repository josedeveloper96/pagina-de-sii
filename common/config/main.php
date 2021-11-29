<?php
return [
     'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            //'uploadDir' => \Yii::$app->basePath.'/web/uploads',
            //'uploadUrl' => \Yii::$app->request->BaseUrl.'/uploads',
            //'imageAllowExtensions'=>['jpg','png','gif']
        ],
        'pdfjs' => [
       'class' => '\yii2assets\pdfjs\Module',
        ],
    ],


    'language' => 'es', // Set the language here
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
