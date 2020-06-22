 
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('public/js/jquery.js');?>"></script>
  <script src="<?php echo base_url('public/js/bootstrap.js');?>"></script>
  <!-- Template Custom JavaScript File -->
  <script src="<?php echo base_url('public/js/custom.js');?>"></script>
  <script type="text/javascript">
  	$(".comment-button").click(function() {
  		var value = this.value;
	  $("#"+value).show();
	});
  </script>

</body>

</html>
