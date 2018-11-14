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
       
        <table id="details">
            <tr>
                <th>Account ID</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
            
            <?php
            
            foreach($accounts as $i => $account) {
                echo "<tr>";
                
                $account_id = $account->getId();
                $email = $account->getEmail();
                $username = $account->getUsername();
                
                echo "<td>" + $account_id + "</td>";
                echo "<td>" + $email + "</td>";
                echo "<td>" + $username + "</td>";
                
                echo "</tr>"; 
            }
        
        ?>
        </table>
        



        <?php
        parent::displayFooter();
    }
}
