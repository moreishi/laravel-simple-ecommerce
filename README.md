
# Simple ECourse Store App

A simple ecommece application for online ECourse. This repository deomstrathe the following features and methodologies during development.

### Microservices
* Authentication and Authorization
* Ecourse Catalog
* Order, Checkout and Payout 
    
    * Note that Paypal payment gateway sandboxed is used in live demo.
* No complete CRUD is applied in Catalog Course microservice, online pre-filled data using facrories and faker data.

### Patterns used and libraries
* MVC (Model View Controller)
* DTO (Data Transafer Object)
* TDD (Test Driven development)
* Repository & Serives Pattern
* Model Policies
* Docker is used in AWS deployment
* Vite & Vue3, Pinia
* Vuetify (Frot-End CSS framework components)
* Typescript

## How to use in LOCAL environment

Download and clone the repository.


### Step 1: Clone repository
```
git clone git@github.com:moreishi/laravel-simple-ecommerce.git

cd laravel-simple-ecommerce
```

### Step 2: .env

You must provide your own Paypal sandbox credentials.

```
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

#PayPal API Mode
# Values: sandbox or live (Default: live)
PAYPAL_MODE=

#PayPal Setting & API Credentials - sandbox
PAYPAL_SANDBOX_CLIENT_ID=
PAYPAL_SANDBOX_CLIENT_SECRET=

#PayPal Setting & API Credentials - live
PAYPAL_LIVE_CLIENT_ID=
PAYPAL_LIVE_CLIENT_SECRET=
```

### Step 3: Composer
```
composer install
```

### Step 4: NPM
```
npm install

npm run build
```

### Step 5: Docker Stail
```
./vendor/bin/sail up --build
```

### Step 6: Migration
```
./vendor/bin/sail arisan migrate:fresh --seed
```


## Quick AWS Cloud Formation 

I will only supply the cloud foundation JSON and not the key.

### Stack JSON
use the following file json for the Stack.
```
File: AWS/Cloud Foundation/ec2.json
```

### Step 1: Install the following

Once the EC2 is up and running. Install the following pre-requesites stack. 

* NPM
* Docker
* Composer
* PHP8.2
* Git

### Step 2: use docker-laravel
Use the repository for the deployment in EC2

```
git clone git@github.com:vshloda/docker-laravel.git
cd docker-laravel
```

### Step 3: Your ecourse app repository
Inside "docker-laravel/src" place your files.
```
git clone git@github.com:moreishi/laravel-simple-ecommerce.git
```
### Repeat the following steps in local development section.
* Steps 1, 2, 3 and 4



## Now you are ready to spin your docker

```
cd cd docker-laravel
docker-compose up --build -d
```

# Thank you!

Thank you for reading the README.md.

We know this is not perfect, if you have something in mind that needs to be done or add. Let me know, thank you.
