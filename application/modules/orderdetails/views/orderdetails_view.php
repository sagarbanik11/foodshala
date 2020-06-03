<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered content_table" style="margin-top: 30px">
      <thead>
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Item Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Order Date</th>
        </tr>
      </thead>
      <?php foreach ($qry->result() as $r){?>
      <tbody>
        <tr>
          <td><?= $r->oh_id?></td>
          <th scope="row"><b><?= $r->name?></th>
          <td><?= $r->iname?></td>
          <td><?= $r->quantity?></td>
          <td><?= $r->subtotal?></td>
          <td><?= $r->date?></td>
        </tr> 
      </tbody>
      <?php }?>
    </table>
  </div>
</div> 
