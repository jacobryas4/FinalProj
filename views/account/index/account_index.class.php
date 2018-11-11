<?php

/*
 * Author: Adam Patrick
 *  Date: 11/11/18
 * File Name: account_index.class.php
 * Description: 
 */

class AccountIndex extends AccountIndexView{
    public function display($accounts){
        parent::displayHeader();

        ?>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
        
        <table id="details">
            <tr>
                <th>Account ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            
            <?php
            
            foreach($accounts as $i => $account) {
                $account_id = $account->getId();
                $email = $account->getEmail();
                $username = $account->getUsername();
                $password = $account->getPassword();
            }
        
            
        </table>
        



        <?php
    }
}
