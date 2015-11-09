<?php
namespace DreadLabs\Sbo\Hook;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Thomas Juhnke <tommy@van-tomas.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * TYPO3 PageRenderer hook to remove the "Powered by TYPO3" inline comment.
 *
 * Please note, that you should leave this comment intact as a sign of respect
 * and honour to the magnificient work of many talented people.
 *
 * Unfortunatly this comment is so concise that it's a must to remove for high-security
 * applications.
 *
 * @author Thomas Juhnke <tommy@van-tomas.de>
 */
class PageRendererHook {

    /**
     * Holds the incoming hook parameters
     *
     * @var array
     */
    protected $hookParameters = array();

    /**
     * The hook line of the copyright inline comment
     *
     * @var string
     */
    protected $copyrightInlineCommentHookLine = 'This website is powered by TYPO3 - inspiring people to share!';

    /**
     * The hook line of the generator meta tag
     *
     * @var string
     */
    protected $metaTagHookLine = '<meta name="generator" content="TYPO3';

    /**
     * Clean up method, called due of hook signature in ext_localconf
     *
     * @param array $hookParameters @see PageRenderer render-postProcess hook
     * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
     * @return void
     */
    public function cleanup(&$hookParameters, \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer) {
        $this->hookParameters = $hookParameters;

        $this->cleanupInlineComments();
        $this->cleanupMetaTags();
    }

    /**
     * Cleans up the inline comments
     *
     * @return void
     */
    public function cleanupInlineComments() {
        $resetIndex = NULL;

        foreach ($this->hookParameters['inlineComments'] as $commentIndex => $comment) {
            if ($this->getCommentHookLine($comment) === $this->copyrightInlineCommentHookLine) {
                $resetIndex = $commentIndex;

                break;
            }
        }

        if (FALSE === is_null($resetIndex)) {
            unset($this->hookParameters['inlineComments'][$resetIndex]);
        }
    }

    /**
     * Returns a comment hook line from the current inline comments of the page renderer
     *
     * @return string The cleaned incoming inline comment
     */
    protected function getCommentHookLine($commentFromPageRenderer) {
        $comment = trim($commentFromPageRenderer);

        $comment = substr(trim($comment), 0, strlen($this->copyrightInlineCommentHookLine));

        return $comment;
    }

    /**
     * Cleans up the meta tags
     *
     * @return void
     */
    public function cleanupMetaTags() {
        $resetIndex = NULL;

        foreach ($this->hookParameters['metaTags'] as $metaTagIndex => $metaTag) {
            if ($this->getMetaTagHookLine($metaTag) === $this->metaTagHookLine) {
                $resetIndex = $metaTagIndex;

                break;
            }
        }

        if (FALSE === is_null($resetIndex)) {
            unset($this->hookParameters['metaTags'][$resetIndex]);
        }
    }

    /**
     * Returns a meta tag hook line from the current meta tags of the page renderer
     *
     * @return string
     */
    protected function getMetaTagHookLine($metaTagFromPageRenderer) {
        $metaTag = trim($metaTagFromPageRenderer);

        $metaTag = substr($metaTag, 0, strlen($this->metaTagHookLine));

        return $metaTag;
    }
}
?>
