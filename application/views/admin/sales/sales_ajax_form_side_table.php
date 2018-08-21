
<table class="table table-bordered">
    <tbody>
        <?php foreach ($sizes2 as $key => $value) { ?>
        <tr>            
        <td><?php echo $value['size_type'] ?> (<?php echo round($value['rate_per_unit']) ?>) X <?php echo $value['quantity_sold'] ?></td>
        
        <td><?php echo $value['quantity_sold'] *  $value['rate_per_unit']; ?></td>
        </tr>
        <?php } ?>
        <tr><td>Total Sale</td><td><?php echo $total_sales_prices ?></td></tr>
    </tbody>
</table>
<hr>
<table class="table table-bordered">
    <tr>
        <th class="text-center" align="center" colspan="4">English</th>
    <tr>
        <td>Initial</td>
        <td><?php echo $quantities['quantities_full_wine']->quantity_initial; ?></td>
        <td><?php echo $quantities['quantities_half_wine']->quantity_initial; ?></td>
        <td><?php echo $quantities['quantities_quarter_wine']->quantity_initial; ?></td>
    </tr>
    <tr>
        <td>Credit</td>
        <td><?php echo $quantities['quantities_full_wine']->quantity_credit; ?></td>
        <td><?php echo $quantities['quantities_half_wine']->quantity_credit; ?></td>
        <td><?php echo $quantities['quantities_quarter_wine']->quantity_credit; ?></td>
    </tr>
    <tr>
        <td>Shipped</td>
        <td><?php echo $quantities['quantities_full_wine']->quantity_shipped; ?></td>
        <td><?php echo $quantities['quantities_half_wine']->quantity_shipped; ?></td>
        <td><?php echo $quantities['quantities_quarter_wine']->quantity_shipped; ?></td>
    </tr>
    <tr>
        <td>Sold</td>
        <td><?php echo $quantities['quantities_full_wine']->quantity_sold; ?></td>
        <td><?php echo $quantities['quantities_half_wine']->quantity_sold; ?></td>
        <td><?php echo $quantities['quantities_quarter_wine']->quantity_sold; ?></td>
    </tr>
    <tr>
        <td>Remaining</td>
        <td><?php echo $quantities['quantities_full_wine']->quantity_remaining; ?></td>
        <td><?php echo $quantities['quantities_half_wine']->quantity_remaining; ?></td>
        <td><?php echo $quantities['quantities_quarter_wine']->quantity_remaining; ?></td>
    </tr>
</tr>
<table class="table table-bordered">
    <tr><th class="text-center" align="center" colspan="4">Beer</th></tr>
    <tr>
        <td>Initial</td>
        <td><?php echo $quantities['quantities_full_beer']->quantity_initial; ?></td>
        <td><?php echo $quantities['quantities_half_beer']->quantity_initial; ?></td>
        <td><?php echo $quantities['quantities_quarter_beer']->quantity_initial; ?></td>
    </tr>
    <tr>
        <td>Credit</td>
        <td><?php echo $quantities['quantities_full_beer']->quantity_credit; ?></td>
        <td><?php echo $quantities['quantities_half_beer']->quantity_credit; ?></td>
        <td><?php echo $quantities['quantities_quarter_beer']->quantity_credit; ?></td>
    </tr>
    <tr>
        <td>Shipped</td>
        <td><?php echo $quantities['quantities_full_beer']->quantity_shipped; ?></td>
        <td><?php echo $quantities['quantities_half_beer']->quantity_shipped; ?></td>
        <td><?php echo $quantities['quantities_quarter_beer']->quantity_shipped; ?></td>
    </tr>
    <tr>
        <td>Sold</td>
        <td><?php echo $quantities['quantities_full_beer']->quantity_sold; ?></td>
        <td><?php echo $quantities['quantities_half_beer']->quantity_sold; ?></td>
        <td><?php echo $quantities['quantities_quarter_beer']->quantity_sold; ?></td>
    </tr>
    <tr>
        <td>Remaining</td>
        <td><?php echo $quantities['quantities_full_beer']->quantity_remaining; ?></td>
        <td><?php echo $quantities['quantities_half_beer']->quantity_remaining; ?></td>
        <td><?php echo $quantities['quantities_quarter_beer']->quantity_remaining; ?></td>
    </tr>
</table>