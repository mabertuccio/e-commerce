<?php
include 'bbdd.php';

    function crearTarjetasProductos($peticion, $conn, $ruta) {
            $query = $peticion;
            $stmt = $conn->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="product-card">
                    <div class="image-product-card">
                        <img src="">
                    </div>
                    <div class="product-info-container">
                        <h2 class="product-card-name">
                            <?= $row['nombre'] . " " . $row['descripcion'] ?>
                        </h2>
                        <div class="pr-sb-container">
                            <h3 class="product-card-price">
                                <?= $row['precio'] . "$" ?>
                            </h3>
                            <form class="form-shopp-button" id="addProdButton" method="post">
                                <input type="hidden" name="product_id" value=<?=$row['id']?>>
                                <button type="submit" name="add_to_cart" class="product-card-shop-button">
                                        <span class="material-symbols-outlined">
                                            add_shopping_cart
                                        </span>
                                </button>
                            </form>
                            <a class="product-card-shop-button-unloged" id="addProdButtonUnloged" href='<?= $ruta ?>'>
                                <span class="material-symbols-outlined">
                                    add_shopping_cart
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;    
        } ?>
