<?php
/*
 * Author: Adam Patrick
 *  Date: 11/11/18
 * File Name: dashboard_index.class.php
 * Description: Define a class that displays account balance and transaction information
 */

class UserDashboardView {

    //create the method that will be called to display this page
    public function display($transactions, $account) {

        ?>
        <!--Create a div and display the balance for the account-->
        <div id="balance">
                <?php
                $balance = $account->getBalance();
                echo "<h3> Balance: </h3>";
                echo "<p>" . $balance . "</p>";
                ?>
        </div>    

        <!--Create table and table headers-->
        <table class="table table-striped bg-light">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Date of Transaction</th>
                    <th scope="col">Transaction Type</th>
                </tr>
            </thead>
            <tbody>


                <?php
                //use a foreach loop to populate the table with data from the db
                //itterate through the accounts in the array from the db
                foreach ($transactions as $transaction) {
                    echo "<tr>";
                    //use methods from the model to pull data from the account object
                    $transaction_id = $transaction->getTransaction_Id();
                    $date_of_transaction = $transaction->getDate_Of_Transaction();
                    $transaction_type = $transaction->getTransaction_Type();
                    //add the data to the table
                    echo "<td>" . $transaction_id . "</td>";
                    echo "<td>" . $date_of_transaction . "</td>";
                    echo "<td>" . $transaction_type . "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="bottom-row">
            <span style="float: left">Want to logout? <a href="<?= BASE_URL ?>/user/logout">Logout</a></span>
        </div>

        <?php

    }

}
