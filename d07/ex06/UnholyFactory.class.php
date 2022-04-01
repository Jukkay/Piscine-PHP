<?php
class UnholyFactory {

	private $absorbed = array();

	function absorb($fighter) {
		if ($fighter instanceof CrippledSoldier) return;
		if ($fighter instanceof Fighter) {
			if (in_array($fighter, $this->absorbed)) {
				print "(Factory already absorbed a fighter of type " . $fighter->fighterType . ")" . PHP_EOL;
				return;
			}
			$this->absorbed[] = $fighter;
			print "(Factory absorbed a fighter of type " . $fighter->fighterType . ")" . PHP_EOL;
		}
		else print "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
	}

	function fabricate($request) {
		if ($request == "crippled soldier") return new CrippledSoldier();
		if ($request == "foot soldier") {
			print "(Factory fabricates a fighter of type " . $request . ")" . PHP_EOL;
			return new Footsoldier();
		}
		if ($request == "archer") {
			print "(Factory fabricates a fighter of type " . $request . ")" . PHP_EOL;
			return new Archer();
		}
		if ($request == "assassin") {
			print "(Factory fabricates a fighter of type " . $request . ")" . PHP_EOL;
			return new Assassin();
		}
		print "(Factory hasn't absorbed any fighter of type " . $request . ")" . PHP_EOL;
	}
}