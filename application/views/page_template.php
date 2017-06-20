<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php
foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.menu a
{
	color: #fff;
	text-decoration: none;
	font-size: 18px;
}
</style>
</head>
<body>
<div class="menu">
  <a href='<?php echo site_url('main/computers');?>'>Computers</a> |
  <a href='<?php echo site_url('main/soft');?>'>Soft</a> |
  <a href="<?php echo site_url('auth/logout'); ?>">Logout</a> |
  <a href="<?php echo site_url('auth/create_user'); ?>">Register new user</a> |
  <a href="<?php echo site_url('auth/'); ?>">All users</a> |
  <a href="<?php echo site_url('main/first_query'); ?>">First query</a> |
  <a href="<?php echo site_url('main/second_query'); ?>">Second query</a> |
  <a href="<?php echo site_url('main/third_query'); ?>">Third query</a>
</div>
<div style='height:20px;'></div>
	<div>
  <?php echo $output; ?>
	</div>
</body>
</html>