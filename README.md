Documentation 

Symfony 4.22 project  

For strat broject use "php bin/console doctrine:database:create" after "php bin/console doctrine:migrations:migrate" for create database & add tables

Project have 4 main controllers based on entitys

1.Home
  Route("/")
  just home page without nmethods & params
  
2.Medicine
  Route("/medicine")
  Have all CRUD methods
  
  created by Medicine Entity
  
    int Id
    string title
    float price
    
    have get/set methods for all variables
    
    relation variables
    //OneTomany
    currentSubstance
    
    //ManyToOne
    manufacturer   
    
3.CurrentMedicine
  Route("/current_substance")
   Have all CRUD methods
   
   created by CurrentMedicine Entity
   
    int Id;
    string title;
    
    have get/set methods for all variables

4.Manufacturer
  Route("/manufacturer")
   Have all CRUD methods
   
   created by Manufacturer Entity
   
    int Id
    string title
    string url (text in db) + ovrride __toString() for correct work
     
    have get/set methods for all variables
