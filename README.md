# Robot-Arm-Controller
This is Task 1(Robot Arm Controller) in IoT path at Smart Methods summer training.

The index.php file has the interface for the conroller made using bootstrap 4.  
The interface has 6 motors each with a range of 180, an on/off switch to turn the motros on/off, and a save button that submits the changes into the database.  
At the beging of the file there's a php code that retrieves the values of the motors and the switch from the database and puts the values on the page.  

The includes/connector.php file makes the connection to the database.  
The database was made using MySQL through XAMPP.  
the database has three columns: motor(motor number), angle(0-180), and status(on/off).  

The includes/save.php handles the submition of the values from the web page to the database, after clicking the save button.  

- Abdullah Alsaleh
- KFUPM ID: 201637180
