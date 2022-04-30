<?php

namespace UlbrichMedia\ClubCMS\DataProcessing;

use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;


class DocumentListDataProcessor implements DataProcessorInterface
{

    /**
     * @var ContentDataProcessor
     */
    protected $contentDataProcessor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contentDataProcessor = GeneralUtility::makeInstance(ContentDataProcessor::class);
    }


    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {

        if (isset($processedData["data"]["pi_flexform"])) {
            $as = "pages";
            if ($processorConfiguration["as"]) {
                $as = $processorConfiguration["as"];
            }

            /** @var FlexFormService $flexFormService */
            $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
            $settings = $flexFormService->convertFlexFormContentToArray($processedData["data"]["pi_flexform"]);

            $pageIDs = GeneralUtility::trimExplode(",", $settings["pages"], true);
            $additionalWhere = "";

            // respect chosen doctypes
            if (!empty($settings["doctypes"])) {
                $additionalWhere .= "doktype IN (".$settings["doctypes"].")";
            }


            $pages = null;
            /** @var PageRepository $pageRepository */
            $pageRepository = GeneralUtility::makeInstance(PageRepository::class);

            // get pages depending on the chosen type
            switch($settings["type"]) {
                case "pages":
                    $pages = $pageRepository->getMenuForPages($pageIDs, "*", 'sorting', $additionalWhere);
                    break;

                case "subpages":
                    $pages = $pageRepository->getMenu($pageIDs, "*", 'sorting', $additionalWhere);
                    break;
            }

            // respect chosen limit
            if (!empty($settings["limit"])) {
                $pages = array_splice($pages, 0, $settings["limit"]);
            }

            // run subsequent data processors
            foreach ($pages as $key => $page) {
                $pages[$key] = $this->processAdditionalDataProcessors($page, $processorConfiguration);
            }

            $processedData[$as."Settings"] = $settings;
            $processedData[$as] = $pages;
        }

        return $processedData;
    }


    /**
     * Process additional data processors
     *
     * @param array $page
     * @param array $processorConfiguration
     * @return array
     */
    protected function processAdditionalDataProcessors($page, $processorConfiguration)
    {
        /** @var ContentObjectRenderer $recordContentObjectRenderer */
        $recordContentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        $recordContentObjectRenderer->start($page, 'pages');
        $processedPage = $this->contentDataProcessor->process($recordContentObjectRenderer, $processorConfiguration, $page);
        return $processedPage;
    }


}