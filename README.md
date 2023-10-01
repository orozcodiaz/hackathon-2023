# TechHub Hackathon 2023 - City Furniture

## Project description

Our RTAS (real-time availability system) allows branch operators to list and manage donated items in real time, ensuring accurate and timely inventory data for all stakeholders. 
We utilize BLADE + Laravel for the frontend, and the main business logic is on Django + Python.

### Event Links
- https://techhubsouthflorida.org/meetups/hackathon/
- https://www.eventbrite.com/e/hack-for-humanity-tech-hub-hackathon-tickets-694530929707

### Clone the repo
`git clone git@github.com:orozcodiaz/hackathon-2023.git`

### Navigate into the directory
`cd hackathon-2023/`

# Start the backend server (folder back/)
`python manage.py runserver 3000`

# Start the frontend server (folder front/)
`php -S 127.0.0.1:8000 -t public`

## API Endpoints

### Donated Item Categories
- `/api/v1/categories` (GET) - get product categories
- `/api/v1/categories/create` (POST) - create a category
- `/api/v1/categories/save` (POST) - save a category (edit)
- `/api/v1/categories/delete/<category_id>` (GET) - delete a category

### Donated Item Conditions
- `/api/v1/conditions` (GET) - get product conditions
- `/api/v1/conditions/create` (POST) - create a condition
- `/api/v1/conditions/save` (POST) - save a condition (edit)
- `/api/v1/conditions/delete/<condition_id>` (GET) - delete a condition

### Branches (places for donation)
- `/api/v1/branches/` (GET) - get all branches data

### Product Data API
- `/api/v1/products` (GET) - get all products
- `/api/v1/products/<product_id>` (GET) - get product by ID
- `/api/v1/products/create` (POST) - create product
- `/api/v1/products/getByBranchId/<branch_id>/` (GET) - get products by branch ID
- `/api/v1/products/category/<category_title>` (GET) - get products by category title

## Built With
- Django + Python + Rest Framework - for API endpoints, backend, inventory operations
- PHP + Laravel + Blade - for frontend, AJAX requests, API endpoints

## Authors
- Fred Orozco Diaz (https://github.com/orozcodiaz) - https://www.linkedin.com/in/orozcodiaz/
- Svyatoslav K.A. (https://github.com/kossvat) - https://www.linkedin.com/in/sviatoslav-kostyshyn-148a38234/
