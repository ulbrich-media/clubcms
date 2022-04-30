<?php


namespace UlbrichMedia\ClubCMS\Utility;


class TCA
{

    public static function getItemsForPageType(string $pageContent, bool $isFrontendPage = true) : string
    {
        $tca = '
--div--;Page,
    --palette--;;standard,
    --palette--;;title,';

        $tca .= $pageContent;

        if ($isFrontendPage) {
            $tca .= '
--div--;Navigation,
    --palette--;;navigation,
--div--;SEO,
    --palette--;;seo, 
    --palette--;;robots, 
    --palette--;;canonical, 
    --palette--;;sitemap, 
--div--;Social Media,
    --palette--;;opengraph, 
    --palette--;;twittercards, 
--div--;Metadata,
    --palette--;;abstract, 
    --palette--;;metatags, 
    --palette--;;editorial, 
--div--;System,
    clubcms_logo,
    --palette--;;language,
    --palette--;;access, 
    --palette--;;miscellaneous, 
--div--;Admin,
    --palette--;;layout, 
    --palette--;;caching, 
    --palette--;;config,
    --palette--;;module, 
    ';
        }
        else {
            $tca .= ' 
--div--;Admin,
    --palette--;;backend_layout,
    --palette--;;config,
    --palette--;;adminsonly,
    --palette--;;module, 
    ';
        }

        $tca .= ' 
--div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category, 
    categories, 
--div--;Notes,
    rowDescription, ';

        return $tca;
    }

}