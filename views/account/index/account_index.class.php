<?php

/*
 * Author: Adam Patrick
 *  Date: 11/11/18
 * File Name: account_index.class.php
 * Description: Define a class that displays account information
 */

class AccountIndex extends AccountIndexView {
    //create the method that will be called to display this page
    public function display($accounts){
        //display the header
        parent::displayHeader($title);
        
        ?>
            <!--Create table and table headers-->
            <table class="table table-striped bg-light">
                <thead>
                  <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                  </tr>
                </thead>
                <tbody>
                  
            
            <?php

            //use a foreach loop to populate the table with data from the db
            //itterate through the accounts in the array from the db
            foreach($accounts as $account) {
                echo "<tr>";
                //use methods from the model to pull data from the account object
                $account_id = $account->getAccount_Id();
                $email = $account->getEmail();
                $username = $account->getUsername();
                //add the data to the table
                echo "<td>" . $account_id . "</td>";
                echo "<td>" . $email . "</td>";
                echo "<td>" . $username . "</td>";
                
                echo "</tr>"; 
            }
        
        ?>
        </tbody>
        </table>
        



        <?php
        //display the footer
        parent::displayFooter();
    }
}
