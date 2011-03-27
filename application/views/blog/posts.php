<div class="post">
<h2 class="blogH2"> <?php echo $post[0]['title'] ?></h2>
<?php
	echo "<p class=\"blogP\">Posted by Laurence on ".date("l dS F\, Y",strtotime ($post[0]['datet']))."</p>";
?>
	<?php
		echo $post[0]['content'];
	?>
</div>