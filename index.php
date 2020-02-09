<?php

if (isset($_POST['url']) && filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
	
	$key = uniqid('');
	$data = '<head><meta http-equiv="Refresh" content="0; URL='.$_POST['url'].'"></head>';

	$result = file_put_contents('./u/' . $key, $data);

	$host =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

	if ($result) {
		echo 'Saved.';
		echo 'Your key: <b><a href="' . $host . '/u/' . $key . '">u/' . $key . '</a></b>';
		echo '<input value="/u/' . $key . '" />';
		echo '<br/><button onclick="copy()">Copy to clipboard</button>';
		echo '
	<script>
		function copy() {
			var text = document.querySelector("input");
			text.select();
			text.setSelectionRange(0, 99999); /*For mobile devices*/
			document.execCommand("copy");
			alert("Copied");
		}
	</script>';
		echo '
	<style>
		input {
			width: 4px;
			height: 10px;
			border: none;
			resize: none;
			background: none;
			position: fixed;
			top: -10px;
			left: -10px
		}
	</style>';

	} else {
		echo 'Error. Try again';
	}
} else {

?>

	<form method="post">
		<input type="url" name="url" required />
		<button>Shorten</button>
	</form>

<?php
}
?>
