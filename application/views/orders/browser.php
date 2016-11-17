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
	echo '
				<div class="row">
					<div class="col-md-12">
						<div class="page-header text-center">
							<h1>'. $pageTitle .'</h1>
						</div>

						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>Order ID</th>
											<th>Customer Name</th>
											<th>Employee</th>
											<th>Ordered On</th>
											<th>Required By</th>
											<th>Shipped On</th>
											<th>Shipper</th>
											<th class="text-right">Freight Cost</th>
										</tr>
									</thead>
									<tbody>';

	foreach ($orderList as $order) {
		echo '
										<tr>
											<td><a href="'. site_url('orders/details/' . $order->id) .'">'. $order->id .'</a></td>
											<td>'. $customerList[$order->CustomerID] .'</td>
											<td>'. $employeeList[$order->EmployeeID] .'</td>
											<td>'. $order->OrderDate .'</td>
											<td>'. $order->RequiredDate .'</td>
											<td>'. $order->ShippedDate .'</td>
											<td>'. $shippersList[$order->ShipVia] .'</td>
											<td class="text-right">$'. number_format($order->Freight, 2) .'</td>
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
