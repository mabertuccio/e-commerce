<?php
/*
------------------
28/05/2024 - 16:21
------------------
El código siguiente se encarga de guardar los precios y de mostrar los productos.
------------------
*/
function generateProduct($name, $price, $quantity, $id, $cantidad_maxima)
{
    global $precios;
    $precios[] = $price;

    return "
    <tr id='product-$id'>
        <td>
            <img class='img-table' src='../static/images/img.jpg' />
        </td>
        <td>$name</td>
        <td>
            <input type='number' value='$quantity' min='1' max='$cantidad_maxima' id='quantity' />
        </td>
        <td>$$price</td>
        <td>
            <form name='remove_from_cart' action='../controllers/remove-product.php' method='POST' style='display:inline;'>
                <input type='hidden' name='product_id' value=$id />
                <button type='submit' class='remove-button' >Remove</button>
            </form>
            </td>
    </tr>
    ";
}
