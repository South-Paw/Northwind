<?php
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
	$totalOrderCost = $order->Freight;

	echo '
				<div class="row">
					<div class="col-md-12">
						<div class="page-header text-center">
							<h1>'. $pageTitle .'</h1>
						</div>

						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr>
											<td><strong>Customer Name</strong></td>
											<td>'. $customerList[$order->CustomerID] .'</td>
										</tr>
										<tr>
											<td><strong>Employee</strong></td>
											<td>'. $employeeList[$order->EmployeeID] .'</td>
										</tr>
										<tr>
											<td><strong>Ordered On</strong></td>
											<td>'. $order->OrderDate .'</td>
										</tr>
										<tr>
											<td><strong>Required By</strong></td>
											<td>'. $order->RequiredDate .'</td>
										</tr>
										<tr>
											<td><strong>Shipped On</strong></td>
											<td>'. $order->ShippedDate .'</td>
										</tr>
										<tr>
											<td><strong>Shipper</strong></td>
											<td>'. $shippersList[$order->ShipVia] .'</td>
										</tr>
										<tr>
											<td><strong>Freight Cost</strong></td>
											<td>$'. $order->Freight .'</td>
										</tr>
									</tbody>
								</table>
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Discount</th>
											<th class="text-right">Total Cost</th>
										</tr>
									</thead>
									<tbody>';

	foreach ($orderContents as $product) {
		$totalOrderCost += $product->Quantity * $productsOrdered[$product->ProductID]->unitPrice;

		echo '
										<tr>
											<td><a href="'. site_url('products/browser?Category='. $productsOrdered[$product->ProductID]->categoryID .'&Product='. $productsOrdered[$product->ProductID]->id) .'">'. $productList[$product->ProductID] .'</a></td>
											<td>'. $product->Quantity .'</td>
											<td>'. $product->Discount .'</td>
											<td class="text-right">$'. number_format($product->Quantity * $productsOrdered[$product->ProductID]->unitPrice, 2) .'</td>
										</tr>';
	}

	echo '
									</tbody>
								</table>
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr>
											<td><strong>Total Order Cost</strong></td>
											<td class="text-right">$'. number_format($totalOrderCost, 2) .'</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
';
}
