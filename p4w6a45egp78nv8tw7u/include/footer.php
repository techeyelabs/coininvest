</div> <!-- bgwrap -->
	</div>
<!--data table-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/DT_bootstrap.js"></script>

<!--script for editable table-->
<script src="js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

jQuery(document).ready(function($){
    EditableTable.init();
});
</script>

	 <!-- container -->
</body>
</html>

<?php 
unset($_SESSION['success_flag']);
unset($_SESSION['succ_dir']);

unset($_SESSION['empty_pass']);
?>
