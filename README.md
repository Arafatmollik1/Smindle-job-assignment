# A Job Assignment for Smindle

## Prerequisites

Before getting started, ensure you have the following installed:

- [Docker](https://www.docker.com/products/docker-desktop)
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)

## Installation

Follow these steps to set up the project:

1. Clone the repository.

2. Install dependencies using Composer:
   ```bash
   composer install
   ```

3. Set up environment configuration:
   ```bash
   cp .env.example .env
   ```

4. Build and start the Docker containers:
   ```bash
   ./vendor/bin/sail up -d
   ```

## Queue Workers


Start a queue worker:
```bash
./vendor/bin/sail artisan queue:work
```

## API Endpoints


**Endpoint**: `GET http://localhost/api/v1/oder-with-basket`

**Request Body**:
```json
{
    "first_name": "Alan",
    "last_name": "Turing",
    "address": "123 Enigma Ave, Bletchley Park, UK",
    "basket": [
        {
            "name": "Smindle ElePHPant plushie",
            "type": "unit",
            "price": 295.45
        },
        {
            "name": "Syntax & Chill",
            "type": "subscription",
            "price": 175.00
        }
    ]
}
```

**Response**:
```json
{
    "message": "Order has been placed successfully"
}
```
Note: There are more responses that are based on different types of errors.

