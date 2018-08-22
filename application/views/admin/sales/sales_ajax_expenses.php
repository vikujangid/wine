<hr />
<h4>Expenses</h4>
<div>

<table class="table table-bordered">
    <thead>
        <th>Amount</th><th>Type</th><th>Comment</th><th>Options</th>
    </thead>
    <tbody>
        <?php foreach ($expenses as $key => $value) { ?>
        <tr>            
        <td><?php echo $value->amount; ?></td>
        <td>
            <?php if($value->transaction_type == "Credit") { ?>
                <?php echo $value->transaction_type; ?> <span class="text-success"><i class="fa fa-plus"></i></span>
            <?php } else { ?>
                <?php echo $value->transaction_type; ?> <span class="text-danger"><i class="fa fa-minus"></i></span>
            <?php } ?>
        <td><?php echo $value->title; ?></td>
        <td><a href="javascript:" class="btn btn-danger" onclick="delete_expense(this)" data-url="<?php echo site_url('expenses/delete_ajax/'.$value->id); ?>"> <i class="fa fa-remove"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<button type="button" class="btn btn-success" onclick="open_expense_add_form(<?php echo $shop_id; ?>, '<?php echo $date; ?>')">Add <i class="fa fa-plus"></i></button>
