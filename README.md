---
# Healthy Habits - Diet Planner Website

## Project Description

Healthy Habits is a comprehensive diet planning website designed to help users manage and track their meals for optimal health. The platform includes a diet library, calorie and nutrition tracking, a meal planner, and personalized health recommendations. Users can set daily or weekly nutrition goals, monitor their food intake, and receive dietary suggestions based on personal information. Additionally, the website offers consultation and messaging options for users to get personalized advice from consultants. This was a part of the CSE471 course at BRAC University.

## Group Members
- Niloy Ahsan (21101255)
- Rady Noor (21101038)
- Abid Mashrafi (21101075)
- Chaity Rani Ghosh (21101191)

## Project Links
- **Class Diagram**: [Class Diagram](Sprint2/Sprint2-Class_Diagram.jpg)
- **Project**: [Project Link](Sprint3)
- **Project Demonstration Video**: [Demonstration Video](https://youtu.be/B4-YheOwp70)
- **Unit Testing Video**: [Unit Testing Video](https://youtu.be/h6B6yakrHGQ)

## Functional Requirements

### User Authentication and Login
- Users can create an account with their email.
- Users can log in using their email.

### User Diet Plans
- Users can view their daily diet charts based on their age.
- Users can see their daily activity chart according to their height, weight, and age.

### User Goals
- Users can set and update their goals.
- Users can see their BMI and receive automatic suggestions for weight management.

### User Profile
- Users can create and update their profile.
- Users can view their provided information.

### Consultation
- Users can book appointments and send messages to consultants.
- Consultants can confirm appointments and reply to user queries.

## User Functionality

### Customer Interface
1. **Customer Registration and Login**: New users sign up; existing users log in.
2. **Customer Profile Form**: Users fill out and update their profile details.
3. **Customer Goal Form**: Users set and update their health goals.
4. **Customer Daily Diet Chart**: Users view diet charts based on their goals.
5. **Daily Activity**: Users see their daily activities based on BMI.
6. **User Goal**: Users view their goals and BMI.
7. **User Profile**: Users view their profile information.
8. **Appointment Form**: Users book appointments with consultants.
9. **User Appointment Information**: Users view details of their booked appointments.
10. **Customer Home Page**: Main dashboard with navigation buttons and logout option.

### Consultant Interface
1. **Consultant’s Appointments**: Consultants manage and respond to user appointments.


## Technology Stack

### Frameworks
- **Pattern**: MVC (Model-View-Controller)
- **Framework**: PHP Laravel
- **Testing**: PHPUnit

### Languages 
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP, SQL
- **Database**: MySQL

## Database Models
- **User**
- **Goal**
- **Profile**
- **UserAppo**

## Controllers
- **Home**
- **loginauth**
- **Consultant**
- **GoalController**
- **ProfileController**
- **DietTableController**
- **DailyActivityController**

## Unit Testing
Extensive unit testing has been performed on the following:
- **Models**: Ensuring data integrity and relationships.
- **Controllers**: Verifying the correctness of the logic and data flow.
- **Routes**: Ensuring all routes are correctly set up and secure.

## Acknowledgments
We would like to thank our course instructor for their guidance and support throughout this project. We also appreciate the valuable feedback from our peers, which helped us improve the functionality and user experience of Healthy Habits.
