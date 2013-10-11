<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$hookSignatureBodyTagId = 'EXT:sbo/Classes/Hook/DocumentTemplateHook.php:&DreadLabs\\Sbo\\Hook\\DocumentTemplateHook->setDefaultBodyTagId';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preHeaderRenderHook'][] = $hookSignatureBodyTagId;

$hookSignaturePageRendererCleanup = 'EXT:sbo/Classes/Hook/DocumentTemplateHook.php:&DreadLabs\\Sbo\\Hook\\PageRendererHook->cleanup';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-postProcess'][] = $hookSignaturePageRendererCleanup;

?>