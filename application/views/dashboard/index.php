<?php
$user_data = ($this->data['user_info']);

?>
<div class="container">
    <div class="Box">
        <div class="Panel">
            <div class="Top shadow">
                <img src="" alt="" />
            </div>
            <div class="SidePanel">
                <ul>
                    <li>
                        <a href="<?= base_url("dashboard/page/addPost") ?>">
                            <img src="<?= base_url('/assets/images/Icons/plus.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url("dashboard/page/userInfo") ?>">
                            <img src="<?= base_url('/assets/images/Icons/user.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url("dashboard/page/editPass") ?>">
                            <img src="<?= base_url('/assets/images/Icons/key.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url("dashboard/page/notificationInfo") ?>">
                            <img src="<?= base_url('/assets/images/Icons/bell.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url('/assets/images/Icons/comments.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url("dashboard/page/commentsInfo") ?>">
                            <img src="<?= base_url('/assets/images/Icons/comment.svg') ?>" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url("dashboard/page/settings") ?>">
                            <img src="<?= base_url('/assets/images/Icons/setting.svg') ?>" alt="" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="Content" id="Content">
                <?php
					$this->load->view($this->data['dashboard_page']);
				 ?>
            </div>
        </div>
    </div>
</div>
