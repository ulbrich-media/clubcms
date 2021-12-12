<?php
defined('TYPO3_MODE') or die();

/**
 * New fields
 */
$newFields = [
    "clubcms_attached_content" => [
        'exclude' => true,
        'label' => 'Items',
        'config' => [
            'type' => 'inline',
            'allowed' => 'tx_clubcms_attached_content',
            'foreign_table' => 'tx_clubcms_attached_content',
            'foreign_sortby' => 'sorting',
            'foreign_field' => 'tt_content',
            'minitems' => 0,
            'maxitems' => 99,
            'appearance' => [
                'collapseAll' => true,
                'expandSingle' => true,
                'levelLinksPosition' => 'bottom',
                'useSortable' => true,
                'showPossibleLocalizationRecords' => true,
                'showRemovedLocalizationRecords' => true,
                'showAllLocalizationLink' => true,
                'showSynchronizationLink' => true,
                'enabledControls' => [
                    'info' => false,
                ]
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ]
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("tt_content", $newFields);

/**
 * palettes configuration 
 */
$GLOBALS['TCA']['tt_content']['palettes']['headers'] = [
    'showitem' => '
            header,
            header_layout
    '
];
$GLOBALS['TCA']['tt_content']['palettes']['appearence'] = [
    'label' => 'Optik',
    'showitem' => '
        frame_class,
    --linebreak--,
        space_before_class,space_after_class
    '
];
$GLOBALS['TCA']['tt_content']['palettes']['system']['showitem'] = '
            colPos,
    ';
$GLOBALS['TCA']['tt_content']['palettes']['general'] = [
    'showitem' => '
            CType,
            hidden,
    '
];
$GLOBALS['TCA']['tt_content']['palettes']['content_attachedContent'] = [
    'showitem' => '
            layout,
    --linebreak--,
            bodytext,
    --linebreak--,
            clubcms_attached_content,
    '
];
$GLOBALS['TCA']['tt_content']['palettes']['content_documentList'] = [
    'showitem' => '
            layout,
    --linebreak--,
            bodytext,
    --linebreak--,
            pi_flexform,
    '
];


/**
 * Field values
 */
$GLOBALS['TCA']['tt_content']['columns']['frame_class']['config']['default'] = '';
$GLOBALS['TCA']['tt_content']['columns']['frame_class']['config']['items'] = [
    ['Default', 'default'],
    ['Light', 'light'],
    ['Dark', 'dark'],
    ['Accent Color', 'primary'],
];
$GLOBALS['TCA']['tt_content']['columns']['layout']['config']['default'] = '';
$GLOBALS['TCA']['tt_content']['columns']['layout']['config']['items'] = [
    [ 'Default', '' ]
];

$GLOBALS['TCA']['tt_content']['columns']['header_layout']['config']['default'] = '2';
$GLOBALS['TCA']['tt_content']['columns']['header_layout']['config']['items'] = [
    [
        'Page headline (h1)', '1'
    ], [
        'Section headline (h2)', '2'
    ], [
        'Headline (h3)', '3'
    ], [
        'Headline (h4)', '4'
    ], [
        'Invisible', '100'
    ]
];

$GLOBALS['TCA']['tt_content']['columns']['bodytext']['config']['enableRichtext'] = true;
$GLOBALS['TCA']['tt_content']['columns']['bodytext']['config']['richtextConfiguration'] = 'clubcms';

$GLOBALS['TCA']['tt_content']['columns']['media']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
    'media',
    [
        'behaviour' => [
            'allowLanguageSynchronization' => true,
        ],
        'appearance' => [
            'createNewRelationLinkTitle' => 'New',
            'showPossibleLocalizationRecords' => true,
            'showRemovedLocalizationRecords' => true,
            'showAllLocalizationLink' => true,
            'showSynchronizationLink' => true
        ],
        'foreign_match_fields' => [
            'fieldname' => 'media',
            'tablenames' => 'tt_content',
            'table_local' => 'sys_file',
        ],
        // custom configuration for displaying fields in the overlay/reference table
        // to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
        'overrideChildTca' => [
            'types' => [
                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                    'showitem' => '
                        --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                        --palette--;;imageoverlayPalette,
                        --palette--;;filePalette'
                ],
                \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                    'showitem' => '
                        --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                        --palette--;;videoOverlayPalette,
                        --palette--;;filePalette'
                ],
            ],
        ],
    ],
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
);



/**
 * Content element configuration
 */

$showitemSuffix = '
        --div--;Visuals,
            --palette--;;appearence,
        --div--;System,
            --palette--;;system,
            --palette--;;language,
            --palette--;;access,
        --div--;Notes,
            rowDescription,
';

// Text element
$GLOBALS['TCA']['tt_content']['palettes']['content_text'] = [
    'showitem' => '
            layout,
    --linebreak--,
            bodytext,
    '
];
$GLOBALS['TCA']['tt_content']['types']['text'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_text,
    '.$showitemSuffix,
    'columnsOverrides' => [

    ]
];


// Text & Media element
$GLOBALS['TCA']['tt_content']['palettes']['content_textmedia'] = [
    'showitem' => '
            layout,
    --linebreak--,
            bodytext,
    --linebreak--,
            media,
    '
];
$GLOBALS['TCA']['tt_content']['types']['textmedia'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_textmedia,
    '.$showitemSuffix,
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'clubcms'
            ]
        ]
    ]
];

// Media element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Media',
        'media',
        'content-media',
    ],
    'textmedia',
    'after'
);
$GLOBALS['TCA']['tt_content']['palettes']['content_media'] = [
    'showitem' => '
            layout,
    --linebreak--,
            bodytext,
    --linebreak--,
            media,
    '
];
$GLOBALS['TCA']['tt_content']['types']['media'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_media,
    '.$showitemSuffix,
    'columnsOverrides' => [
        'layout' => [
            'config' => [
                'items' => [
                    [ "Simple", "simple" ],
                    [ "Slider", "slider" ],
                    [ "Grid", "grid" ],
                ]
            ]
        ]
    ]
];



// Teaser Element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Teaser',
        'teaser',
        'content-group-card',
    ],
);
$GLOBALS['TCA']['tt_content']['types']['teaser'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_attachedContent,
    '.$showitemSuffix,
    'columnsOverrides' => [
        'clubcms_attached_content' => [
            'config' => [
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;;content_teaser,
                                --div--;System,
                                    --palette--;;general,
                            '
                        ],
                    ],
                    'columns' => [
                        'body' => [
                            'config' => [
                                'enableRichtext' => false,
                            ],
                            'displayCond' => 'FIELD:parentRec.title:REQ:true'
                        ]
                    ]
                ]
            ]
        ]
    ]
];


// Accordion Element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Akkordeon',
        'accordion',
        'content-accordion',
    ],
);
$GLOBALS['TCA']['tt_content']['types']['accordion'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_attachedContent,
    '.$showitemSuffix,
    'columnsOverrides' => [
        'clubcms_attached_content' => [
            'config' => [
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;;content_accordion,
                                --div--;System,
                                    --palette--;;general,
                            '
                        ],
                    ],
                ]
            ]
        ]
    ]
];


// Facts Element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Fakten',
        'facts',
        'content-listgroup',
    ],
);
$GLOBALS['TCA']['tt_content']['types']['facts'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_attachedContent,
    '.$showitemSuffix,
    'columnsOverrides' => [
        'clubcms_attached_content' => [
            'config' => [
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;;content_fact,
                                --div--;System,
                                    --palette--;;general,
                            '
                        ],
                    ],
                    'columns' => [
                        'body' => [
                            'config' => [
                                'type' => 'input',
                                'size' => 60,
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];



/**
 * Plugin configuration
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Document List',
        'documentlist',
        'content-menu-abstract',
    ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:clubcms/Configuration/FlexForm/DocumentList.xml',
    'documentlist'
);

$GLOBALS['TCA']['tt_content']['types']['documentlist'] = [
    'showitem' => '
        --div--;Content, 
            --palette--;;general,
            --palette--;;headers,
            --palette--;;content_documentList,
    '.$showitemSuffix,
    'columnsOverrides' => [

    ]
];