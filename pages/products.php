<?php
/*
------------------
28/05/2024 - 16:21
------------------
El código siguiente se encarga de guardar los precios y de mostrar los productos.
------------------
*/
function generateProduct($name, $price, $quantity, $id)
{
    global $precios;
    $precios[] = $price;

    return "
    <tr id='product-$id'>
        <td>
            <img src='../static/images/img.jpg' />
        </td>
        <td>$name</td>
        <td>
            <input type='number' value='1' min='1' max='$quantity' id='quantity' />
        </td>
        <td>$$price</td>
        <td>
            <form action='../controllers/remove-product.php' method='POST' style='display:inline;'>
                <input type='hidden' name='product_id' value=$id />
                <button type='submit' class='remove-button' data-id=$id>Remove</button>
            </form>
    
        </td>
    </tr>
    ";
}
