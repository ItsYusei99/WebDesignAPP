This repository contains the technological solution developed for Halcon, a construction material distributor. The system is a monolithic web application based on Laravel that automates internal logistics and sales processes, in addition to providing a customer-facing portal for real-time order tracking.

Project Description
The main objective is to digitize the order lifecycle, from the moment sales takes the order to physical delivery at the construction site, ensuring data integrity and improving communication between departments and with the final customer.

The system addresses two key needs:

External Visibility: Customers can track their order status and view delivery evidence (photos) using only their customer number and invoice number, without needing to register.

Internal Management: An administrative dashboard with Role-Based Access Control (RBAC) for the Sales, Purchasing, Warehouse, and Route departments.

Key Features
Public Order Tracking: Simple interface for customers to check status (Ordered, In Process, In Route, Delivered).

Strict Status Workflow: The order lifecycle is respected, and only specific roles can advance certain stages.

Photographic Evidence: Functionality exclusive to the "Route" role to upload photos of loading and final delivery.

Soft Deletes (Borrado Lógico): Orders are not physically deleted from the database; they are archived and can be restored by an administrator.

Roles and Permissions:

Admin: User and role management, order restoration.

Sales: Order creation and registration of fiscal data.

Warehouse: Inventory management and moving status to "In Process" / "In Route".

Purchasing: Management of missing materials.

Route: Physical delivery and uploading of evidence.

Design and Architecture
The development of this project was guided by prior requirements analysis and architectural design.

UI/UX Prototype (Figma)

The complete user interface design, including the public view and administrative dashboard, can be viewed at the following interactive link:

https://www.figma.com/design/fAAOEGN97V2RIwPw2WLzjf/Competence-1-Web-Design?node-id=8-184&t=rlAdWXcr5gEapMNt-1



Class Diagram (Database)

This diagram illustrates the database structure, relationships between entities, and cardinality, ensuring data integrity (e.g., unique invoice numbers).

![WhatsApp Image 2026-02-19 at 22 57 22](https://github.com/user-attachments/assets/af462636-615e-402c-898d-7b73337cfad0)


Use-Case Diagram

Illustrates the interactions of the different actors (Customer and Internal Roles) with the system. 

![WhatsApp Image 2026-02-19 at 21 24 35](https://github.com/user-attachments/assets/84e5c9e8-d22d-474a-aa94-de8c2b3b4e85)


Tech Stack
Backend Framework: Laravel 10.x (PHP 8.1+)

Database: MySQL / MariaDB

Frontend: Blade Templates with [Tailwind CSS / Bootstrap]

Version Control: Git & GitHub

Design: Figma
