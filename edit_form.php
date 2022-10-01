<?php /** @noinspection ALL */
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
 *
 * @package    block_add
 * @copyright  Mohammad Ahmad
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */






require_once("$CFG->libdir/formslib.php");

class edit_form extends moodleform {
    public function definition() {
        global $CFG;

        $mform = $this->_form;
        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        $mform->addElement('editor', 'message', get_string('message','blocks_table')); 
        $mform->setType('message', PARAM_RAW);                   
        $mform->setDefault('message', get_string('message','blocks_table'));
        $mform->addElement('text', 'message_attribute', get_string('Attribute', 'blocks_table'), $attributes=array('size'=>'20'));
        $choices = array();
        $choices['0'] = \core\output\notification::NOTIFY_WARNING;
        $choices['1'] = \core\output\notification::NOTIFY_SUCCESS;
        $choices['2'] = \core\output\notification::NOTIFY_ERROR;
        $choices['3'] = \core\output\notification::NOTIFY_INFO;
        $mform->addElement('select', 'message_type', get_string('message_type', 'blocks_table'), $choices);
        $mform->setDefault('message_type', '3');
        $this->add_action_buttons();
    

    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}
