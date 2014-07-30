<h4>Click on the links below to get started!</h4>
		<ul>
			<?php foreach($controllers as $page){ ?>
				<li><a href="<?php echo URL.explode(".",$page)[0]; ?>"><?php echo explode(".",$page)[0];?></li>
			<?php } ?>
		</ul>