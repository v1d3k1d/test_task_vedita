<?php
    require "../database_code/cproducts.php";
    $cproducts = new CProducts();
    $products = $cproducts->get_all_products();
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Товары</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Товары</h1>
        <table id="table_products">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Количество</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody id="product_table">
                <?php foreach ($products as $product) { ?>
                    <tr product_id="<?php echo $product['ID']; ?>">
                        <td><?php echo $product["PRODUCT_ID"]; ?></td>
                        <td><?php echo $product["PRODUCT_NAME"]; ?></td>
                        <td><?php echo $product["PRODUCT_PRICE"]; ?></td>
                        <td><?php echo $product["PRODUCT_ARTICLE"]; ?></td>
                        <td>
                            <button type="button" class="btn_quantity_plus">+</button>
                            <span class="quantity"><?php echo $product['PRODUCT_QUANTITY']; ?></span>
                            <button type="button" class="btn_quantity_minus">-</button>
                        </td>
                        <td><?php echo date('d-m-y', strtotime($product["DATE_CREATE"])); ?></td>
                        <td> 
                            <button type="button" class="btn_hide_row">Скрыть</button>
                        </td>
                    </tr>
                <?php };?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>