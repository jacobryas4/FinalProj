<?php


/**
 * This is a dashboard that allows the administrator to see all the accounts currently held at the 
 * bank.
 *
 * @author jacobbryant
 */
class AdminIndex extends AdminIndexView {
    public function display($accounts){
        parent::displayHeader("List All Accounts");
        
        ?>

            
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
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
    </div>   
    <div class="col-2"></div>
</div>


        <?php
        parent::displayFooter();
    }
}
