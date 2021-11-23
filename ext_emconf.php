<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'ClubCMS Package',
    'description' => 'Distribution package for a ready to use website dedicated to clubs and non profit organizations. ',
    'category' => 'distribution',
    'author' => 'Marcel Ulbrich',
    'author_email' => 'marcel@ulbrich.media',
    'state' => 'beta',
    'uploadfolder' => 1,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1.2',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
