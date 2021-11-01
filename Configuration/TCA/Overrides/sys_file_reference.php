<?php
defined('TYPO3_MODE') or die();


$GLOBALS['TCA']['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] = 'title, alternative, --linebreak--, description, crop';
$GLOBALS['TCA']['sys_file_reference']['palettes']['videoOverlayPalette']['showitem'] = 'title, --linebreak--, description, crop';

