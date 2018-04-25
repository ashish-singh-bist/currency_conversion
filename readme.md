# Neuro-Flash Currency Conversion

The app is built in Laravel 5.6
This app is for currency conversion.
The app uses http://data.fixer.io/api/latest for getting the current exchange rate.
The app took 4 hours for completion.

## Getting Started

Here are easy steps to install this app and convert your currency.

### Prerequisites

```
1:- Web server to run php (ex. apache)
2:- php 7.1 and above
3:- Composer or Composer.phar
4:- Set your fixer.io api key in .env file. FIXER_API_KEY
```

### Quck Installation

```
git clone https://github.com/ashish-singh-bist/neuro_flash.git

cd neuro_flash

composer install

php artisan serve

Open url (showing in cmd/bash schreen) in your browser.
```

### How app works (Step by step):-

```
1:- Base currency
2:- Base amount
3:- Target amount
```

```
1:- Please select base currency from drop down, which you want to convert.
2:- Next fill the amount in "Base amount" (for ex. 1034.34).
3:- Select target currency, in which you want to convert your base amount.
4:- Click on submit button.
5:- Done (You can see the result on your screen.)
```

## License

This project is licensed under the MIT License.

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc