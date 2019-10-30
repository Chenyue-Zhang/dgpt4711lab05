<?php
namespace App\Models;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Places extends Simple\CSVModel{
    protected  $origin = WRITEPATH . 'data/Places.csv';
    protected  $keyField ='id';
    protected  $validationRules = [];
}
