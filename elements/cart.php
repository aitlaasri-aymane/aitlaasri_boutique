<?php include_once "../controllers/cartitems.php"; ?>

<div class="uk-modal-dialog uk-modal-body">
    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
    <h2 class="uk-modal-title">Shopping Cart</h2>
    <p>Cuurent cart items : <span class="uk-label uk-label-success"><span><?= sizeof($cart_all) ?></span></span></p>
    <ul class="uk-list">
        <?php for ($j = 0; $j <= sizeof($cart_all) - 1; $j++) { ?>
            <li>
                <div>
                    <div class="uk-card uk-card-hover uk-card-body uk-align-center">
                        <div class="uk-child-width-expand@s" uk-grid>
                            <div>
                                <h3 class="uk-card-title" style="float: left;"><img class="uk-border-circle" width="200" height="200" src="<?= $cartproducts[$j][4] ?>"> </h3>
                            </div>
                            <div>
                                <form action="./controllers/cartitems.php" method="post">
                                    <legend class="uk-legend">Quantity :</legend><input name="quantity" class="uk-input uk-form-width-small" style="float: left;" type="number" placeholder="<?= $cart_all[$j][2] ?>" require>
                                    <input type="number" hidden name="article_id">
                                    <button class="uk-button uk-button-default uk-margin-top" type="submit">UPDATE</button>
                                </form>
                            </div>
                            <div>
                                <ul class="uk-iconnav" style="float: right;">
                                    <li><a href="#" uk-icon="icon: trash"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h3> <?= $cartproducts[$j][1] ?></h3>
                    </div>
                </div>
            </li>
            <li>
                <hr>
            </li>
        <?php } ?>
    </ul>
    <p class="uk-text-right">
        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
        <button class="uk-button uk-button-primary uk-modal-close" type="button" onclick="orderplaced()">Place Order</button>
    </p>
</div>