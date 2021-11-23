<?php
defined ('TYPO3_MODE') or die ('Access denied.');

$GLOBALS['SiteConfiguration']['site']['columns']['clubcms_layout'] = [
    'label' => 'Layout',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ["Side Menu", 'SideMenu'],
        ],
        'default' => 'SideMenu'
    ],
];
$GLOBALS['SiteConfiguration']['site']['columns']['clubcms_color_accent'] = [
    'label' => 'Accent Color',
    'config' => [
        'type' => 'input',
        'renderType' => 'colorpicker',
        'size' => 10,
    ],
];

$GLOBALS['SiteConfiguration']['site']['types'][0]['showitem'] .= ',--div--;Layout,clubcms_layout,--linebreak--,clubcms_color_accent';
