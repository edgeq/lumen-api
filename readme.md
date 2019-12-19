# Lumen API Project

## Getting Started
This project was developed using Lando.
However, you can also run this with any PHP-backend running PHP >= 7.1

To run using the built-in PHP server, run the following commands:
  ```
  composer install
  php -S localhost:8000 -t public
  ```


To get started with Lando, run the following commands:

```
  lando composer install
  lando start
  Follow the url provided: https://lumen-api.lndo.site/
```
## Back End
In the project brief the marketer mentions that they'll want to allow other third parties make GET requests to out endpoint, but also be able to use on an internal application. The API endpoint should:

* Fetch data from https://randomuser.me/ and return a JSON response with the
manipulated data that ends up looking like:

```{
name: "[title] [First name] [Last name]",
email: "[Email]",
photo: "[Photo URL]",
birthday: "[formatted date-of-birth like April 24, 2012]"
}
```

* URL of the endpoint to live at /fetch-data
* Handle CORS requests from anything that makes a GET request to the endpoint

## Front End

The marketer has requested a page that renders out the contents of that API into a "business card" layout.

The front end should:
* Fetch from the API endpoint at /fetch-data without any CORS issues
* Display an avatar, full name, email address and formatted birthdate in a style similar to
the above graphic
* Not contain any explicit CSS. Utilize a utility-based CSS framework such as
https://tachyons.io/ or https://tailwindcss.com/
* Ideally contain vanilla JS to replace items in the DOM, but can use a framework such as https://reactjs.org/, https://vuejs.org/, or https://preactjs.com/, especially if the framework provides an easy way to scaffold and test a project.

## Notes on Dependencies
All depenencies for this project are composer packages. I decided to use CDNs for Javascript and CSS dependencies for a specific set of reasons.

First, this project is intended to be opened on a local environment and not deployed online. If this project was intended for a production site, more time would be spent on properly integrating JS and CSS via the proper npm packages.

Second, the project called for using vanilla javascript to replace items in the DOM. You can see that in the script tags of the template file located at `resources/views/app.blade.php`

Third, I've never used Lumen. It was fun to spend time learning a new framework, but it also meant that I needed to decide what I needed to prioritize given the time constraints I was working under.