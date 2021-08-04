<?php
//$captcha_image=($this->data['Captcha']);
?>
<div class="container">
    <div class="Container">
        <div class="Storage">
            <div class="Rail">
                <div class="Block Login active text-center">
                    <form action="<?php echo base_url('index.php/Login/check_user') ?>" method="post">
                        <h3>ورود</h3>
                        <input type="text" class="form-control" name="username" placeholder="نام کاربری" required />
                        <input type="password" class="form-control" name="password" placeholder="گذرواژه" required />
                        <div id="alert-message">
                            <?php
                            if (isset($message_danger)) {
                            ?>
                                <div class="alert alert-danger round-circle mt-3">
                                    <?= $message_danger ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit">ورود</button>
                    </form>
                </div>
                <div class="SwitchBox active">
                    <div class="LoginBtn" onClick="ToggleMove(true)">
                        ورود
                    </div>
                    <div class="SignInBtn" onClick="ToggleMove(false)">
                        ثبت نام
                    </div>
                </div>
                <div class="Block SignIn text-center">
                    <form action="<?php echo base_url('index.php/Login/register') ?>" method="post">
                        <h3>ثبت نام</h3>
                        <input type="text" class="form-control" name="name" placeholder="نام" required />
                        <input type="text" class="form-control" name="username" placeholder="نام کاربری" required />
                        <input type="password" class="form-control" name="password" onchange="CheckPassword()" placeholder="گذرواژه" required />
                        <input type="password" class="form-control" name="confirm" onchange="CheckPassword()" placeholder="تکرار گذرواژه" required />
                        <div id="alert-message">
                            <?php
                            if (isset($message_danger)) {
                            ?>
                                <div class="alert alert-danger round-circle mt-3">
                                    <?= $message_danger ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ToggleMove = (block) => {
        if (block) {
            $(".Login").addClass("active");
            $(".SignIn").removeClass("active");
            $(".SwitchBox").addClass("active");
        } else {
            $(".SignIn").addClass("active");
            $(".Login").removeClass("active");
            $(".SwitchBox").removeClass("active");
        }
    };
	const CheckPassword = () => {
		const password = document.querySelector('input[name=password]');
		const confirm = document.querySelector('input[name=confirm]');
		if (confirm.value === password.value) {
			confirm.setCustomValidity('');
		} else {
			confirm.setCustomValidity('Passwords do not match');
		}
	}
</script>
