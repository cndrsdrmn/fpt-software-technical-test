# FPT Software - Technical Test

The purpose of this repository is for process recruitment at FPT Software.

## Prerequisites

Before getting started, ensure you have the following installed on your machine:

- [PHP 8.1](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download)
- [MySQL](https://dev.mysql.com/downloads/mysql)

## Getting started

To get started, clone this repository to your local machine:

```bash
git clone https://github.com/cndrsdrmn/fpt-software-technical-test.git
```

Once you have cloned the repository, navigate to the project directory and install the necessary dependencies:

```bash
cd fpt-software-technical-test 
composer install
```

## Database Configuration

Create a new database on your local machine:

```shell
mysql -u root -p -e "CREATE DATABASE FPT_test"
```

After creating the database, copy the `.env.example` file to `.env` and update the database credentials:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=FPT_test
DB_USERNAME=root
DB_PASSWORD=your_password
```

Once you have updated the .env file, run the following command to migrate the database:

```bash
php artisan migrate
```

## Running the application

To run the application, start the local development server:

```bash
php artisan serve
```

You can now access the application at http://localhost:8000.

## Running the tests

To run the tests, run the following command:

```bash
php artisan test
```

## Answers

### Question 1

For the first question, I have created a new helper class called `FptHelper` and placed it in the `app/Support` directory. The class contains method `alphabetSoup` which accepts a string as an argument and returns the string with the letters in alphabetical order.

```php
public static function alphabetSoup(string $char): string
{
    $char = preg_replace('/[^a-zA-Z]/', '', $char);

    $charachters = str_split($char);

    for ($i = 0; $i < count($charachters); $i++) {
        for ($j = 0; $j < count($charachters); $j++) {
            if ($charachters[$i] < $charachters[$j]) {
                $temp = $charachters[$i];
                $charachters[$i] = $charachters[$j];
                $charachters[$j] = $temp;
            }
        }
    }

    return implode('', $charachters);
}
```

You also can access the function using Restful API:

```http request
GET http://localhost:8000/api/alphabet?q={string}
```

### Question 2

For the second question, I have created a Restful API you can find the source code in `app/Http/Controllers/Api/V1/CustomerController.php`.

## API Documentation

For the API documentation, I have used Postman to create the documentation.

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/330514-a234bcd1-7f19-4e7e-902d-ef0fe725e0b2?action=collection%2Ffork&collection-url=entityId%3D330514-a234bcd1-7f19-4e7e-902d-ef0fe725e0b2%26entityType%3Dcollection%26workspaceId%3Dcabccab8-5530-43d9-af1f-73cfb2824c42#?env%5BFPT%20Software%20-%20Technical%20Test%20(Local)%5D=W3sia2V5IjoiYmFzZV91cmwiLCJ2YWx1ZSI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImVuYWJsZWQiOnRydWUsInR5cGUiOiJkZWZhdWx0In0seyJrZXkiOiJxLnNlYXJjaCIsInZhbHVlIjoiIiwiZW5hYmxlZCI6dHJ1ZSwidHlwZSI6ImRlZmF1bHQifSx7ImtleSI6InEucGVyX3BhZ2UiLCJ2YWx1ZSI6IjEwIiwiZW5hYmxlZCI6dHJ1ZSwidHlwZSI6ImRlZmF1bHQifSx7ImtleSI6InEucGFnZSIsInZhbHVlIjoiMSIsImVuYWJsZWQiOnRydWUsInR5cGUiOiJkZWZhdWx0In0seyJrZXkiOiJwLmN1c3RfaWQiLCJ2YWx1ZSI6IjI1IiwiZW5hYmxlZCI6dHJ1ZSwidHlwZSI6ImRlZmF1bHQifSx7ImtleSI6ImJjLmN1c3RfbmFtZSIsInZhbHVlIjoiQ3VzdG9tZXIgQ3JlYXRlIE5hbWUiLCJlbmFibGVkIjp0cnVlLCJ0eXBlIjoiZGVmYXVsdCJ9LHsia2V5IjoiYmMuY3VzdF9hZGRyZXNzIiwidmFsdWUiOiJDdXN0b21lciBDcmVhdGUgQWRkcmVzcyIsImVuYWJsZWQiOnRydWUsInR5cGUiOiJkZWZhdWx0In0seyJrZXkiOiJidS5jdXN0X25hbWUiLCJ2YWx1ZSI6IkN1c3RvbWVyIFVwZGF0ZSBOYW1lIiwiZW5hYmxlZCI6dHJ1ZSwidHlwZSI6ImRlZmF1bHQifSx7ImtleSI6ImJ1LmN1c3RfYWRkcmVzcyIsInZhbHVlIjoiQ3VzdG9tZXIgVXBkYXRlIEFkZHJlc3MiLCJlbmFibGVkIjp0cnVlLCJ0eXBlIjoiZGVmYXVsdCJ9XQ==)