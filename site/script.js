$(document).ready(function() {
    $(".btn_hide_row").on("click", function(e) {
        hideRow($(this));
    });
    $(".btn_quantity_plus").on("click", function() {
        updateQuantity($(this), "plus");
    });
    
    $(".btn_quantity_minus").on("click", function() {
        updateQuantity($(this), "minus");
    });
});

function hideRow($button) {
    const $row = $button.closest("tr");
    const productId = $row.attr("product_id");

    $.ajax({
        url: "../database_code/db_actions.php",
        method: "POST",
        data: {
            productId: productId,
            action: "hide",
        },
        success: function(response) {
            console.log(`Товар c ID ${productId} скрыт`);
            $row.hide();
        },
        error: function(xhr, status, error) {
            console.error(`Ошибка при скрытии товара: ${error}`);
        }
    });
}

function updateQuantity($button, action) {
    const $row = $button.closest("tr");
    const $spanQuantity = $row.find(".quantity");
    const productId = $row.attr("product_id");
    
    let productQuantity = parseInt($spanQuantity.text());
    
    if (action === "plus") {
        productQuantity++;
    } 
    else if (action === "minus") {
        if (productQuantity > 0)
            productQuantity--;
    }

    $.ajax({
        url: "../database_code/db_actions.php",
        method: "POST",
        data: {
            productId: productId,
            productQuantity: productQuantity,
            action: "change_quantity",
        },
        success: function(response) {
            console.log(`Количество товара c ID ${productId} изменено`);
        },
        error: function(xhr, status, error) {
            console.error(`Ошибка при скрытии товара: ${error}`);
        }
    });

    $spanQuantity.text(productQuantity);
}