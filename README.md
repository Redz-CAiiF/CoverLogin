# PHP-login-MVC
A simple web page with a log-in and register modal

#Info
- Components -> this folder contains the various component that might be used in the page
>
- controller -> this folder contains all the files used for the page routing and the application logic
>
- css -> this folder contains all the page styles that are not considered a component, usually specific styles.
>
- model -> this folder contains all the Database access methods, im using PDO to access the database
    - in order to change the connection data for your DBMS modify config.ini
>
- view -> this folder contains all the views of the project (e.g. login.php register.php)
>
- SQL -> this folder contains all the sql scripts used to create the database where all the users data is stored
>
- .htaccess -> it is used to prettify the various links (e.g. yourPath/loginBootstrapMinimal/register). Right now it is unused.
>
- index.php -> the first called page when you open the website

```
Currently i'm separating the various parts of the code. The final product should be in MVC standard (view, controller, model)
view: all the html, css and js files, used to view and interact with the web application.
controller: it contain the routing(MainController used to redirect to all other files) and the application logic.
model: all classes used to connect, retrive and modify data.
```
