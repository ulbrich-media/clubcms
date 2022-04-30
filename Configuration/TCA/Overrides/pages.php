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

$GLOBALS['TCA']['pages']['palettes']['page_event'] = [
    'label' => 'Event',
    'showitem' => 'clubcms_event_fullday, --linebreak--, clubcms_event_start, clubcms_event_end, --linebreak--, clubcms_event_location',
];



####
# ClubCMS page properties 
#### 

$GLOBALS['TCA']['pages']['columns']['teaser'] = [
    'exclude' => 1,
    'label' => 'Teaser',
    'config' => [
        'type' => 'text',
        'cols' => 60,
        'rows' => 5,
    ],
];

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



####
# Reorganized palettes and backend page property forms
####

$GLOBALS['TCA']['pages']['palettes']['standard']['showitem'] = '
        doktype, 
        hidden, 
';
$GLOBALS['TCA']['pages']['palettes']['title']['showitem'] = '
        title, 
    --linebreak--, 
        slug, 
';
$GLOBALS['TCA']['pages']['palettes']['navigation'] = [
    'title' => '',
    'showitem' => '
        clubcms_icon,
    --linebreak--, 
        nav_title, 
        nav_hide, 
    --linebreak--, 
        clubcms_icon
    --linebreak--, 
        teaser,
    --linebreak--, 
        media,
    '
];

$GLOBALS['TCA']['pages']['palettes']['page_shortcut'] = [
    'title' => '',
    'showitem' => '
        shortcut_mode, 
    --linebreak--, 
        shortcut,
    '
];

$GLOBALS['TCA']['pages']['palettes']['page_mountpoint'] = [
    'title' => '',
    'showitem' => '
        mount_pid_ol, 
    --linebreak--, 
        mount_pid,
    '
];


# 1: Default page
# 3: External Link
# 4: Shortcut
# 7: Mount Point
# 199: Menu Separator
# 254: Folder
# 255: Recycler
# 510 = event
# 520 = news article

$GLOBALS['TCA']['pages']['types']['1']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('');
$GLOBALS['TCA']['pages']['types']['3']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('
    --palette--;;external,'
);
$GLOBALS['TCA']['pages']['types']['4']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('
    '
);
$GLOBALS['TCA']['pages']['types']['7']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('
    --palette--;;page_mountpoint,'
);
$GLOBALS['TCA']['pages']['types']['199']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('', false);
$GLOBALS['TCA']['pages']['types']['254']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('', false);
$GLOBALS['TCA']['pages']['types']['255']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('', false);

$GLOBALS['TCA']['pages']['types']['510']['showitem'] = \UlbrichMedia\ClubCMS\Utility\TCA::getItemsForPageType('
    --palette--;;page_event,'
);
