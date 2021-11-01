<?php
defined('TYPO3_MODE') or die();

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