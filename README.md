E-commerce system using PHP, HTML, and a connection to a MySQL database,  for a fictional coffee company.  This involves a shopping cart for a customer, a menu of items that can be added to the cart, and a separate screen for a barista to mark ordered items as complete.
Server-side components done in vanilla PHP; 

Specification
E-commerce system provides a way for a customer to log-in, see their order history, select  
drinks from a menu, add the desired drinks to their shopping cart, and submit the order to be prepared. 
It also provides a way for a barista to log-in and mark the items in an order as 
completed 

User Interface:

Login screen that takes a username and password
Logout functionality that logs-out the current user
Navigation bar that has all available options for the logged-in user
Customer Component

Home screen displays information 
My Orders screen displays the details of past and current orders
If an item in an order has been completed, shows that it has been completed. Otherwise it shows as pending.
Menu screen gives the customer a set of items to add to the cart
My Cart screen displays everything currently in the customer's cart
Each item on the screen has the option to remove it
A button that allows the customer to submit their order


Barista Component

Home screen displays information 
Pending Orders screen displays all orders that are currently pending
All non-completed (pending) items in all orders are shown
Each item has the option for the barista to mark it as completed

Functionality
Redirecting with PHP

// redirect to the home page and then exit the script
header("Location: index.php");
exit();
General

The Login functionality takes username and password and checks it against the database then logs the user in. 
The username and user ID are saved to the session and then the user is redirected to the home page.
The Logout functionality destroys the entire session upon logout and then redirects the user back to the home page.
The navigation bar links to all the relevant pages based on the logged-in user


Customer Component

The My Orders screen shows the details of each order both past and current from the database.
The details are:
Cost of the entire order
The name of each item in the order
Whether each item ordered has been completed or is pending

The Menu screen:
Displays all items available for purchase
Each item available shows its price
Each item has a way for the user to add it to his cart


The My Cart screen:
Displays all items currently in the user's cart
Each item in the cart shows its price
Each item in the cart has a way for the user to remove it from the cart
User submit to cart
Saves the data of the order to the database

Barista Component

The Pending Orders screen:
Shows items that are pending in the orders rom the database
Each pending item shows price
Each pending item has a way for the barista to mark it as completed
Marking an item as completed updates the order item in the database