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
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-4"></div>
            <div class="col">
                <form class="form-group my-2" action="<?= BASE_URL ?>/admin/search">
<!--                    <input class="form-control mr-sm-2" type="search" placeholder="Search by username" name="query-terms" aria-label="Search">
                    <div class="text-center">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                    </div>-->
                    
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="query-terms" class="form-control" id="inputPassword2" placeholder="username">
                        </div>
                        <button type="submit" class="btn btn-dark mb-2">Search</button>
                    
                </form>
            </div>
            <div class="col-4"></div>

        </div>

            
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
<div class="row">
    
    <div class="col text-center">
        <a href="<?= BASE_URL ?>/admin/add"><button class="btn btn-dark">Add Account</button></a>
    </div>
    
</div>
</div>


        <?php
        parent::displayFooter();
    }
}
