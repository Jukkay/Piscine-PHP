<?php

class NightsWatch implements IFighter {

	private $output = array();

	function recruit($recruit) {
		if ($recruit instanceof IFighter)
			$this->output[] = $recruit;
	}

	function fight() {
		foreach ($this->output as $recruit) {
			$recruit->fight();
		}
	}
}