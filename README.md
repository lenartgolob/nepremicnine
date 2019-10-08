# [Nepremicnine.com](https://lenartgolob.com/nepremicnine)

[Nepremicnine.com](https://lenartgolob.com7nepremicnine) is a website made for selling, buying and trading with real estate. It was made for educational porposes and it's a clone of an already existing website [nepremicnine.net](https://nepremicnine.net). This website is meant to look professionaly and allow users to post pictures and description of their real estate and than others users can see that add and buy the real estate. It automaticaly places the real estates by their category and it also allows users to search for a specific real estate. You can upload as many real estates as you wish, also you can edit and delete them. It is also customized for the admin of the page, because it allows him/her to edit and remove all the posts if they aren't appropriate or outdated.

## Preview

![lenartgolob.com/nepremicnine](https://raw.githubusercontent.com/lenartgolob/nepremicnine/master/img/about/2019-10-08-11-57-lenartgolob.com.png)


**[View Live Preview](https://lenartgolob.com/nepremicnine)**

## Download and Installation

* Firt if you want this project to work you need an Apache and MySQL server, I personaly recommend XAMPP.
* Download the files of this project or `git clone https://github.com/lenartgolob/nepremicnine.git`
* You must save the files in the htdocs file on the C: disk
* Then you must import the file nepremicnine.sql to phpMyAdmin so the database is created
* You can change the database configuration in the file database.php
* After that you can access the website via link localhost/nepremicnine

## Database

### Structure of Database

Keep in mind the structure of the database, while working on the project. The schema looks like this:

![Database schema](https://raw.githubusercontent.com/lenartgolob/nepremicnine/master/img/about/db-struct.PNG)

## Special features

* The search bar: You can for real estate by the name of the post, address, sale method, category and by both of the paragraphs.
* Facebook login: FB login saves the users email, first name and last name into the database and it sets the password to facebook
* Google login: Google login saves the users email, first name and last name into the database and it sets the password to facebook
