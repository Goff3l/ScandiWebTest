<?php
 include('components/header.php')
?>
	<header class="d-flex flex-row w-75 m-auto">
		<h1>Product List</h1>
		<div class="ms-auto">
			<a class="btn btn-secondary" href='/add-product' id="delete-product-btn">ADD</a>
			<button class="btn btn-outline-danger" type='submit' form='mass-delete-form' id="delete-product-btn">MASS DELETE</button>
		</div>
	</header>
	<div class="d-flex justify-content-center">
		<div class="d-flex flex-column w-75">
			<hr>
			<form method="POST" action="/delete-product" id="mass-delete-form">
            <input type="hidden" name="_method" value="DELETE"/>
			<div class="row row-cols-1 row-cols-md-4 g-4 text-center">
			<?php foreach($products as $prod) :?>
				<div class="col">
					
					<div class="card py-3">
						<div class="card-body">
							<div class="form-check">
								<input class="form-check-input delete-checkbox" type="checkbox" name="productIds[]" value="<?= $prod->product_id ?>" id="product-<?= $prod->product_id ?>">
							</div>
							<h5 class="card-title"><?= $prod->sku ?></h5>
							<p class="card-text"><?= $prod->name ?></p>
							<p class="card-text"><?= $prod->price ?>$</p>
							<p class="card-text"><?= $prod->attribute_value ?></p>
						</div>
					</div>
					
				</div>
				<?php endforeach ?>
			</div>
			</form>
			
		</div>
	</div>

<?php require 'components/footer.php' ?>
	
