<?php
namespace Markenstrmer\MsrProducts\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * FarbenController
 */
class FarbenController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * farbenRepository
     * 
     * @var \Markenstrmer\MsrProducts\Domain\Repository\FarbenRepository
     * @inject
     */
    protected $farbenRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $farbens = $this->farbenRepository->findAll();
        $this->view->assign('farbens', $farbens);
        
    }
    
    /**
     * action show
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $farben
     * @return void
     */
    public function showAction(\Markenstrmer\MsrProducts\Domain\Model\Farben $farben)
    {
        $this->view->assign('farben', $farben);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $newFarben
     * @return void
     */
    public function createAction(\Markenstrmer\MsrProducts\Domain\Model\Farben $newFarben)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->farbenRepository->add($newFarben);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $farben
     * @ignorevalidation $farben
     * @return void
     */
    public function editAction(\Markenstrmer\MsrProducts\Domain\Model\Farben $farben)
    {
        $this->view->assign('farben', $farben);
    }
    
    /**
     * action update
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $farben
     * @return void
     */
    public function updateAction(\Markenstrmer\MsrProducts\Domain\Model\Farben $farben)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->farbenRepository->update($farben);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $farben
     * @return void
     */
    public function deleteAction(\Markenstrmer\MsrProducts\Domain\Model\Farben $farben)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->farbenRepository->remove($farben);
        $this->redirect('list');
    }

}