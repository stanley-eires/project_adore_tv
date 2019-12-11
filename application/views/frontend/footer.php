<footer class="footer" style='z-index:100'>
	<div class="container-fluid">
		<nav>
			<ul>
				<li><a href="#">Blog</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="<?= base_url('home/faq')?>">FAQ</a></li>
				<?php 
					$pages = $this->db->get_where("pages",['status'=>1,'popup'=>0])->result();
					foreach ($pages as $page):?>
				<li><a href="<?= base_url('home/page/'.$page->name)?>"><?=$page->name?></a></li>
				<?php endforeach ?>
			</ul>
		</nav>
		<div class="copyright" id="copyright">
		&copy;<?= date('Y')?> <a href="http://AdoreTv.com/" rel="nofollow"> Adore Tv</a>
		</div>
	</div>
	
</footer>
