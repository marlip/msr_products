<?php
namespace Markenstrmer\MsrProducts\Domain\Model;

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
 * Farben
 */
class Farben extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * ral
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $ral = '';
    
    /**
     * hex
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $hex = '';
    
    /**
     * Returns the ral
     * 
     * @return string $ral
     */
    public function getRal()
    {
        return $this->ral;
    }
    
    /**
     * Sets the ral
     * 
     * @param string $ral
     * @return void
     */
    public function setRal($ral)
    {
        $this->ral = $ral;
    }
    
    /**
     * Returns the hex
     * 
     * @return string $hex
     */
    public function getHex()
    {
        return $this->hex;
    }
    
    /**
     * Sets the hex
     * 
     * @param string $hex
     * @return void
     */
    public function setHex($hex)
    {
        $this->hex = $hex;
    }

}