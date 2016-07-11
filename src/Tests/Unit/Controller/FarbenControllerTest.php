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
 * Test case for class Markenstrmer\MsrProducts\Controller\FarbenController.
 *
 */
class FarbenControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Markenstrmer\MsrProducts\Controller\FarbenController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Markenstrmer\\MsrProducts\\Controller\\FarbenController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllFarbensFromRepositoryAndAssignsThemToView()
	{

		$allFarbens = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$farbenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\FarbenRepository', array('findAll'), array(), '', FALSE);
		$farbenRepository->expects($this->once())->method('findAll')->will($this->returnValue($allFarbens));
		$this->inject($this->subject, 'farbenRepository', $farbenRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('farbens', $allFarbens);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenFarbenToView()
	{
		$farben = new \Markenstrmer\MsrProducts\Domain\Model\Farben();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('farben', $farben);

		$this->subject->showAction($farben);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenFarbenToFarbenRepository()
	{
		$farben = new \Markenstrmer\MsrProducts\Domain\Model\Farben();

		$farbenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\FarbenRepository', array('add'), array(), '', FALSE);
		$farbenRepository->expects($this->once())->method('add')->with($farben);
		$this->inject($this->subject, 'farbenRepository', $farbenRepository);

		$this->subject->createAction($farben);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenFarbenToView()
	{
		$farben = new \Markenstrmer\MsrProducts\Domain\Model\Farben();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('farben', $farben);

		$this->subject->editAction($farben);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenFarbenInFarbenRepository()
	{
		$farben = new \Markenstrmer\MsrProducts\Domain\Model\Farben();

		$farbenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\FarbenRepository', array('update'), array(), '', FALSE);
		$farbenRepository->expects($this->once())->method('update')->with($farben);
		$this->inject($this->subject, 'farbenRepository', $farbenRepository);

		$this->subject->updateAction($farben);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenFarbenFromFarbenRepository()
	{
		$farben = new \Markenstrmer\MsrProducts\Domain\Model\Farben();

		$farbenRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\FarbenRepository', array('remove'), array(), '', FALSE);
		$farbenRepository->expects($this->once())->method('remove')->with($farben);
		$this->inject($this->subject, 'farbenRepository', $farbenRepository);

		$this->subject->deleteAction($farben);
	}
}
