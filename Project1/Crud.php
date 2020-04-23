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
  }
 ?>
