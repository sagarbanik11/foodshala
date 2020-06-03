<div class="container">
    <div class="row">
      <div class="col-md-12" id="cart_details" style="margin-top: 150px">

      </div>
  </div>
</div>

<script>
 $('#cart_details').load("<?php echo base_url(); ?>cart/load");

 
 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");

   $.ajax({
    url:"<?php echo base_url(); ?>cart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     $('#cart_details').html(data);
    }
   });

 });

 $(document).on('click', '#clear_cart', function(){
 
   $.ajax({
    url:"<?php echo base_url(); ?>cart/clear",
    success:function(data)
    {
     
     $('#cart_details').html(data);
    }
   });
 
 });

 </script>