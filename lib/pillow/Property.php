<?php
/**
 * @author Rob Apodaca <rob.apodaca@gmail.com>
 * @copyright Copyright (c) 2009, Rob Apodaca
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class Pillow_Property extends Pillow_Base
{
    const CHART_UNIT_DOLLAR = 'dollar';
    const CHART_UNIT_PERCENT = 'percent';

    /**
     * zpid
     * @var string $zpid
     */
    public $zpid;

    /**
     * Group of zillow links for the property
     * @var stdClass $links
     */
    public $links;

    /**
     * Street
     * @var string $street
     */
    public $street;

    /**
     * Zip
     * @var string $zipcode
     */
    public $zipcode;

    /**
     * City
     * @var string $city
     */
    public $city;

    /**
     * State
     * @var string $state
     */
    public $state;

    /**
     * latitude
     * @var string $latitude
     */
    public $latitude;

    /**
     * longitude
     * @var string $longitude
     */
    public $longitude;

    /**
     * fips county
     * @var string $fipsCounty
     */
    public $fipsCounty;

    /**
     * number of bathrooms
     * @var string $bathrooms
     */
    public $bathrooms;

    /**
     * number of bedrooms
     * @var string $bedrooms
     */
    public $bedrooms;

    /**
     * The use code
     * @var string $useCode
     */
    public $useCode;

    /**
     * year prop was built
     * @var string $yearBuilt
     */
    public $yearBuilt;

    /**
     * lot size
     * @var string $lotSizeSqFt
     */
    public $lotSizeSqFt;

    /**
     * finished size
     * @var string $finishedSqFt
     */
    public $finishedSqFt;

    /**
     * date last sold
     * @var string $lastSoldDate
     */
    public $lastSoldDate;

    /**
     * Price last sold
     * @var string $lastSoldPrice
     */
    public $lastSoldPrice;

    /**
     * Gets the related zestimate record (if available). Throws one of many
     * exceptions if any errors or no zesitmate is available
     * @return stdClass or void if exception
     * @throws Pillow_*Exception
     */
    public function getZestimate()
    {
        try {
            $z = $this->_factory->createZestimate( $this->zpid );
            return $z;
        } catch (Exception $e) {
            throw $e;
            return;
        }
    }

    /**
     * Gets the related chart record (if available). Throws one of many
     * exceptions if any errors or no chart is available
     * @return stdClass or void if exception
     * @throws Pillow_*Exception
     */
    public function getChart( $unit_type, $width = NULL, $height = NULL, $chartDuration = NULL )
    {
        try {
            $c = $this->_factory->createChart( $this->zpid, $unit_type, $width, $height, $chartDuration );
            return $c;
        } catch (Exception $e) {
            throw $e;
            return;
        }
    }

    /**
     * Attempts to get related comps for property
     * @param int $count
     * @return array of Pillow_Property objects
     * @throws Pillow_*Exception
     */
    public function getComps( $count )
    {
        try {
            $c = $this->_factory->findComps( $this->zpid, $count );
            return $c;
        } catch (Exception $e) {
            throw $e;
            return;
        }
    }
}

?>
