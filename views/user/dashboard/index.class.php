<?php

class Index extends IndexView {
    public function display($transactions) {
        parent::displayHeader("The Time Bank");
        ?>
        <div class='container' id='main-header'>
            <h4>Welcome to your Account Dashboard, <?php echo $_COOKIE['username'] ?>!</h4>
            <br/>
            <form class="form-inline" action="<?= BASE_URL ?>/user/search">

                <input type="text" name="query-terms" class="form-control" placeholder="Search Transactions" onkeyup="handleKeyUp(event)" id="searchBoxuser" required>
                <button type="submit" class="btn btn-info">Search</button>

            </form>
            <div id="suggestionDivuser"></div>
            <!-- <table class="table table-striped bg-light">
                <thead>
                    <tr>
                        <th scope="col">Account ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // foreach ($transactions as $transaction) {
                    //     echo "<tr>";
                    //     $account_id = $account->getAccount_Id();
                    //     $email = $account->getEmail();
                    //     $username = $account->getUsername();
                    //     $balance = $account->getBalance();
                    //     echo "<td>" . $account_id . "</td>";
                    //     echo "<td>" . $email . "</td>";
                    //     echo "<td>" . $username . "</td>";
                    //     echo "<td>" . $balance . "</td>";
                    //     echo "</tr>";
                    // }
                    ?>
                </tbody>
            </table> -->
            
            <table class="table table-striped bg-light">
                <thead>
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Recipient</th>
                        <th scope="col">Date of Transaction</th>
                    </tr>
                </thead>
                <tbody>
                    </div>


                    <?php
                    
                    foreach ($transactions as $transaction) {
                        
                        echo "<tr>";
                        $transaction_id = $transaction->getTransaction_Id();
                        $amount = $transaction->getAmount();
                        $transaction_type = $transaction->getTransaction_Type();
                        $date_of_transaction = $transaction->getDate_Of_Transaction();
                        $recipient = $transaction->getRecipient();
                        
                        echo "<td>" . $transaction_id . "</td>";
                        echo "<td>" . $amount . "</td>";
                        echo "<td>" . $transaction_type . "</td>";
                        echo "<td>" . $recipient . "</td>";
                        echo "<td>" . $date_of_transaction . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            
        </div>

        <script src="<?= BASE_URL ?>/www/js/userAutoSuggest.js" type="text/javascript"></script>
        
        <?php
        parent::displayFooter();
    }
}
