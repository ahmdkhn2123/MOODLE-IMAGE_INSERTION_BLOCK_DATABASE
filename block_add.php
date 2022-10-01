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
require_once('edit_form.php');

class block_add extends block_base
{
    

    public function init(){
		$this->title = 'Your Block';
	}
	public function get_content(){
        global $DB;
		$this->content = new stdClass();
		
		$mform = new edit_form();
		 if ($fromform = $mform->get_data()) {
            $record= new stdClass();
            $record->id = $fromform->id;
            $a=$fromform->message['text'];
			$b=preg_match_all('#src="([^\s]+)"#', $a, $matches);
            $c=implode(' ',$matches[1]);
			$record->message=$c;
			$this->content->text='<img src="'.$c.'">';
			$record->message_type=$fromform->message_type;
			$record->message_attribute=$fromform->message_attribute;
			$this->content->footer=$record->message_attribute;
			$DB->insert_record('blocks_table', $record);

		}else{
			$this->content->text = $mform->render();
		}

		return $this->content;

	}




	function has_config() {return true;}
}

