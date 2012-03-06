<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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


/**
 * Class CalendarExtentions
 *
 * @copyright  Felix Peters 2012
 * @author     Felix Peters - Wichteldesign
 * @package    Controller
 */
class CalendarExtentions extends Backend
{
// MyClass.php
    public function filterAllEvents($arrEvents, $arrCalendars, $intStart, $intEnd, Module $objModule)
    {
        $arrFilteredEvents = array();

        // Remove events outside the scope
        		foreach ($arrEvents as $key=>$days)
        		{
                    echo $key;

        			if ($key < date('Ymd', $objModule->filterStartDate) || $key > date('Ymd', $objModule->filterEndDate))
        			{
        				continue;
        			}

        			foreach ($days as $day=>$events)
        			{
        				foreach ($events as $i=>$event)
        				{

                            $arrFilteredEvents[$key][$day][$i] = $event;
        				}
        			}
        		}

        return $arrFilteredEvents;
    }


}

?>