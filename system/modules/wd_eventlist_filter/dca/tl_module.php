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
 * Table tl_acts
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['eventlist'] = str_replace('perPage;', 'perPage,filterStartDate,filterEndDate;', $GLOBALS['TL_DCA']['tl_module']['palettes']['eventlist']);


$GLOBALS['TL_DCA']['tl_module']['fields']['filterStartDate'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['filterStartDate'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('rgxp' => 'date', 'datepicker' => true, 'tl_class' => 'w50 wizard')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['filterEndDate'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['filterEndDate'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('rgxp' => 'date', 'datepicker' => true, 'tl_class' => 'w50 wizard')
);


?>