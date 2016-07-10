<?php
namespace Markenstrmer\MsrProducts\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
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
 * Test case for class Markenstrmer\MsrProducts\Controller\ProdukttypenController.
 *
 */
class ProdukttypenControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Markenstrmer\MsrProducts\Controller\ProdukttypenController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Markenstrmer\\MsrProducts\\Controller\\ProdukttypenController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllProdukttypensFromRepositoryAndAssignsThemToView()
	{

		$allProdukttypens = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$produkttypenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukttypenRepository', array('findAll'), array(), '', FALSE);
		$produkttypenRepository->expects($this->once())->method('findAll')->will($this->returnValue($allProdukttypens));
		$this->inject($this->subject, 'produkttypenRepository', $produkttypenRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('produkttypens', $allProdukttypens);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenProdukttypenToView()
	{
		$produkttypen = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('produkttypen', $produkttypen);

		$this->subject->showAction($produkttypen);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenProdukttypenToProdukttypenRepository()
	{
		$produkttypen = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();

		$produkttypenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukttypenRepository', array('add'), array(), '', FALSE);
		$produkttypenRepository->expects($this->once())->method('add')->with($produkttypen);
		$this->inject($this->subject, 'produkttypenRepository', $produkttypenRepository);

		$this->subject->createAction($produkttypen);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenProdukttypenToView()
	{
		$produkttypen = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('produkttypen', $produkttypen);

		$this->subject->editAction($produkttypen);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenProdukttypenInProdukttypenRepository()
	{
		$produkttypen = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();

		$produkttypenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukttypenRepository', array('update'), array(), '', FALSE);
		$produkttypenRepository->expects($this->once())->method('update')->with($produkttypen);
		$this->inject($this->subject, 'produkttypenRepository', $produkttypenRepository);

		$this->subject->updateAction($produkttypen);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenProdukttypenFromProdukttypenRepository()
	{
		$produkttypen = new \Markenstrmer\MsrProducts\Domain\Model\Produkttypen();

		$produkttypenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukttypenRepository', array('remove'), array(), '', FALSE);
		$produkttypenRepository->expects($this->once())->method('remove')->with($produkttypen);
		$this->inject($this->subject, 'produkttypenRepository', $produkttypenRepository);

		$this->subject->deleteAction($produkttypen);
	}
}
