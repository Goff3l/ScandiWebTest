<?php
require 'components/header.php';
?>

<header class="d-flex flex-row w-75 m-auto">
    <h1>Product List</h1>
    <div class="ms-auto">
        <button class="btn btn-success" id="save" type="submit" form="product_form">Save</button>
        <a href='/' class="btn btn-secondary">Cancel</a>
    </div>
    <hr>
</header>


<div class="d-flex justify-content-center">
    <div class="d-flex flex-column w-75">
    <hr>
        <form method='POST' action="/add-product" id='product_form'>
            <div class="mb-3 d-flex row">
                <label for="sku" class="form-label col-1">SKU</label>
                <input type="text" id='sku' name='sku' class="form-control col-1 w-25" required>
                <p class='hidden' id='sku-message' style="color:red">Duplicate SKU!</p>
            </div>

            <div class="mb-3 d-flex row">
                <label for="name" class="form-label col-1">Name</label>
                <input type="text"  id='name' name='name' class="form-control col-1 w-25" required>
            </div>

            <div class="mb-3 d-flex row">
                <label for="price" class="form-label col-1">Price ($)</label>
                <input type="number"  id='price' name='price' class="form-control col-1 w-25" required>
            </div>

            <div class="mb-3 d-flex row">
                <label class="form-label col-1">Type Switcher</label>
                <select name='type' class="form-select col-1 w-25" aria-label="Type Switcher" id='productType' required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="dvd" id="DVD">DVD</option>
                    <option value="furniture" id="Furniture">Furniture</option>
                    <option value="book" id="Book">Book</option>
                </select>
            </div>



            <div class="dvd hidden" id='dvd'>
                <div class="mb-3 d-flex row">
                    <label for="disc_space" class="form-label col-1">Size (MB)</label>
                    <input name='disc_space' id='size' type="number" class="form-control col-1 w-25" required>
                </div>
                <p><strong>Please, provide disc space in MB</strong> </p>
            </div>

            <div class="book hidden" id='book'>
                <div class="mb-3 d-flex row">
                    <label for="book_weight" class="form-label col-1">Weight (KG)</label>
                    <input name='book_weight' id='weight' type="number" class="form-control col-1 w-25" required>
                </div>
                <p><strong>Please, provide weight in KG</strong></p>
            </div>

            <div class="furntiure hidden" id='furniture'>
                <div class="mb-3 d-flex row">
                    <label for="furniture_height" class="form-label col-1">Height (CM)</label>
                    <input name='furniture_height' id='height' type="number" class="form-control col-1 w-25" required>
                </div>

                <div class="mb-3 d-flex row">
                    <label for="furniture_width" class="form-label col-1">Width (CM)</label>
                    <input name=furniture_width' id='width' type="number" class="form-control col-1 w-25" required>
                </div>

                <div class="mb-3 d-flex row">
                    <label for="furniture_length" class="form-label col-1">Length (CM)</label>
                    <input name='furniture_length' id='length' type="number" class="form-control col-1 w-25" required>
                </div>
                <p><strong>Please, provide dimensions in CM</strong></p>
            </div>
        </form>
    </div>
</div>


<?php require 'components/footer.php' ?>