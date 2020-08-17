==== INSTALL API

gil clone https://github.com/dokermast/countapi.git

composer install

cp .env.example .env

php artisan key:generate


=== API DOCS

request:  <domain>/api/count

request method: POST

input data format :

{
  "items": {
    "42": {
      "currency": "EUR",
      "price": 49.99,
      "quantity": 1
    },
    "55": {
      "currency": "USD",
      "price": 12,
      "quantity": 3
    }
  },
  "checkoutCurrency": "EUR"
}

=============================

This is an application for calculating the total value of goods in different currencies.
It receives data for each product (currency, price, quantity) and returns
the amount in the selected currency.

============================
