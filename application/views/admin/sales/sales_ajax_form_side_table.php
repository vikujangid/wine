<table class="table table-bordered">
    <tbody>
        <tr>            
        <?php foreach ($sizes as $key => $value) { ?>
        <td>
            <h4 align="center"><?php echo $value['size_type'] ?></h4>
            <div class="">
                <label>Initial</label>
                <input type="number" class="form-control" name="size[<?php echo $value['size_type'] ?>][quantity_initial]" value="<?php echo $value['quantity_initial'] ?>">
            </div>
            <div class="">
            <label>Credit</label>
                <input type="number" class="form-control" name="size[<?php echo $value['size_type'] ?>][quantity_credit]" value="<?php echo $value['quantity_credit'] ?>">
            </div>
            <div class="">
            <label>Shipped</label>
                <input type="number" class="form-control" name="size[<?php echo $value['size_type'] ?>][quantity_shipped]" value="<?php echo $value['quantity_shipped'] ?>">
            </div>
            <div class="">
            <label>Sold</label>
                <input type="number" class="form-control" name="size[<?php echo $value['size_type'] ?>][quantity_sold]" value="<?php echo $value['quantity_sold'] ?>">
            </div>
        </td>
        <?php } ?>
        </tr>
    </tbody>
</table>
<div class="form-group">
              <div class="col-md-10">
               <input type="submit" value="submit" name="submit" class="btn btn-primary"/>
              </div>
            </div>