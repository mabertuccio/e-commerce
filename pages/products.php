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
    $precios[$id] = $price * $quantity;
    $price = $precios[$id];

    return "
    <tr id='product-$id'>
        <td>
            <img class='img-table' src='../static/images/img.jpg' />
        </td>
        <td>$name</td>
        <td>
        <button class='btn-quantity' id='decrement-btn' data-id='$id'><span class='material-symbols-outlined icon-operation'>remove</span></button>
            <input type='text' value='$quantity' min='1' max='$cantidad_maxima' class='quantity-input' data-id='$id' data-price='$price' />            
            <button id='increment-btn' data-id='$id'><span class='material-symbols-outlined icon-operation'>
            add
            </span></button>
        </td>
        <td id='price-$id'>$$price</td>
        <td>
            <form name='remove_from_cart' action='../controllers/remove-product.php' method='POST' style='display:inline;'>
                <input type='hidden' name='product_id' value=$id />
                <button type='submit' class='remove-button' data-id=$id>Eliminar</button>
            </form>
        </td>
    </tr>
    ";
}
