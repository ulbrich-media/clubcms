<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR:EXT:clubcms/Configuration/TSconfig/Page/" extension="tsconfig">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR:EXT:clubcms/Configuration/TSconfig/User/" extension="tsconfig">');

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['clubcms'] = 'EXT:clubcms/Configuration/Yaml/RTE.yaml';

$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',clubcms_logo';