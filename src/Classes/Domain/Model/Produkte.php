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
 * Produkte
 */
class Produkte extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * preis
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $preis = '';
    
    /**
     * produkt
     * 
     * @var \Markenstrmer\MsrProducts\Domain\Model\Produkttypen
     */
    protected $produkt = null;
    
    /**
     * farbe
     * 
     * @var \Markenstrmer\MsrProducts\Domain\Model\Farben
     */
    protected $farbe = null;
    
    /**
     * Returns the preis
     * 
     * @return string $preis
     */
    public function getPreis()
    {
        return $this->preis;
    }
    
    /**
     * Sets the preis
     * 
     * @param string $preis
     * @return void
     */
    public function setPreis($preis)
    {
        $this->preis = $preis;
    }
    
    /**
     * Returns the produkt
     * 
     * @return \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkt
     */
    public function getProdukt()
    {
        return $this->produkt;
    }
    
    /**
     * Sets the produkt
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkt
     * @return void
     */
    public function setProdukt(\Markenstrmer\MsrProducts\Domain\Model\Produkttypen $produkt)
    {
        $this->produkt = $produkt;
    }
    
    /**
     * Returns the farbe
     * 
     * @return \Markenstrmer\MsrProducts\Domain\Model\Farben $farbe
     */
    public function getFarbe()
    {
        return $this->farbe;
    }
    
    /**
     * Sets the farbe
     * 
     * @param \Markenstrmer\MsrProducts\Domain\Model\Farben $farbe
     * @return void
     */
    public function setFarbe(\Markenstrmer\MsrProducts\Domain\Model\Farben $farbe)
    {
        $this->farbe = $farbe;
    }

}