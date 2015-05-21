<!-- Footer -->
		</div><!-- /#layout -->
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