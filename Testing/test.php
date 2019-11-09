<?php
function getRelatedProducts($productName)
{
    $productResults = mysql_query("SELECT * FROM products WHERE productName = '$productName' LIMIT 0,1");

    $relatedProducts = array();

    if(mysql_num_rows($productResults) == 1)
    {
        $product = mysql_fetch_assoc($productResults);
        $tags = $product['pcat'];
        $otherProducts = mysql_query("SELECT * FROM products WHERE pcat = '$product[]'");

        while($otherProduct = mysql_fetch_array($otherProducts))
        {
          $otherTags = $otherProduct['tags'];
            $overlap = array_intersect($tags,$otherTags);
            if(count($overlap > 1)) $relatedProducts[] = $otherProduct;
        }
    }

    return $relatedProducts;
}







if(isset($_GET["cat"])){if($_GET["cat"]=="household" || $_GET["cat"]=="beverages" || $_GET["cat"]=="pharmaceuticals" || $_GET["cat"]=="dairy" || $_GET["cat"]=="meat" || $_GET["cat"]=="fish" || $_GET["cat"]=="vegetables" || $_GET["cat"]=="fruits" || $_GET["cat"]=="grocery"){echo "checked='true'";}}else{echo "checked='true'";} 



 ?>

 function getRelatedProducts($productName)
{
    $productResults = mysql_query("SELECT * FROM products WHERE productName = '$productName' LIMIT 0,1");

    $relatedProducts = array();

    if(mysql_num_rows($productResults) == 1)
    {
        $product = mysql_fetch_array($productResults);
        $tags = explode(",",$product['tags']);

        $otherProducts = mysql_query("SELECT * FROM products WHERE productName != '$productName'");

        while($otherProduct = mysql_fetch_array($otherProducts))
        {
            $otherTags = explode(",",$otherProduct['tags']);
            $overlap = array_intersect($tags,$otherTags);
            if(count($overlap > 1)) $relatedProducts[] = $otherProduct;
        }
    }

    return $relatedProducts;
}
