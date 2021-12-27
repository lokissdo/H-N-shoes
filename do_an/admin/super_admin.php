			<a href="admin_view.php?link=admin<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'admin') {echo 'class="active"';} ?>>
				<li>Admin</li>
			</a>
			<a href="admin_view.php?link=manufacturers<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'manufacturers') {echo 'class="active"';} ?>>
				<li>Nhà sản xuất</li>
			</a>