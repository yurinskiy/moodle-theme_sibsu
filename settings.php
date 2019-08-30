<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings.
 *
 * @package   theme_sibsu
 * @copyright 2019 Yuriy Yurinskiy
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingsibsu', get_string('configtitle', 'theme_sibsu'));

    //--> HEADER
    $page = new admin_settingpage('theme_sibsu_header',  get_string('header', 'theme_sibsu'));
    $name = 'theme_sibsu/defaultlogo';
    $title = get_string('defaultlogo', 'theme_sibsu');
    $description = get_string('defaultlogo_desc', 'theme_sibsu');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'defaultlogo');
    $setting->set_updatedcallback('theme_sibsu_update_settings_images');
    $page->add($setting);
    //<-- HEADER

    $settings->add($page);

    include(dirname(__FILE__) . '/settings/other.php');
}
