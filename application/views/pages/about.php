<?php
echo '
				<div class="row">
					<div class="col-md-12">
						<div class="page-header text-center">
							<h1>'. $pageTitle .'</h1>
						</div>

						<div class="row">
							<div class="col-md-12">
								<h2>What it does</h2>
								<p>The Northwind site allows Northwind employees to log in and view products & orders in the Northwind database.</p>
								<p>The header bar acts as the \'site-wide banner\' and is visible on all screens. The \'site-wide navigation\' is available in the the header.</p>
								<p>If a Northwind employee is viewing the application on their phone or other mobile device, the site is fully responsive and the menu is still available at the top of each page.</p>
								<p>On load of the application a login screen is presented and this About page is the only other page accessible. Other pages are \'protected\' and cannot be viewed if a user is not logged in.</p>
								<p>Once logged in (see the Usage notes for username and password combinations), the user will be presented with their account page. From here they can navigate to the Products or Orders pages.</p>
								<p>On the Products page, the \'existing products browser\' from the lab is viewable and has it\'s bug fixed. A user can select a Category item and click Submit to reload the products in that category, when loaded the first item in the new category will be selected. They can then select a Product and click Submit to view the details of that product or change the category again.</p>
								<p>On the Orders page all Northwind orders are displayed from the <code>Orders</code> table, sorted by Order ID. A user can click on an Order ID on the leftmost column to load the Order Details view for that order.</p>
								<p>The Order Details view provides the details of the selected order and the associated products from the <code>OrderDetails</code> table matching the given Order ID. Each product name can be clicked to view the products details in the Product Browser. A Total Cost of each product in the order is shown (<code>Quantity * Product Unit Cost</code>) and a Total Order Cost is available below the ordered products.</p>

								<hr>

								<h2>Usage notes</h2>
								<p>You will need to log in to view pages. There are serveral \'registered\' users on this application <code>username, password</code>;</p>
								<ul>
									<li><code>Nancy, Davolio</code></li>
									<li><code>Andrew, Fuller</code></li>
									<li><code>Janet, Leverling</code></li>
									<li><code>Margaret, Peacock</code></li>
									<li><code>Steven, Buchanan</code></li>
									<li><code>Michael, Suyama</code></li>
									<li><code>Robert, King</code></li>
									<li><code>Laura, Callahan</code></li>
									<li><code>Anne, Dodsworth</code></li>
								</ul>

								<hr>

								<h2>Design choices</h2>
								<p><strong>Bootstrap (specifically <a href="http://bootswatch.com/flatly/">Bootswatch Flatly</a>) used for the site layout.</strong> Because it\'s quick, easy to use and gets the job done. I only ended up writing 43 lines of extra CSS.</p>
								<p><strong>There is a model which stores site information that is then reused across the site.</strong> This meant that things like the brand \'Northwind\' could be used for each page\'s title & it is a simple change to rename the site. The model could also be extended to include further sitewide information if needed.</p>
								<p><strong>A login is required to view certain pages of the site.</strong> Products & Orders are both \'protected\' pages (as we only want users to see them).</p>
								<p><strong>User logins are simply the employees FirstName for a username and LastName for a password.</strong> This choice was made because it was the simplest to implement to show the use of sessions. I realise that the passwords should be unquie, hashed and checked a certain way but this was simply used to jump that whole can of worms so that I could show sessions are working.</p>

								<hr>

								<h2>Known bugs</h2>
								<ul>
									<li>None that I\'m aware of.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>';
