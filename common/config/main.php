<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
    ],
    'modules' => [
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
             'viewPath'=>'@app/views/mimin',
            'layoutPath'=>'@app/views/layout',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ]
    ],
        /*
         * Kalau mau migrasi, di-comment bagian ini.
         *      */
//    'as access' => [
//     'class' => '\hscstudio\mimin\components\AccessControl',
//	 'allowActions' => [
//		// add wildcard allowed action here!
//		'site/*',
//		'debug/*',
//		'mimin/*', // only in dev mode
//	],
//],
];
