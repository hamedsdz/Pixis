<header>
	<div class="MenuToggle" onclick="MenuToggler()"></div>
	<a href="<?= base_url() ?>" class="">
		<img src="<?= base_url('/assets/images/pixis.svg') ?>" alt="pixis">
	</a>
	<nav class="NavbarCol">
		<ul class="NavbarCollapse">
			<li class="NavItem">
				<a href="<?php echo base_url('posts') ?>">پست ها</a>
			</li>
			<li class="NavItem">
				<a href="#Popular">محبوب ترین ها</a>
			</li>
			<li class="NavItem">
				<a href="#AboutUs">درباره ما</a>
			</li>
		</ul>
	</nav>

	<button class="login"></button>
	<div class="clearfix"></div>
</header>

<script>
	const MenuToggler = () => {
		$(".MenuToggle").toggleClass("active");
		$(".NavbarCol").toggleClass("active");
	};
	const changeContent = () => {
		if ($(window).width() < 767) {
			$(".login").html("<span class='fa fa-sign-in'></span>");
			$(".login").css("font-size", "2rem");
			$(".login").css("line-height", "2rem");
		} else {
			$(".login").html("<?= (get_cookie('username') == null) ? 'ثبت نام | ورود' : 'داشبورد' ?>");
			$(".account").text("ثبت نام");
			$(".login").css("font-size", "1.2rem");
			$(".login").css("line-height", "1.2rem");
		}
		$('.login').click(function() {
			window.location = "<?= (get_cookie('username') == null) ? base_url('Login') : base_url('dashboard') ?>";
		});
	};
	$(document).ready(() => {
		changeContent();
		$(window).resize(() => changeContent());
	})
</script>