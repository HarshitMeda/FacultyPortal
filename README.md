# FacultyPortal
## ER Diagram
![alt text](https://raw.githubusercontent.com/HarshitMeda/FacultyPortal/main/ER_Diagram.jpg)

### Brief Overview of Database
Faculty Table: Includes faculty details.
Login Info Table: Stores the login details of all faculties to the academic portal.
Application Table: Stores Leave application details of all faculty members.
Action Table: Records the actions taken by authorities on leave applications.
Comments Table: Records comments by everyone involved.
Process: The approval process to be followed for people with varying designations.
 Transition and Retrospective Transition Tables: Sequence of processes for each process ID.
### All Features We Have Developed into The Academic Portal 
* Basic Employee Portal
* Specialized Portals for Dean, HODs and Director
* Director has the option to appoint new HODs and Deans.
* Paper Trail of all the past leave applications.
* Relevant security features
* Director has the authority to change the HoD and Dean appointments.
* Whenever there is a change in HoD or Dean FAA, then all the pending applications are forwarded to the new person.
* retrospective leave application
* automatically “rejected by the system.” For applications that have reached start date.
* Excess Leaves feature
* If HoD rejects a leave application, then is not forwarded to Dean FAA.
### Triggers
To ensure that one faculty has at most one position across roles which include HOD, Dean and Director, We have implemented a trigger. 
This trigger also ensure that there is only one HOD per department and one Dean, Director across the entire institute.

# Faculty Website

Faculty website can be viewed even without logging into their respective portal accounts.
Edditing is not possible on the website.
To edit, the faculty must login at the faculty portal.
Once logged in, the faculty has the option of editing different aspects of the webpage which include:
* Biography
* Research
* Publication
* Students
* Courses

All this data is stored and retrieved from mongoDB.
All get and post commands are executed in php.


