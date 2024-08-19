<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        } 
        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        } 
        tfoot tr th, tfoot tr td{
            font-size: 20px;
        }
        tfoot tr th{
            text-align: right;
        }
    </style>
</head>
<body>
    <table>
        <thead>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
        </thead>
        <tbody>
            <?php if(!empty($transactions)): ?>
                <?php foreach($transactions as $transaction):  ?>
                    <tr>
                    <td><?= foramtDate($transaction['date']) ?></td>
                    <td><?= $transaction['checkNumber'] ?></td>
                    <td><?= $transaction['description'] ?></td>
                    <td>
                    <?php if($transaction['amount'] < 0): ?>
                    
                    <span style="color: red;">
                        <?= formatDollarAmount($transaction['amount']) ?>
                    </span>
                    <?php elseif($transaction['amount'] > 0): ?>
                    <span style="color: green;">
                        <?= formatDollarAmount($transaction['amount']) ?>
                    </span>
                        <?php else: formatDollarAmount($transaction['amount'])?>
                    <?php endif ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income: </th>
                <td><?= formatDollarAmount($totals['totalIncome']) ?? 0  ?></td>
            </tr>
            <tr>
            <th colspan="3">Total Expense: </th>
                <td><?= formatDollarAmount($totals['totalExpense']) ?? 0  ?></td>
            </tr>
            <tr>
            <th colspan="3">Net Total: </th>
                <td><?= formatDollarAmount($totals['netTotal']) ?? 0  ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>