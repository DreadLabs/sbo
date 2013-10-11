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
 * DocumentTemplate hook to replace the backend body tag id
 *
 * If you make usage of the obscured typo3/ backend admin entry point, this
 * hook will take care to render proper body tag IDs. (e.g. CSS on Login screen)
 *
 * @author Thomas Juhnke <tommy@van-tomas.de>
 */
class DocumentTemplateHook {

    /**
     * Sets the default body tag id if you use an obscured admin entry point
     *
     * The new body tag id is directly set in the passed $documentTemplate instance!
     *
     * @param array $hookParameters the array of hook parameters
     * @param \TYPO3\CMS\Backend\Template\DocumentTemplate $documentTemplate
     * @return void
     */
    public function setDefaultBodyTagId(&$hookParameters, \TYPO3\CMS\Backend\Template\DocumentTemplate $documentTemplate) {

        $bodyTagIdParts = explode('-', $documentTemplate->bodyTagId);

        if ('typo3' !== $bodyTagIdParts[0]) {
            $bodyTagIdParts[0] = 'typo3';
        }

        $documentTemplate->bodyTagId = implode('-', $bodyTagIdParts);
    }
}
?>