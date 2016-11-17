<?php
/**
 * A view of the product catalogue, with a select widget for product
 * category and a table of products in the currently-selected
 * category.
 *
 * Input params: $categoryMap - an associative array mapping from category ID
 *						 to category name
 *			   $productMap - an associative array mapping from product ID
 *						 to product name for all products in the current
 *						 category.
 *			   $product - the currently selected product, an instance
 *						 of the model class Product. The ID and category
 *						 of this product tell us the currently selected
 *						 productId and categoryId.
 *
 */

define('COMBO_SIZE', 10);  // Number of lines to display

/**
 * Return the HTML for a div containing a label, a combo box and a 'go'
 * button.
 * @param string $label - text to display as a label
 * @param assoc-array $map - a map from value to name
 * @param int $selectedRowValue - the value of the currently-selected option
 * @param int $size - the number of elements to display
 * @return - an html string for display
 */
function comboBoxHtml($label, $map, $selectedRowValue, $size = 1) {
	$html = '
									<div class="form-group">
										<label for="'. $label .'">'. $label .'</label>
										<select class="form-control" name="'. $label .'" size="'. $size .'">';

	foreach ($map as $id => $name) {
		$html .= '
											<option value="'. $id.'"'. ($id === intval($selectedRowValue) ? ' selected' : '') .'>'. $name .'</option>';
	}

	$html .= '
										</select>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-default">Submit</button>
									</div>';

	return $html;
}

$productDetails = array(
	'Product ID' => $product->id,
	'Product Name' => $product->productName,
	'Category' => $categoryMap[$product->categoryID],
	'Quantity per unit' => $product->quantityPerUnit,
	'Unit price' => '$'. number_format($product->unitPrice, 2),
	'Units in stock' => $product->unitsInStock,
	'Units on Order' => $product->unitsOnOrder,
	'Reorder level' => $product->reorderLevel,
	'Supplier' => $supplierMap[$product->supplierID],
	'Discontinued' => $product->discontinued
);

if (!$loggedIn) {
	echo '
				<div class="row">
					<div class="col-md-offset-4 col-md-4">
						<div class="alert alert-danger text-center" style="margin-top: 20px;">
							<strong>You must be <a href="'. base_url("index.php/pages/account") .'" class="alert-link">logged in</a> to view this page.</strong>
						</div>
					</div>
				</div>';
} else {
	echo '
				<div class="row">
					<div class="col-md-12">
						<div class="page-header text-center">
							<h1>'. $pageTitle .'</h1>
						</div>

						<form action="'. site_url('products/browser') .'" method="get" style="margin-bottom: 20px;">
							<div class="row">
								<div class="col-md-offset-2 col-md-4">
									'. comboBoxHtml('Category', $categoryMap, $product->categoryID, COMBO_SIZE) .'
								</div>
								<div class="col-md-4">
									'. comboBoxHtml('Product', $productMap, $product->id, COMBO_SIZE) .'
								</div>
							</div>
						</form>
						<hr>
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<h2 class="text-center">Selected Product</h2>
								<table class="table table-striped table-hover table-bordered">
									<tbody>';

	foreach ($productDetails as $field => $value) {
		echo '
										<tr>
											<td class="col-md-3">'. $field .'</td>
											<td class="col-md-9">'. $value .'</td>
										</tr>';
	}

	echo '
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
';
}
