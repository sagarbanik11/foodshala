<div class="container">
  <div class="row justify-content-center">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 ">
      <form class="form-horizontal" method="post" action="<?=site_url('additem/add')?>" enctype="multipart/form-data">
        <br>
        <fieldset>
          <legend >Add Item</legend>			
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Item Name</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Item Name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="category" class="cols-sm-2 control-label">Category</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <select id="category" name="category" class="custom-select">
                  <option value="Veg" selected>Veg</option>
                  <option value="Non Veg">Non Veg</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="cols-sm-2 control-label">Price</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <input type="number" class="form-control" name="price" id="price"  placeholder="Enter Price" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="itemimage" class="cols-sm-2 control-label">Item Image</label>
            <div class="cols-sm-10">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" id="upload" name="upload" class="custom-file-input" id="inputGroupFile01" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
              </div>
              <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
          <div class="form-group ">
            <button type="submit" class="btn btn-dark">Add</button>
          </div>
          <?php echo $this->session->flashdata('msg'); ?>
        </fieldset>
      </form>
    </div>

   
  <legend >Your Menu</legend>		
    <table class="table table-hover table-bordered content_table">
      <thead>
          <tr>
            <th scope="col">Item Image</th>
            <th scope="col">Item Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
          </tr>
      </thead>
          <?php foreach ($items->result() as $r){?>
      <tbody>
        <tr>
          <th scope="row"><img src="<?php echo base_url(); ?>assets/img/<?= $r->image?>" style="width:50px"></th>
          <td><?= $r->iname?></td>
          <td><?= $r->category?></td>
          <td><?= $r->price?></td>
        </tr>
        <tr>
      </tbody>
       <?php }?>
    </table>
</div> 
