# Northwind Browser (SENG365 Assignment)
The aim of this assignment is to give you a bit more experience with
implementing a simple non-JavaScript-ed website using the CodeIgniter framework.

The focus is on functionality and the underlying principles rather than on
producing a fancy looking application. In particular, you are not allowed to
use any PHP from outside this course other than the CodeIgniter framework and
code from lectures and labs.

JavaScript is not permitted except that you may, if you wish use trivial,
"on <some-event> submit" functions.

CSS styling of the site is not a part of the assignment: aside from personal
satisfaction, you will receive little or no reward for a beautiful site,
though you may pay a small penalty for undue hideousness. The beauty of your
code will, however, be of relevance.

## Requirements
1. A site-wide "banner" (which might be just a large-font site name).
2. A site-wide navigation menu with links to the product browser, the order
browser and the About page (see below).
3. The existing product browser from the labs.
4. An order browser that lets users look at the `Orders` and `OrderDetails`
tables from the database, plus other linked information where applicable.
5. Some use of session management, such as a rudimentary login capability.
6. An "About this site" page that documents your site: what it does, known
bugs, important design decisions, any important usage information for the
marker (e.g. a username/password if you've implemented such a capability).

## Implementation Notes
### Displaying Orders
The order browser is the most significant bit of added functionality. Make sure
you understand how orders are represented in the database, starting with the
`Orders` and `OrderDetails` tables, before commencing this step.

When displaying information to the user, keep in mind they are normal humans,
not programmers. Don't display information that can't possibly be meaningful
to them, such as id fields or cryptic database column names. Do make it
easy for the user (who is assumed to be a Northwind employee) to browse orders
and to see all the relevant details for each order, including all ordered items.

### Security
As we haven’t covered security yet in the course, the only requirements are
that any data entered into a form by a user that might be used in an SQL query
is handeled by the mysql CodeIgniter helper, similar to labs. This is to
prevent SQL injection attacks, but more on that later in the course.

## Marking
Your code will be marked according to the following general attributes:
* the functionality provided;
* appropriate use of the CodeIgniter framework (correct use of models, views
and controllers etc);
* the readability and usefulness of the “About this site” page;
* conformance to coding standards.
* Have you gone the extra mile (such as nice css, an extra special order
browser etc)

## Submission
To submit the assignment, first make a zip archive of the whole project tree,
rooted at your `public_html/365/northwind` directory, calling it `usercode.zip`
where `usercode` is your `abc123` code. Submit that file to the Assignment1
dropbox on Learn.

Don't forget to tidy up and polish your About this site page to reflect the
final state of your submission.
