<?php

/**
 * Created by PhpStorm.
 * User: priyanklad
 * Date: 2019-03-06
 * Time: 09:51
 */
function getProductData() {
    global $con;
    $sql = "select * from tblproductcategory";
    $query = mysqli_query($con, $sql);
    while ($result = mysqli_fetch_assoc($query)) {
        if (($rows = mysqli_num_rows($query)) > 0) {
            //$result.=$result;
            $product = <<<DELIMETER
                                    <li class="product has-post-thumbnail column-1_3 instock purchasable">
                                    <div class="post_item_wrap">
                                        <div class="post_featured">
                                            <div class="post_thumb">
                                                <a class="hover_icon hover_icon_link" href="single-product.php">
                                                    <img src={$result['imagepath']}
                                                         class="attachment-shop_catalog size-shop_catalog" alt=""/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post_content">
                                            <h2 class="woocommerce-loop-product__title">
                                                <a href="single-product.php?id={$result['id']}">{$result['name']}</a>
                                            </h2>
                                            
                                      
                                            <a rel="nofollow" href="single-product.php?id={$result['id']}"
                                               data-quantity="1" data-product_id="471" data-product_sku=""
                                               class="button add_to_cart_button">Select options</a>
                                        </div>
                                    </div>
                                    </li>
DELIMETER;
        } else {
            $product = "PRODUCT NOT AVAILABLE!";
        }
        echo $product;
    }
}
/*
function getProduct($id) {
    $id1 = $id;
    include "connection.php";
    //global $con;
    $sql2 = "select * from tblproduct where productcategoryid=$id1";
    $query2 = mysqli_query($con, $sql2);
    while ($result2 = mysqli_fetch_array($query2)) {
        if (($rows = mysqli_num_rows($query2)) > 0) {
            $arr[] = $result2['price'];
        } else {
            $arr[] = "Product Not Availble";
        }
        echo $arr;
    }
}

function getProductMeasurement($id) {
    $id2 = $id;
    include "connection.php";
    //global $con;
    $sql3 = "select * from tblmeasurement where id=$id2";
    $query3 = mysqli_query($con, $sql3);
    while ($result2 = mysqli_fetch_array($query3)) {
        if (($rows = mysqli_num_rows($query3)) > 0) {
            $product2 = <<<DELIMETER
                    
                <!--<option value="{$result2['price']}">{$result2['price']}</option>-->
DELIMETER;
        } else {
            $product2 = <<<DELIMETER
    <option value="">PRODUCT NOT AVAILABLE</option>
DELIMETER;
        }
        echo $product2;
    }
}*/
function validation(){
    if(isset($_SESSION['username'])){
        header("location:login.php");
    }
}

function cart(){
    global $con;
    $sql = "select * from tblproductcategory";
    $query = mysqli_query($con, $sql);
    while ($result = mysqli_fetch_assoc($query)) {
        if (($rows = mysqli_num_rows($query)) > 0) {
            //$result.=$result;
            $product = <<<DELIMETER

DELIMETER;
        }else{
        }
    }
}
