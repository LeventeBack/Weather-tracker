Readme - Weather Tracker
========================
[Hosted web app link](http://home-weather-tracker.herokuapp.com)

* * * * *

## I. Introduction


### The Weather Tracker website provides an app with a simple user interface, to preview our sensors data, to get notifyed if anithing is unusual.

![index page -\> welcome message](./img/index-welcome.png)
​Figure 1 – The starting page of the app

* * * * *

## II. Used technologies

The web app was created using a lot of different technologies.

![technologies](./img/technologies.png)
Figure 2 – Used FrontEnd, BackEnd, sensor scripting and deployment tools and languages

#### Frontend
- HTML - the app's markup language
- CSS - the app's styling language  
- Sass - to make the CSS more dynamic
- Bootstrap - CSS framework to make the styling more easier   
- JavaScript - frontend programming language
- jQuery - JavaScript library used for AJAX requests to the server
- Chart.js - JavaScript used for the charts

#### Backend
- PHP - backend programming language 
- Laravel framework - PHP framework for making the development more easier 
- MySQL - the app's database languege, database host: [remotemysql.com](https://remotemysql.com)  

#### Deployment tools
- GIT - version control system for syncHronizing the code with GitHub
- GitHub - version control storage, the server serves the files from here. 
- Heroku - the webapp's host [heroku.com](https://heroku.com) 

#### Sensor Script
- C++ - programming language for the sensor script for reading and sending data 

* * * * *

## III. Features:


![index page -\> features](./img/index-features.png)
​Figure 3 – The webapp's features


-   **24/7 Access** - the website can be accessed anytime from any device.
-   **Security** - data security thanks to the secure authentication system.
-   **Data Diversity** - the sensors track the air temperature, humidity and atmospheric pressure.
-   **Data Charts** - datas can be viewed on descriptive charts.
-   **Live Updates** - the data is always up to date on the website.
-   **Error Bounderies** - set error bounderies and track unusual changes.

* * * * *

## IV. Authentication:


![auth page](./img/auth.png)
​Figure 4 – The application's registration and login form 

* * * * *

## V. Administrator rights


1.  **Access all the data**
2.  **Manage the users's sensors**
3.  **Access to the sensor settings and change the owner.**

### V. – 1. Access all the data (Latest Data link)
![admin-data](./img/admin-data.png)
​Figure 5 – All the data from all the sensor sorted by date with pagination

By clicking on the "View Details" button we can see more details about that particular dataset.

![admin-data-show](./img/admin-data-show.png)
​Figure 6 – Details about the dataset


### V. – 2. Manage the users's sensors (Users link)

![admin-users](./img/admin-users.png)
​Figure 7 – List of all the users and their number of sensors.

By clicking on the "View" button we can see the selected user's sensors.

### V. – 3. Access to the sensor settings and change the owner (Sensors link)


![admin-sensors](./img/admin-sensors.png)
​Figure 8 – List of all the sensors


By clicking on the "Add Sensors" button we can add more sensors to the system

![admin-sensors-add](./img/admin-sensors-add.png)
​Figure 9 – The form for adding a sensor

By clicking the "View Details" button we can see the selected sensors's settings and all the data.

![admin-sensors-show](./img/admin-sensors-show.png)
​Figure 10 – The sensors settings and the it's data.

By clicking on the "Edit Settings" button we can change the sensors's settings.

![admin-sensors-edit](./img/admin-sensors-edit.png)
​Figure 11 – The form for changing the sensor's settings

The admin can change the sensors's owner by selecting a user from the dropdown list.

* * * * *

## VI. User rights

1.  **Access the owned sensor's data**
2.  **Change the owned sensor's settings**
3.  **Check the data on data charts**

![index-user-welcome](./img/index-user-welcome.png)
​Figure 12 – The homepage when logged in as a user

### VI. – 1. Access the owned sensor's data (Latest Data link)


![user-data](./img/user-data.png)
​Figure 13 – All the data from the owned sensors sorted by date with pagination

By clicking on the "View Details" button we can see more details about that particular dataset just like the admins.

### VI. – 2. Change the owned sensor's settings (My Sensors link)


![user-sensors](./img/user-sensors.png)
​Figure 14 – List of all the owned sensors

By clicking on the "View Details" button we can check the selected sensor's settings, and from there 
we can access the form where we can change the settings ("Edit sensors" button).


![user-sensors-edit](./img/user-sensors-edit.png)
​Figure 15 – The form for changing the sensor's settings

The user cannot change the owner of the sensor. 
It can be observed that here we can set the range of the preffered datas. 
If the data is besides the range the data will be highlighted in red. (Check Figure 5, Figure 6, Figure 13) 
Here can be set the color for the charts as well.

### VI. – 3. Check the data on data charts (Charts link)

Here you can select and view the data of the selected sensors for a selected day 

![user-charts-filter](./img/user-charts-filter.png)   
​Figure 16 – A form for selecting the preffered date and sensors

![user-charts-temp](./img/user-charts-temp.png)
​Figure 17– The temperature chart showing the data of the selected date 

On tha page there are 2 more charts one for the humidity and one for the atmospheric pressure. 

## VII. The sensor 

A webapplication uses the BME280 sensor with the NodeMCU ESP8266 WiFi module.  

![senzor](./img/sensor.jpg)
​Figure 18 – The BME280 sensor with the WiFi module 

The datas are being read in every 10 minutes and saved to the database.  


