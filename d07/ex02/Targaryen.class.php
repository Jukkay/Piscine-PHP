<?php
class Targaryen {

	function resistsFire() {
		return False;
	}
	function getBurned() {
		if ($this->resistsFire())
			return "emerges naked but unharmed";
		return "burns alive";
	}
}