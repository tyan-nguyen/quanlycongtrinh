<?php
/**
 * Configuration file for 'yii message/extract' command.
 *
 * This file is automatically generated by 'yii message/config' command.
 * It contains parameters for source code messages extraction.
 * You may modify this file to suit your needs.
 *
 * You can use 'yii message/config-template' command to create
 * template configuration file with detailed description for each parameter.
 * 
 * run: ./yii message/extract @app/config/i18n.php
 */
return [
    
    // string, required, root directory of all source files
    'sourcePath' => __DIR__. DIRECTORY_SEPARATOR .'..',
    // Root directory containing message translations.
    'messagePath' => __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR . 'messages',
    // array, required, list of language codes that the extracted messages
    // should be translated to. For example, ['zh-CN', 'de'].
    'languages' => ['en','vi','khmer'],
    
    'color' => null,
    'interactive' => true,
    'help' => false,
    'silentExitOnException' => null,
    //'sourcePath' => '@yii',
   // 'messagePath' => '@yii/messages',
    //'languages' => [],
    'translator' => [
        'Yii::t',
        '\\Yii::t',
    ],
    'sort' => false,
    'overwrite' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.*',
        '/.*',
        '/messages',
        '/tests',
        '/runtime',
        '/vendor',
        '/BaseYii.php',
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'php',
    'db' => 'db',
    'sourceMessageTable' => '{{%source_message}}',
    'messageTable' => '{{%message}}',
    'catalog' => 'messages',
    'ignoreCategories' => [],
    'phpFileHeader' => '',
    'phpDocBlock' => null,
];
