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
 * ProdukttypenController
 */
class ProdukttypenController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * produkttypenRepository
     * 
     * @var \Markenstrmer\MsrProducts\Domain\Repository\ProdukttypenRepository
     * @inject
     */
    protected $produkttypenRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $produkttypens = $this->produkttypenRepository->findAll();
        $this->view->assign('produkttypens', $produkttypens);
    }
    
    /**
     * action show
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen
     * @return void
     */
    public function showAction(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen)
    {
        $this->view->assign('produkttypen', $produkttypen);
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
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $newProdukttypen
     * @return void
     */
    public function createAction(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $newProdukttypen)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->produkttypenRepository->add($newProdukttypen);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen
     * @ignorevalidation $produkttypen
     * @return void
     */
    public function editAction(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen)
    {
        $this->view->assign('produkttypen', $produkttypen);
    }
    
    /**
     * action update
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen
     * @return void
     */
    public function updateAction(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->produkttypenRepository->update($produkttypen);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen
     * @return void
     */
    public function deleteAction(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkttypen)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->produkttypenRepository->remove($produkttypen);
        $this->redirect('list');
    }

}