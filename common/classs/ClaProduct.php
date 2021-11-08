<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClaProduct {
    
    public static function getDiscount($price_market, $price) {
        return round(($price_market - $price) / ($price_market / 100));
    }
    
}

