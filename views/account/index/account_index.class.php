<?php

/*
 * Author: Adam Patrick
 *  Date: 11/11/18
 * File Name: account_index.class.php
 * Description: 
 */

class AccountIndex extends AccountIndexView {
    public function display($accounts){
        parent::displayHeader("List All Accounts");
        
        ?>
            
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
                    
            foreach($accounts as $account) {
                echo "<tr>";
                
                $account_id = $account->getAccount_Id();
                $email = $account->getEmail();
                $username = $account->getUsername();
                
                echo "<td>" . $account_id . "</td>";
                echo "<td>" . $email . "</td>";
                echo "<td>" . $username . "</td>";
                
                echo "</tr>"; 
            }
        
        ?>
        </tbody>
        </table>
        



        <?php
        parent::displayFooter();
    }
}
