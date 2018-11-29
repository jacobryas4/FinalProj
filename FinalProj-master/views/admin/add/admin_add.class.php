<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_add
 *
 * @author jacobbryant
 */
class AdminAdd extends AdminIndexView {
    
    public function display() {
        
        // display page header
        parent::displayHeader("Add Account");
        
        ?>

    
     <div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= BASE_URL ?>/admin/addAccount" method="post">
                
               
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <input type="text" class="form-control" name="balance" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter balance" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control" name="role" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role" required>
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
    
    <!-- Display account details form -->
<!--    <form action="<?= BASE_URL ?>/admin/addAccount" method="post" >
        
        <p>Username:</p>
        <input type="text" name="username">
        
        <p>Password:</p>
        <input type="text" name="password">
        
        <p>Email:</p>
        <input type="email" name="email">
        
        <p>Balance:</p>
        <input type="text" name="balance">
        
        <p>Role:</p>
        <input type="text" name="role">
        
        <input type="submit" name="action">
    </form>-->
    
    <?php
    parent::displayFooter();
        
    }
    
}
