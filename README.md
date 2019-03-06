# Prioritask Final Report

## A Lightweight To-Do List Optimized For Productivity

*CSCI-4235-A - Human Computer Interaction* - Final Project

## Live Demo: [http://prioritask.danielburer.com](http://prioritask.danielburer.com)

### Table of Contents

- [Members](#members)
- [Implementation Links](#implementation-links)
- [Libraries Used](#libraries-used)
- [Abstract](#abstract)
- [Report](#introduction)
  - [Introduction](#introduction)
  - [Proposed Milestones](#proposed-milestones)
  - [User-centered Design](#user-centered-design)
    - [Task Urgency](#task-urgency)
  - [Database Diagram](#database-diagram)
  - [Implementation and Deployment](#implementation-and-deployment)
  - [Conclusion](#conclusion)
    - [Evaluation](#evaluation)
    - [Future Considerations](#future-considerations)

### Members
- Daniel Burer (group leader, frontend developer, backend developer)
- Mitchell Murphy (backend developer, database design)
- Deon Sanchez (requirements, documentation)

### Implementation Links
- HTML + JavaScript - Frontend development and all user-facing components.
- [PHP](http://www.php.net/) - All backend processes. (Template rendering, database connection, session mangement, user authentication)
- [Digital Ocean](https://www.digitalocean.com/) - Application deployment. (Cloud compute instance, virtual machine, public IP availablity)

### Libraries Used
- [PHP Template Inheritance](http://arshaw.com/phpti/) (PHP templating utilities)
- [HTML5 Boilerplate](https://html5boilerplate.com/) (HTML5 frontend template)
- [Bootstrap](https://getbootstrap.com/) (Responsive CSS framework)
- [jQuery](https://jquery.com/) (General-purpose JavaScript library)
- [moment.js](https://momentjs.com/) (JavaScript datetime management)
- [flatpickrv4](https://chmln.github.io/flatpickr/) (Javascript datetime control)
- [Font Awesome](http://fontawesome.io/) (Icon and glyph font toolkit)

### *Abstract*
**This project is centered around the design and implementation of a lightweight “To-Do List” application with a heavy focus placed on an effective, intuitive user experience. The primary metric used to organize tasks is “urgency”, a number calculated from due dates and time estimates. This metric is translated into visual indicators to signify the importance, or priority, of a task. The user interface adopts a minimalist aesthetic to eliminate distracting elements and place focus on the most import layout components. Additionally, as a web-based application with user authentication, Prioritask achieves cross-platform functionality and accessibility across multiple devices. The visual distinctions of urgency in conjunction with the previously mentioned user experience considerations are key attributes that grant this implementation the desired focus on productive, natural use.**

### Introduction

By definition, time management is the process of organizing and planning the division of time between different activities. On paper this seems like a simple concept, but today’s fast paced world has made time management a crucial skill. Our motivation for this project was to provide users with an effective tool for managing and prioritizing their responsibilities while keeping the learning curve shallow and the experience simple.

### Proposed Milestones

Below are the milestones that were proposed by the team in order of completion.

- Clear definition of a common problem
- Basic mockup of proposed applications user interface
- Creation of applications main task creation page
- Database design
- Database implementation
- Login/signup page
- Link database with application
- Implement tasks and urgency metric

### User-centered Design

One of our primary goals in this project was to create an application that was designed around the average user. As we designed the application, we concentrated on making the interface explain itself. We used the Bootstrap framework to simplify implementation and make design iteration easy. We implemented an easy to use Login/Signup page as well an intuitive task creation system that allows our users to create task cards. The design has been broken down into four main components in relation to a task card. These components are a set of buttons, a title for the task, details about the task, and an urgency calculation that is displayed as a percentage. These four components allow for a clutter free interface that a user can easily comprehend and allows for efficiency. 

#### Task Urgency

An issue that many existing task scheduling applications currently have is that they give no mention to the urgency of a task that has yet to be completed. We took this into account and implemented an urgency calculation into the application. This calculation is done by the entry of a due date when a task is created and an estimated time to complete that the user enters for each task. As the due date draws nearer the urgency percentage will rise on a task. The longer a task takes to complete the quicker it will rise in percentage as the due date draws nearer. We found that this implementation helps users understand when they need to start their task in order to complete them in a timely manner and avoid completing their task late or starting them without sufficient time to complete. In order to help stress the urgency of a task colors have been also assigned that help the user know when a task is still not that urgent (green) versus when a task needs to be immediately started (red).

### Database Diagram

Below is the ER diagram for the project’s data model, implemented as a MySQL database.

![image of database diagram](https://github.com/dwburer/Prioritask/blob/master/mysql/DIAGRAM.png)

### Implementation and Deployment

Prioritask is implemented as a full-stack web application. A frontend web app provides our user interface and presents data to the user from our backend server framework. The frontend is built with responsive HTML and JavaScript and handles asynchronous data transfer from a dedicated API constructed with PHP. The backend is deployed on a dedicated cloud instance, using a LAMP stack on Ubuntu for our implementation. The front end interface utilizes a simple registration to allow the storage and access of tasks from the MySQL database across multiple devices. We used several third party party libraries, such as Bootstrap, flatpickr, jQuery, and Google Maps, to improve the user's experience with thoroughly tested, well recognized web elements.

### Conclusion

#### Evaluation

Creating Prioritask has proved to be an invaluable experience in prototyping, full-stack development, and user experience centered design. Because the design of Prioritask is aimed at students, the core concepts that compose it naturally lend themselves to need-finding within an easily accessible target group: our peers. Personal experience and external inquiry regarding potential improvements for our time-management application converged to provide clear guidelines for the path of our project. The main functional targets our need-finding exposed were clarity of design and understandable solution heuristics. The diverse set of frameworks and libraries we used complicated the implementation process slightly and required flexibility and trial-and-error during actual development, but having pre-defined goals and functionality from previous prototyping exercises allowed the team to accomplish the intended implementation.

#### Future Considerations

In the future, Prioritask may change in the area of urgency calculation. Several different aspects of responsibilities might come into consideration. Locality may become an issue if the difference in location between a user and a particular task is great or the traffic data in a task's location shows long delays. If a task is able to be segmented, its subtasks may have individual urgency metrics that make more sense on their own. It is possible that we would consider making these task lists cards sharable and reusable, where you might only need to create a card once then place it with a date for the recurring things in your life for which you need to create a reminder. There is room for improvement when dealing with completed tasks; they might be sorted onto a different page that holds only your completed tasks so that they don't clutter the front page. Finally, the basic importance of a task could come into play. Finishing a speech for a sibling's wedding has more inherent importance than catching the current episode of your favorite TV show.
