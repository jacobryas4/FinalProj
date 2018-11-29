<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_search
 *
 * @author jacobbryant
 */
class AdminSearch extends AdminIndexView {
    
    public function display($terms, $accounts) {
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
                    <th scope="col">Account ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                  </tr>
                </thead>
                <tbody>
                  
            
            <?php
                if ($accounts === 0) {
                    echo "No accounts were found.<br><br><br>";
                } else {
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
                }

            ?>
                </tbody>
                </table>
            </div>   
            <div class="col-2"></div>
        </div>
</div>
        <a href="<?= BASE_URL ?>/admin/index">Back to dashboard</a>
        <?php
        // display footer
        parent::displayFooter();
        
    }
    
}
