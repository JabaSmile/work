Documentation for Backend Dev

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
    
Documentation for Frontend Dev

  Route("/medicine")
  Have all CRUD methods
  
    Route("medicine/") use variabele [$medicines] to get all data in medicine db
    Route("medicine/new") use variabele [$medicine] to create new medicine 
    Route("medicine/{id}") use variabele [$medicine] to show data in medicine recived by id
    Route("medicine/{id}") delete medicine by id
    
    Posible methods for get data from $medicine(s)(Ex. $medicines->getId())
    getId/setId
    getTitle/setTitle
    getPrice/setPrice
    getManufacturer/setManufacturer
    addCurrentSubstanceId/removeCurrentSubstanceId
    
  Route("/manufacturer")
  Have all CRUD methods

    Route("manufacturer/") use variabele [$manufacturers] to get all data in manufacturers db
    Route("manufacturer/new") use variabele [$manufacturer] to create new manufacturer 
    Route("manufacturer/{id}") use variabele [$manufacturer] to show data in manufacturer recived by id
    Route("manufacturer/{id}") delete manufacturer by id
    
    Posible methods for get data from $manufacturer(s)(Ex. $manufacturers->getId())
    getId/setId
    getTitle/setTitle
    getUrl/setUrl

  Route("/current_substance")
  Have all CRUD methods

    Route("current_substance/") use variabele [$current_substance] to get all data in current_substance db
    Route("current_substance/new") use variabele [$current_substance] to create new current_substance 
    Route("current_substance/{id}") use variabele [$current_substance] to show data in current_substance recived by id
    Route("current_substance/{id}") delete current_substance by id
    
    Posible methods for get data from $current_substance(Ex. $current_substance->getId())
    getId/setId
    getTitle/setTitle
