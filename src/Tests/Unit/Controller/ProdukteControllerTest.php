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
 * Test case for class Markenstrmer\MsrProducts\Controller\ProdukteController.
 *
 */
class ProdukteControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Markenstrmer\MsrProducts\Controller\ProdukteController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Markenstrmer\\MsrProducts\\Controller\\ProdukteController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllProduktesFromRepositoryAndAssignsThemToView()
	{

		$allProduktes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$produkteRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukteRepository', array('findAll'), array(), '', FALSE);
		$produkteRepository->expects($this->once())->method('findAll')->will($this->returnValue($allProduktes));
		$this->inject($this->subject, 'produkteRepository', $produkteRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('produktes', $allProduktes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenProdukteToView()
	{
		$produkte = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('produkte', $produkte);

		$this->subject->showAction($produkte);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenProdukteToProdukteRepository()
	{
		$produkte = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();

		$produkteRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukteRepository', array('add'), array(), '', FALSE);
		$produkteRepository->expects($this->once())->method('add')->with($produkte);
		$this->inject($this->subject, 'produkteRepository', $produkteRepository);

		$this->subject->createAction($produkte);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenProdukteToView()
	{
		$produkte = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('produkte', $produkte);

		$this->subject->editAction($produkte);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenProdukteInProdukteRepository()
	{
		$produkte = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();

		$produkteRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukteRepository', array('update'), array(), '', FALSE);
		$produkteRepository->expects($this->once())->method('update')->with($produkte);
		$this->inject($this->subject, 'produkteRepository', $produkteRepository);

		$this->subject->updateAction($produkte);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenProdukteFromProdukteRepository()
	{
		$produkte = new \Markenstrmer\MsrProducts\Domain\Model\Produkte();

		$produkteRepository = $this->getMock('Markenstrmer\\MsrProducts\\Domain\\Repository\\ProdukteRepository', array('remove'), array(), '', FALSE);
		$produkteRepository->expects($this->once())->method('remove')->with($produkte);
		$this->inject($this->subject, 'produkteRepository', $produkteRepository);

		$this->subject->deleteAction($produkte);
	}
}
