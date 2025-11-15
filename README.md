# Task:

Develop a Product Management System in Laravel that allows users to perform the following operations:

1.   Create a new product
2.   Read (view) all products
3.   Update an existing product
4.   Delete a product

## Requirements

# Product Table Structure:

· id: Integer, Primary Key
· product_id: String, Required, Unique
· name: String, Required
· description: Text, Optional
· price: Decimal, Required
· stock: Integer, Optional
· image: String, Required
· created_at: Timestamp
· updated_at: Timestamp

# Routes:
1.   GET /products: List all products
2.   GET /products/create: Show the form to create a new product
3.   POST /products: Store a new product
4.   GET /products/{id}: Show a specific product
5.   GET /products/{id}/edit: Show the form to edit a product
6.   PUT /products/{id}: Update a product
7.   DELETE /products/{id}: Delete a product

# Controllers:

· ProductController: Handle all product-related operations using  for querying the database.

# Views:

1.   index.blade.php: Display all products with pagination
2.   create.blade.php: Form to create a new product
3.   edit.blade.php: Form to edit an existing product
4.   show.blade.php: View a specific product's details

# Work Flow :

1. Install laravel
2. Contacted with MySQL database
3. Make a CURD operation (create, update, view / read, delate)
4. Use localStorage for Image