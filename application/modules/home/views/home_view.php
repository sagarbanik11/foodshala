<div class="container">
    <div class="row">
            <?php foreach ($qry->result() as $r){?>
                <div class="col-sm-6 col-lg-3 text-center">
                
                <div class="card ">
                    <img src="<?php echo base_url(); ?>assets/img/<?= $r->image?>" class="card-img-top mx-auto d-block" alt="..." style="width:150px;height:150px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r->iname?></h5>
                        <p class="card-text"><?= $r->name?></p>
                        <p class="card-text">
                        <svg class="bi bi-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" <?php 
                        if($r->category=='Veg'){ ?> fill="#008200"  <?php }else{ ?> fill="#964122"<?php }?>><circle cx="8" cy="8" r="8"/></svg>
                        <?= $r->category?></p>
                        <p class="card-text">Rs. <?= $r->price?></p>
                        
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="quantity" min='1' pattern="[1-9]{10}" style="width:70px;height: 25px;" value="1"  class="form-control quantity" id="<?= $r->i_id?>" />
                            </div>
                        </div>
                        <?php if (isset($_SESSION['u_id'])): 
                            if($this->session->userdata['authorization']==2):?>
                            <div class="adding<?= $r->i_id?>">
                                <button type="button" id="addtocart<?= $r->i_id?>" name="add_cart" class="btn btn-dark add_cart" data-productname="<?= $r->iname?>" data-restname="<?= $r->name?>" data-restid="<?= $r->u_id?>" data-price="<?= $r->price?>" data-productid="<?= $r->i_id?>">Add to Cart</button>
                            </div>
                            <?php endif?>
                        <?php elseif (!isset($_SESSION['u_id'])):?>
                        <button type="button" onclick="window.location.href='<?php echo site_url(); ?>/login'"  class="btn btn-dark">Add to Cart </button>
                        <?php endif?>
                    </div>
                </div>
            
            </div>
                
            <?php }?>
           
        </div>
        </div>


<script>
$(document).ready(function(){
 
 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var rest_name = $(this).data("restname");
  var product_price = $(this).data("price");
  var rest_id= $(this).data("restid");
  var quantity = $('#' + product_id).val();

  var quantity = Math.round(quantity);


  $(this).val("");
  $(this).val(parseInt(quantity));
  if(quantity != '' && quantity >= 1)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>cart/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, rest_name:rest_name, rest_id:rest_id, product_price:product_price, quantity:quantity},
    success:function(data)
    {
       

        $("#addtocart" + product_id).remove();
        $(".adding"+ product_id).before('<a href="<?=site_url('cart')?>" class="btn btn-outline-dark">View Cart</a>');
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });
});

</script>
