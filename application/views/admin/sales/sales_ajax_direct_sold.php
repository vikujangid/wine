
<hr />
<h4>Desi</h4>
<div>
<table class="table table-bordered">
    <thead>
        <th>Quantity</th><th>Sold To</th><th>Amount / Quantity</th><th>Options</th>
    </thead>
    <tbody>
        <?php $total_quantity = 0; $total_price = 0; ?>
        <?php foreach ($solds as $key => $value) { ?>
        <?php $total_quantity = $total_quantity + $value->quantity;  $total_price = $total_price + $value->price_total; ?>
        <tr>            
            <td><?php echo $value->quantity; ?></td>
            <td><?php echo $value->buyer_name; ?></td>
            <td><?php echo $value->quantity; ?> X <?php echo $value->price_per_quantity; ?> = <?php echo $value->price_total; ?></td>
            <td>
                <a href="javascript:" class="btn btn-danger" onclick="delete_direct_sale(this)" data-url="<?php echo site_url('sales/delete_direct_sale/'.$value->id); ?>"> <i class="fa fa-remove"></i></a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2">Total: <?php echo $total_quantity; ?></td>
            <td><?php echo $total_price; ?></td>
            <td></td>
        </tr>
    </tbody>
</table>
</div>
<button type="button" class="btn btn-success" onclick="open_direct_sold_add_form()">Add <i class="fa fa-plus"></i></button>