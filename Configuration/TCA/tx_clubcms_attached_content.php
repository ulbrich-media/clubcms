<?php

return [
    'ctrl' => [
        'title' => 'Item',
        'descriptionColumn' => 'notes',
        'label' => 'title',
        'hideAtCopy' => false,
//        'hideInList' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'editlock' => 'editlock',
        'useColumnsForDefaultValues' => 'type',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'iconfile' => 'EXT:clubcms/Resources/Public/Icons/tx_clubcms_attached_content.svg',
        'searchFields' => 'uid,title,body,target,icon,media',
        'thumbnail' => 'media',
    ],
    'interface' => [
        'showRecordFieldList' => 'cruser_id,pid,sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,tt_content,title,body,target,icon,media'
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_clubcms_teaser',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
            ]
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
            ]
        ],
        'sorting' => [
            'label' => 'sorting',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'tt_content' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'title' => [
            'exclude' => false,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Titel',
            'config' => [
                'type' => 'input',
                'size' => 60,
                'max' => 255,
                'eval' => '',
            ]
        ],
        'body' => [
            'exclude' => true,
            'label' => 'Text',
            'config' => [
                'type' => 'text',
                'cols' => 60,
                'rows' => 5,
                'enableRichtext' => true,
                'richtextConfiguration' => 'clubcms'
            ]
        ],
        'icon' => [
            'exclude' => false,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Icon',
            'config' => [
                'type' => 'input',
                'size' => 60,
                'max' => 255,
                'eval' => '',
            ]
        ],
        'target' => [
            'exclude' => false,
            'label' => 'Ziel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'softref' => 'typolink'
            ]
        ],
        'media' => [
            'exclude' => true,
            'label' => 'Vorschaubild',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
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
                        'tablenames' => 'tx_clubcms_attached_content',
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
            )
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                    --palette--;;content,
                --div--;System,
                    --palette--;;general,
            '
        ],
    ],
    'palettes' => [
        'general' => [
            'showitem' => 'sys_language_uid, starttime, endtime',
        ],
        'content' => [
            'showitem' => '
                --linebreak--,
                    title,
                    icon,
                --linebreak--,
                    body,
                --linebreak--,
                    target,
                --linebreak--,
                    media
            ',
        ],
        'content_teaser' => [
            'showitem' => '
                --linebreak--,
                    title,
                --linebreak--,
                    body,
                --linebreak--,
                    target,
                --linebreak--,
                    media
            ',
        ],
        'content_accordion' => [
            'showitem' => '
                --linebreak--,
                    title,
                --linebreak--,
                    body,
            ',
        ],
        'content_fact' => [
            'showitem' => '
                --linebreak--,
                    title,
                    icon,
                --linebreak--,
                    body,
            ',
        ],
    ]
];