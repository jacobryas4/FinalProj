<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_update
 *
 * @author jacobbryant
 */
class AdminUpdate extends AdminIndexView {
    
    public function display($account) {
        
         // display page header
        parent::displayHeader("Update Account");
        
        ?>

         <div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= BASE_URL ?>/admin/updateAccount/<?= $account->getAccount_id()?>" method="post">
                
               
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $account->getUsername(); ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $account->getEmail(); ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <input type="text" name="balance" class="form-control" value="<?= $account->getPassword(); ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" aria-describedby="emailHelp" value="<?= $account->getBalance(); ?>" required>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="form-actions text-center">
                    <button type="submit" class="btn btn-primary" name="action">Submit</button>
                    
                </div>
                
            </form>
        </div>
        <div class="col-3"></div>
    </div>
         <div class="row">
             <div class="col text-center">
                 <br><br>
                 <a href="<?= BASE_URL ?>/admin/index"><button class="btn btn-outline-dark">Back to Dashboard</button></a>
             </div>
         </div>
     </div>

    <?php
    parent::displayFooter();
        
    }
    
}
