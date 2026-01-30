# simple-profile

**Simple of Registered Company Profile**

OK, we will start to build apps from the simple one.
We need it for gathering data mainly needed from emiten
in IDX.

This application is under heavy development.

## To Do

*   Yii1 -> Yii2
*   Data IDX30.
*   Data IDX45.
*   Data IDX80.

## Features

*   PoC on Yii1.
*   Simple profile.
*   Emiten shareholder & key person.

## Feature Recap

### Yii 1 Application (`www/`)

The Yii 1 application is a proof-of-concept for managing company profiles. It provides basic CRUD (Create, Read, Update, Delete) functionality for the following entities:

*   **Companies**: The core entity, representing a company.
*   **Profiles**: Detailed profiles for companies, including address, phone, website, etc.
*   **Shareholders**: Information about the shareholders of a company.
*   **Commissioners**: Information about the commissioners of a company.
*   **Directors**: Information about the directors of a company.

The application also includes user authentication (login/logout).

### Yii 2 Application (`yii2app/`)

The Yii 2 application is a more modern version, based on the Yii 2 basic project template. It currently provides the following features:

*   **User Authentication**: Login and logout functionality.
*   **Contact Form**: A working contact form.
*   **Basic Pages**: Home, About, and Contact pages.
*   **Dependency Upgrade**: The application's dependencies, including the Yii 2 framework itself, have been recently upgraded. The mailer component has been updated from SwiftMailer to SymfonyMailer.