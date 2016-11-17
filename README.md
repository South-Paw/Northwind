```
University of Canterbury
SENG365 Assignment 1
29th March 2016
```

# Northwind Browser
This was my Code Igniter site, written for our first 365 assignment.

While it works and it passed the assignment with a good mark, some of the code
patterns to complete assignment task's should never be done in the real world.
For example, how I implemented user logins is NOT a good way to do logins
ever... maybe go and see if you can figure out why. ;)

There's a lot that could be fixed up or improved on this site and it was a fun
little project.

## Assignment Specifications
The `/doc` folder contains the [assignment specifications](https://github.com/South-Paw/Northwind/blob/master/doc/assignment_readme.md)
and the `.sql` file for creating the database tables.

## Running it
To run this app, you'll need a web server with PHP 5+ and a MySQL database.
Create the database tables using the `.sql` in the `/doc` folder.

Then you'll need to...

* Edit the `/application/config/config.php` file and add a `base_url`.
* Edit the `/application/config/database.php` file and add the default database details.

## About
Part of this assignment required us to write an 'about' page. I've copied the
contents of mine here so you don't need to dig around for it.

### What it does
The Northwind site allows Northwind employees to log in and view products &
orders in the Northwind database.

The header bar acts as the 'site-wide banner' and is visible on all screens.
The 'site-wide navigation' is available in the header.

If a Northwind employee is viewing the application on their phone or other
mobile device, the site is fully responsive and the menu is still available at
the top of each page.

On load of the application a login screen is presented and this About page is
the only other page accessible. Other pages are 'protected' and cannot be
viewed if a user is not logged in.

Once logged in (see the Usage notes for username and password combinations),
the user will be presented with their account page. From here they can navigate
to the Products or Orders pages.

On the Products page, the 'existing products browser' from the lab is viewable
and has it's bug fixed. A user can select a Category item and click Submit to
reload the products in that category, when loaded the first item in the new
category will be selected. They can then select a Product and click Submit
to view the details of that product or change the category again.

On the Orders page all Northwind orders are displayed from the `Orders` table,
sorted by Order ID. A user can click on an Order ID on the leftmost column to
load the Order Details view for that order.

The Order Details view provides the details of the selected order and the
associated products from the `OrderDetails` table matching the
given Order ID. Each product name can be clicked to view the products details
in the Product Browser. A Total Cost of each product in the order is shown
(`Quantity * Product Unit Cost`) and a Total Order Cost is available
below the ordered products.

### Usage notes
You will need to log in to view pages. There are several 'registered' users on
this application `username, password`;

* `Nancy, Davolio`
* `Andrew, Fuller`
* `Janet, Leverling`
* `Margaret, Peacock`
* `Steven, Buchanan`
* `Michael, Suyama`
* `Robert, King`
* `Laura, Callahan`
* `Anne, Dodsworth`

### Design choices
* **Bootstrap (specifically [Bootswatch Flatly](http://bootswatch.com/flatly/)) used for the site layout.** Because it's quick, easy to use and gets the job done. I only ended up writing 43 lines of extra CSS.
* **There is a model which stores site information that is then reused across the site.** This meant that things like the brand 'Northwind' could be used for each page's title & it is a simple change to rename the site. The model could also be extended to include further site-wide information if needed.
* **A login is required to view certain pages of the site.** Products & Orders are both 'protected' pages (as we only want users to see them).
* **User logins are simply the employees FirstName for a username and LastName for a password.** This choice was made because it was the simplest to implement to show the use of sessions. I realise that the passwords should be unique, hashed and checked a certain way but this was simply used to jump that whole can of worms so that I could show sessions are working.

### Known bugs
* None that I'm aware of.
