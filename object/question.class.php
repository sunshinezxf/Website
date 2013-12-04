<?php
class question {
	private $question_id;
	private $question_title;
	private $question_category;
	private $question_description;
	private $question_username;
	private $question_path;
	public function question($question_id, $question_title, $question_category, $question_description, $question_username, $question_path) {
		$this->question_id = $question_id;
		$this->question_title = $question_title;
		$this->question_category = $question_category;
		$this->question_description = $question_description;
		$this->question_username = $question_username;
		$this->question_path = $question_path;
	}
	public function get_question_id() {
		return $this->question_id;
	}
	public function get_question_title() {
		return $this->question_title;
	}
	public function get_question_category() {
		return $this->question_category;
	}
	public function get_question_description() {
		return $this->question_description;
	}
	public function get_question_username() {
		return $this->question_username;
	}
	public function get_question_path() {
		$this->question_path = str_replace ( "D:/Programming/PHP/Appserv/www/Website", "..", $this->question_path );
		return $this->question_path;
	}
}

?>