<?php
/*
------------------
28/05/2024 - 16:21
------------------
El código siguiente se encarga de guardar los precios y de mostrar los productos.
------------------
*/
function generateProduct($name, $price)
{
    global $precios;
    $precios[] = $price;

    return "
    <tr>
        <td>
            <img src='../static/images/img.jpg' />
        </td>
        <td>$name</td>
        <td>
            <input type='number' value='1' min='1' id='quantity' />
        </td>
        <td>$$price</td>
        <td>
           <button class='remove-button'>Remove</button> 
        </td>
    </tr>
    ";
}
