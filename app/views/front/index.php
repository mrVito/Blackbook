<?php extend('layouts.main')?>

<?php section('content')?>
	<?= place('content') ?>
	<hr>
	<h2>Welcome <?=$name?>!</h2>
<?php sectionEnd()?>