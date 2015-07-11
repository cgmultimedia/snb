<!-- Footer -->

		</div><!-- /#layout -->
		<?php // Copyright ?>
		<div class="Footer">
			<div class="Footer-copyright">
				&copy; Splash'N Boots <?php echo date("Y");?> | All Rights Reserved
			</div>
		</div>
		<?php include("footer_scripts.php");?>
		<?php
			// ---------- GENERAL FOOTER JAVASCRIPT ---------- 
			//include("footer_scripts");

			// ---------- ADD CUSTOMER PAGE FOOTER ----------
			if (function_exists('customPageFooter')) { 
				customPageFooter();
			}
		?>
	</body>
</html>