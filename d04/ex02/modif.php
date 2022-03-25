<?php
if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['oldpw'] == "" || $_POST['newpw'] == "") {
	echo "ERROR\n";
	return;
}
$filename = '../ex01/private/passwd';
$array = unserialize(file_get_contents($filename));
$oldpw = hash("whirlpool", $_POST['oldpw']);
foreach ($array as &$user) {
	if ($user['login'] == $_POST['login'] && $user['passwd'] == $oldpw) {
		$user['passwd'] = hash("whirlpool", $_POST['newpw']);
		file_put_contents($filename, serialize($array));
		echo "OK\n";
		return;
	}
}
echo "ERROR\n";
?>