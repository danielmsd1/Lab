<?php
  /**
   * This is to create the read, update and delete functionalities
   */
  interface Crud
  {
    public function save();
    public function readAll();
    public function readUnique();
    public function search();
    public function update();
    public function removeOne();
    public function removeAll();
    //addition of 2 methods for the second lab
    public function validateForm();
    public function createFormErrorSessions($problem);
    public function isUserExist();
  }
 ?>
