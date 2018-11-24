<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2018, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / User / Controller
 */

namespace PH7;

use PH7\Framework\CArray\CArray;
use PH7\Framework\Geo\Map\Map;
use PH7\Framework\Http\Http;
use PH7\Framework\Mvc\Model\DbConfig;
use PH7\Framework\Navigation\Page;
use Teapot\StatusCode;

class CountryController extends Controller
{
    const MAP_ZOOM_LEVEL = 12;
    const MAP_WIDTH_SIZE = '100%';
    const MAP_HEIGHT_SIZE = '520px';

    const COUNTRY_CODE_LENGTH = 2;
    const MAX_PROFILE_PER_PAGE = 20;
    const MAX_COUNTRY_LENGTH = 50;
    const MAX_CITY_LENGTH = 50;

    public function index()
    {
        // Add Stylesheet tooltip
        $this->design->addCss(PH7_LAYOUT . PH7_TPL . PH7_TPL_NAME . PH7_SH . PH7_CSS, 'tooltip.css');

        if ($this->httpRequest->getExists('country')) {
            // Get the country and city, limited to 50 characters and remove dashes automatically added from the URL
            $this->registry->country = $this->getCountry();
            $this->registry->city = $this->httpRequest->getExists('city') ? $this->getCity() : '';

            $this->setMap();

            $sCountryCode = $this->getCountryCode();

            // For User Model
            $this->view->userDesignModel = new UserDesignCoreModel;
            $this->view->country_code = $sCountryCode;
            $this->view->city = $this->registry->city;

            // Pagination
            $oPage = new Page;
            $iTotalUsers = (new UserCoreModel)->getGeoProfiles($sCountryCode, $this->registry->city, true, null, null, null);
            $this->view->total_pages = $oPage->getTotalPages($iTotalUsers, self::MAX_PROFILE_PER_PAGE);
            $this->view->current_page = $oPage->getCurrentPage();
            $this->view->first_user = $oPage->getFirstItem();
            $this->view->nb_user_by_page = $oPage->getNbItemsPerPage();

            // SEO Meta
            $this->setMetaTags($iTotalUsers);
        } else {
            // Not found page
            Http::setHeadersByCode(StatusCode::NOT_FOUND);
            $this->view->error = t('Error, country is empty.');
        }

        $this->output();
    }

    /**
     * @return string
     */
    private function getCountryCode()
    {
        $sCountryCode = CArray::getKeyByValueIgnoreCase($this->registry->country, $this->registry->lang);

        if (strlen($sCountryCode) !== self::COUNTRY_CODE_LENGTH) {
            return substr($this->registry->country, 0, self::COUNTRY_CODE_LENGTH);
        }

        return $sCountryCode;
    }

    /**
     * Assign SEO meta tags to the template.
     *
     * @param int $iTotalUsers
     *
     * @return void
     */
    private function setMetaTags($iTotalUsers)
    {
        $this->view->page_title = t('Citas en linea %0% %1%, conocer gente, encontrar amigos. Hombre y Mujeres solter@s %2% %3%', $this->registry->country, $this->registry->city, $this->registry->country, $this->registry->city);
        $this->view->meta_description = t('Citas en linea %0% con hombres y mujeres solter@s. Contactos, conocer gente y encontrar amigos en %1% en el sitio de citas por internet. Encuentra amor dulce %2%, %3% with %site_name%', $this->registry->country, $this->registry->country, $this->registry->country, $this->registry->city);
        $this->view->meta_keywords = t('conoce mujeres, conoce hombres, %0%, %1%, conocer gente, contactos, amigos, comunicarse, reunirse en línea, comunidad en línea, clubes, anuncia reuniones, citas, %2% citas, comunicación, reunión matrimonial, compartir fotos, ligar, encontrar amigos, clasificados, personales, en línea, redes sociales ', $this->registry->country, $this->registry->city, $this->registry->country);
        $this->view->h1_title = t('Meet new people in %0% %1%', '<span class="pH1">' . $this->registry->country . '</span>', '<span class="pH1">' . $this->registry->city . '</span>');
        $sMemberTxt = nt('%n% miembre en linea', '%n% miembros en linea', $iTotalUsers);
        $this->view->h3_title = t('%0% near %1% %2%', $sMemberTxt, $this->registry->country, $this->registry->city);
    }

    /**
     * Set the map to the view.
     *
     * @return void
     */
    private function setMap()
    {
        $sFullAddress = $this->registry->country . ' ' . $this->registry->city;
        $sMarkerText = t('Conoce gente nueva aqui <b>%site_name%</b>!');

        $oMap = new Map;
        $oMap->setKey(DbConfig::getSetting('googleApiKey'));
        $oMap->setCenter($sFullAddress);
        $oMap->setSize(self::MAP_WIDTH_SIZE, self::MAP_HEIGHT_SIZE);
        $oMap->setDivId('country_map');
        $oMap->setZoom(self::MAP_ZOOM_LEVEL);
        $oMap->addMarkerByAddress($sFullAddress, $sMarkerText, $sMarkerText);
        $oMap->generate();
        $this->view->map = $oMap->getMap();
        unset($oMap);
    }

    /**
     * @return string
     */
    private function getCountry()
    {
        return str_replace(
            '-',
            ' ',
            substr($this->str->upperFirst($this->httpRequest->get('country')), 0, self::MAX_COUNTRY_LENGTH)
        );
    }

    /**
     * @return string
     */
    private function getCity()
    {
        return str_replace(
            '-',
            ' ',
            substr($this->str->upperFirst($this->httpRequest->get('city')), 0, self::MAX_CITY_LENGTH)
        );
    }
}
