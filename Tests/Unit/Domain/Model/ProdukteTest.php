<?php

namespace Markenstrmer\MsrProducts\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
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
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Markenstrmer\MsrProducts\Domain\Model\Produkte.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProdukteTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Markenstrmer\MsrProducts\Domain\Model\Produkte
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPreisReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPreis()
		);
	}

	/**
	 * @test
	 */
	public function setPreisForStringSetsPreis()
	{
		$this->subject->setPreis('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'preis',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProduktReturnsInitialValueForProdukttypen()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getProdukt()
		);
	}

	/**
	 * @test
	 */
	public function setProduktForProdukttypenSetsProdukt()
	{
		$produktFixture = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();
		$this->subject->setProdukt($produktFixture);

		$this->assertAttributeEquals(
			$produktFixture,
			'produkt',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFarbeReturnsInitialValueForFarben()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getFarbe()
		);
	}

	/**
	 * @test
	 */
	public function setFarbeForFarbenSetsFarbe()
	{
		$farbeFixture = new \Markenstrmer\MsrProducts\Domain\Model\Farben();
		$this->subject->setFarbe($farbeFixture);

		$this->assertAttributeEquals(
			$farbeFixture,
			'farbe',
			$this->subject
		);
	}
}
