<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Markenstrmer.' . $_EXTKEY,
	'Produkte',
	'Produkte'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Markenstrmer.' . $_EXTKEY,
	'Produkt',
	'Produkt'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Markenstrmer.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'produktverwaltung',	// Submodule key
		'',						// Position
		array(
			'Produkte' => 'list, show, new, create, edit, update, delete','Produkttypen' => 'list, show, new, create, edit, update, delete','Farben' => 'list, show, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_produktverwaltung.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Produktverwaltung');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_msrproducts_domain_model_produkttypen', 'EXT:msr_products/Resources/Private/Language/locallang_csh_tx_msrproducts_domain_model_produkttypen.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_msrproducts_domain_model_produkttypen');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_msrproducts_domain_model_farben', 'EXT:msr_products/Resources/Private/Language/locallang_csh_tx_msrproducts_domain_model_farben.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_msrproducts_domain_model_farben');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_msrproducts_domain_model_produkte', 'EXT:msr_products/Resources/Private/Language/locallang_csh_tx_msrproducts_domain_model_produkte.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_msrproducts_domain_model_produkte');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_msrproducts_domain_model_produkttypen'
);
