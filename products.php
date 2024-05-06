<?php
function generateProduct($name, $price)
{
    return "
    <tr>
        <td>
            <img src='./img.jpg' />
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
