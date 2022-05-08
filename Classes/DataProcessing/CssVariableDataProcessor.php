<?php

namespace UlbrichMedia\ClubCMS\DataProcessing;

use Mexitek\PHPColors\Color;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;


class CssVariableDataProcessor implements DataProcessorInterface
{
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {

        if (isset($processedData["site"]) && $processedData["site"] instanceof Site) {
            $site = $processedData["site"];
            $as = "variables";
            if ($processorConfiguration["as"]) {
                $as = $processorConfiguration["as"];
            }

            $colorHex = $site->getConfiguration()["clubcms_color_accent"];
            if (!$colorHex) {
                return $processedData;
            }

            $color = new Color(
                $site->getConfiguration()["clubcms_color_accent"]
            );

            $variables["colorAccent"] = $color->getHsl();

            $processedData[$as] = $variables;
        }

        return $processedData;
    }


}