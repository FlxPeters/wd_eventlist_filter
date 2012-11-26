<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Felix Peters 2012
 * @author     Felix Peters - Wichteldesign
 * @package    wd
 * @license    LGPL
 * @filesource
 */

namespace WichtelDesign\Calendar;

/**
 * Class CalendarExtentions
 *
 * @copyright  Felix Peters 2012
 * @author     Felix Peters - Wichteldesign
 * @package    Controller
 */
class CalendarExtentions extends \Contao\BackendModule
{

    protected function compile()
    {

    }


    public function filterAllEvents($arrEvents, $arrCalendars, $intStart, $intEnd, \Contao\ModuleEventlist $objModule)
    {
        $arrFilteredEvents = array();

        // Remove events outside the scope
        foreach ($arrEvents as $key => $days)
        {
            if ((is_numeric($objModule->filterStartDate) && $key < date('Ymd', $objModule->filterStartDate)) ||
                (is_numeric($objModule->filterEndDate) && $key > date('Ymd', $objModule->filterEndDate))
            ) {
                continue;
            }

            foreach ($days as $day => $events)
            {
                foreach ($events as $i => $event)
                {

                    $arrFilteredEvents[$key][$day][$i] = $event;
                }
            }
        }

        return $arrFilteredEvents;
    }

    public function tagAllEvents($arrEvents, $arrCalendars, $intStart, $intEnd, \Contao\ModuleEventlist $objModule)
    {
        $arrTagedEvents = array();

        $strDay = '';
        $strYear = '';

        // Set Flags for new Month and Day (Month is set by Contao)
        foreach ($arrEvents as $key => $days)
        {
            foreach ($days as $day => $events)
            {
                foreach ($events as $i => $event)
                {

                    // new Startdate = new Day
                    if ($strDay != $event['startDate']) {
                        $event['isNewDay'] = true;
                        $strDay = $event['startDate'];
                    }
                    
                    if ($strYear != date('Y', $event['startDate'])) {
                        $event['isNewYear'] = true;
                        $strYear = date('Y', $event['startDate']);
                    }

                    $arrTagedEvents[$key][$day][$i] = $event;

                }
            }
        }

        return $arrTagedEvents;
    }
}
