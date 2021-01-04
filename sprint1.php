<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
</head>

<body>
	<?php
	$path = './' . $_GET["path"];
	$directory = scandir($path);

	print('<h3>Current Directory: ' . str_replace('?path=', '', $_SERVER['REQUEST_URI']) . '</h3>');

	print('<table><th>Type</th><th>Name</th>');
	foreach ($directory as $f) {
		if ($f != ".." and $f != ".") {
			print('<tr>');
			print('<td>' . (is_dir($path . $f) ? "Directory" : "File") . '</td>');
			print('<td>' . (is_dir($path . $f)
				? '<a href="' . (isset($_GET['path'])
					? $_SERVER['REQUEST_URI'] . $f . '/'
					: $_SERVER['REQUEST_URI'] . '?path=' . $f . '/') . '">' . $f . '</a>'
				: $f)
				. '</td>');
			print('</tr>');
		}
	}
	print("</table>");
	?>
</body>

</html>
