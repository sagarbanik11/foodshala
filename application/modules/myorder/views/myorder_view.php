<div class="container">
<br>
<?php echo $this->session->flashdata('msg'); ?><br>
  <div class="table-responsive">
    <table class="table table-hover table-bordered content_table" style="margin-top: 30px">
      <thead>
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Item</th>
          <th scope="col">Restaurant</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Order Date</th>
        </tr>
      </thead>
      <?php foreach ($qry->result() as $r){?>
      <tbody>
        <tr>
          <td><?= $r->oh_id?></td>
          <td><?= $r->iname?></td>
          <td><?= $r->name?></td>
          <td><?= $r->quantity?></td>
          <td><?= $r->subtotal?></td>
          <td><?= $r->date?></td>
        <tr>
      </tbody>
      <?php }?>
    </table>
  </div>
</div> 
