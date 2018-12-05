<?php
/*
 * Ryan Byrd
 * 12/4/2018
 * index.class.php
 * displays the user's account and transactions
 */

class Index extends IndexView {

    public function display($transactions) {
        parent::displayHeader("The Time Bank");
        ?>
        <div class='container' id='main-header'>
            <h4>Welcome to your Account Dashboard, <?php echo $_COOKIE['username'] ?>!</h4>
            <br/>
            <form class="form-inline" action="<?= BASE_URL ?>/admin/search">

                <input type="text" name="query-terms" class="form-control" id="inputPassword2" placeholder="Search Transactions">
                <button type="submit" class="btn btn-info">Search</button>

            </form>

            <table class="table table-striped bg-light">
                <thead>
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Date of Transaction</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    </div>


                    <?php
                    //var_dump($transactions);

                    foreach ($transactions as $transaction) {
                        echo "<tr>";

                        $transaction_id = $transaction->getTransaction_Id();
                        $amount = $transaction->getAmount();
                        $transaction_type = $transaction->getTransaction_Type();
                        $date_of_transaction = $transaction->getDate_Of_Transaction();

                        echo "<td>" . $transaction_id . "</td>";
                        echo "<td>" . $amount . "</td>";
                        echo "<td>" . $transaction_type . "</td>";
                        echo "<td>" . $date_of_transaction . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <?php
        parent::displayFooter();
    }

}
