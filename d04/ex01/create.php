<?php
if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['passwd'] == "") {
	echo "ERROR\n";
	return;
}
if (!(file_exists("private/")))
	mkdir("private");
$filename = './private/passwd';
if (file_exists($filename)) {
	$array = unserialize(file_get_contents($filename));
	foreach ($array as $user) {
		if ($user['login'] == $_POST['login']) {
			echo "ERROR\n";
			return;
		}
	}
}
$array[] = array('login' => $_POST['login'],
				 'passwd' => hash("whirlpool", $_POST['passwd']));
file_put_contents($filename, serialize($array));
echo "OK\n";
?>
