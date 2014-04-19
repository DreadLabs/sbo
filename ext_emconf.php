<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "sbo".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Security by obscurity',
	'description' => '',
	'category' => 'be',
	'author' => 'Thomas Juhnke',
	'author_email' => 'tommy@van-tomas.de',
	'shy' => '',
	'dependencies' => 'cms,extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '3.0.0-dev',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.1.0-6.1.99',
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:5:{s:9:"ChangeLog";s:4:"768a";s:12:"ext_icon.gif";s:4:"1bdc";s:10:"README.txt";s:4:"ee2d";s:19:"doc/wizard_form.dat";s:4:"0ce4";s:20:"doc/wizard_form.html";s:4:"9a12";}',
);

?>