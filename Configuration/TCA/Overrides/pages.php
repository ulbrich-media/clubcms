<?php
defined('TYPO3_MODE') or die();


####
# new page types 
# 510 = event
# 520 = news article 
#### 

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'pages',
    'doktype',
    [
        'Event',
        510,
    ],
    '1',
    'after'
);

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
    $GLOBALS['TCA']['pages'],
    [
        'types' => [
            510 => [
                'showitem' => $GLOBALS['TCA']['pages']['types'][\TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_DEFAULT]['showitem']
            ]
        ]
    ]
);



####
# ClubCMS event properties 
#### 

$GLOBALS['TCA']['pages']['columns']['clubcms_event_fullday'] = [
    'exclude' => 1,
    'label' => 'Full day',
    'config' => [
        'type' => 'check',
        'renderType' => 'checkboxToggle',
        'items' => [
            [
                0 => '',
                1 => '',
            ]
        ],
    ],
];
$GLOBALS['TCA']['pages']['columns']['clubcms_event_start'] = [
    'exclude' => 1,
    'label' => 'Start',
    'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'eval' => 'datetime,required',
    ],
];

$GLOBALS['TCA']['pages']['columns']['clubcms_event_end'] = [
    'exclude' => 1,
    'label' => 'End',
    'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'eval' => 'datetime,null',
    ],
];
$GLOBALS['TCA']['pages']['columns']['clubcms_event_location'] = [
    'exclude' => 1,
    'label' => 'Location',
    'config' => [
        'type' => 'input',
        'eval' => 'trim',
    ],
];

$GLOBALS['TCA']['pages']['palettes']['clubcms_event'] = [
    'label' => 'Event',
    'showitem' => 'clubcms_event_fullday, --linebreak--, clubcms_event_start, clubcms_event_end, --linebreak--, clubcms_event_location',
];

$GLOBALS['TCA']['pages']['types']['510']['showitem'] .= ', --div--;Event, --palette--;;clubcms_event';



####
# ClubCMS page properties 
#### 

$GLOBALS['TCA']['pages']['columns']['clubcms_logo'] = [
    'exclude' => 1,
    'label' => 'Logo',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'clubcms_logo',
        [
            'maxitems' => 1,
        ],
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
    ),
];

$GLOBALS['TCA']['pages']['columns']['clubcms_icon'] = [
    'exclude' => 1,
    'label' => 'Icon',
    'l10n_mode' => 'prefixLangTitle',
    'config' => [
        'type' => 'input',
        'behaviour' => [
            'allowLanguageSynchronization' => true,
        ],
    ],
];

$GLOBALS['TCA']['pages']['palettes']['clubcms'] = [
    'label' => 'clubcms',
    'showitem' => 'clubcms_logo, --linebreak--, clubcms_icon',
];

$GLOBALS['TCA']['pages']['types']['1']['showitem'] .= ', --div--;clubcms, --palette--;;clubcms';
$GLOBALS['TCA']['pages']['types']['3']['showitem'] .= ', --div--;clubcms, --palette--;;clubcms';
$GLOBALS['TCA']['pages']['types']['4']['showitem'] .= ', --div--;clubcms, --palette--;;clubcms';
$GLOBALS['TCA']['pages']['types']['7']['showitem'] .= ', --div--;clubcms, --palette--;;clubcms';
$GLOBALS['TCA']['pages']['types']['510']['showitem'] .= ', --div--;clubcms, --palette--;;clubcms';