# Prenote - a simple task list

## Startup

php artisan migrate --seed
php artisan serve

## Intersting files:

URL definitions:

* routes/web.php - URL endpoints used by the application

Page Layout

* resources/views/layouts/app.blade.php
* resources/views/tickets/create.blade.php
* resources/views/tickets/index.blade.php
* resources/views/tickets/show.blade.php

Models:

* app/Customer.php
* app/Priority.php
* app/Ticket.php

Ticket Controller:

* app/Http/Controllers/TicketController.php

Events:

* app/Http/Controllers/EventController.php
* app/Http/Listeners/UnhandledExceptionListener.php
* app/Events/UnhandledExceptionOccurred.php

Database:

* database/migrations/2016_12_14_052411_create_tickets_table.php
* database/migrations/2016_12_14_053411_create_customers_table.php
* database/migrations/2016_12_18_021452_create_priorities_table.php
* database/seeds/CustomerSeeder.php
* database/seeds/PrioritySeeder.php

## Notes

* "Resolved" tickets are just deleted - should probably just add a 'state' property and set to 'resolved'
* There is an endpoint for editing a ticket but no page layout defined for it