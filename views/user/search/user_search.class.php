


<?php
/**
 * Description of user_search
 *
 * @author jacobbryant
 */
class UserSearch extends UserIndexView {
    
    public function display($terms, $transactions) {
        // display header
        parent::displayHeader("Search results");
        ?>
<div class="container">
    
    <div class="row">
        <div class="col text-center">
            <h3>Search Results for '<?= $terms ?>'</h3>
        </div>
    </div>

        <!-- end of header -->
        
        <!-- Display accounts -->
        <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
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
                  
            
            <?php
                if ($transactions === 0) {
                    echo "No transactions were found.<br><br><br>";
                } else {
                    foreach($transactions as $transaction) {
                        echo "<tr>";

                        $transaction_id = $transaction->getTransaction_Id();
                        $amount = $transaction->getAmount();
                        $transactionType = $transaction->getTransaction_type();
                        $recipient = $transaction->getRecipient();
                        $date = $transaction->getDate_of_transaction();

                        echo "<td>" . $transaction_id . "</td>";
                        echo "<td>" . $amount . "</td>";
                        echo "<td>" . $transactionType . "</td>";
                        echo "<td>" . $recipient . "</td>";
                        echo "<td>" . $date . "</td>";

                        echo "</tr>"; 
                    }
                }

            ?>
                </tbody>
                </table>
            </div>   
            <div class="col-2"></div>
        </div>
</div>
        <a href="<?= BASE_URL ?>/user/index/<?=$_COOKIE['id'] ?>">Back to dashboard</a>
        <script src="<?= BASE_URL ?>/www/js/autosuggest.js" type="text/javascript"></script>
        <?php
        // display footer
        parent::displayFooter();
        
    }
    
}
