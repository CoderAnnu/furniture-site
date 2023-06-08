<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="login-form">
    <div class="login-gap top"></div>
    <?php if (!is_user_logged_in()): ?>
            <?php EMPELZA_Admin::empelza_login_form(''); ?>
    <?php endif; ?>
    <div class="login-gap bottom"></div>
</div>


