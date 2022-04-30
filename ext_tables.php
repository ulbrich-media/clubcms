<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_clubcms_attached_content");

$GLOBALS['PAGES_TYPES'][510] = [
    'type' => 'web',
    'allowedTables' => '*',
];