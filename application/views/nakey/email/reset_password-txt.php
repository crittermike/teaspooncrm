Hi<?php if (strlen($username) > 0) { ?> <?php echo $username; ?><?php } ?>,

You have changed your password.
Please, keep it in your records so you don't forget it.
<?php if (strlen($username) > 0) { ?>

Your username: <?php echo $username; ?>
<?php } ?>

Your email address: <?php echo $email; ?>

If you did not authorize this change, please notify your account administrator.

Thank you,
The <?php echo $site_name; ?> Team
