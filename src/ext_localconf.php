<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Markenstrmer.' . $_EXTKEY,
	'Produkte',
	array(
		'Produkte' => 'list, show, new, create, edit, update, delete',
		'Produkttypen' => 'list, show, new, create, edit, update, delete',
		'Farben' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Produkte' => 'create, update, delete',
		'Produkttypen' => 'create, update, delete',
		'Farben' => 'create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Markenstrmer.' . $_EXTKEY,
	'Produkt',
	array(
		'Produkte' => 'list, show, new, create, edit, update, delete',
		'Produkttypen' => 'list, show, new, create, edit, update, delete',
		'Farben' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Produkte' => 'create, update, delete',
		'Produkttypen' => 'create, update, delete',
		'Farben' => 'create, update, delete',
		
	)
);
