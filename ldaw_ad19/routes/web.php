<?php

use Illuminate\HTTP\Request;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/***************************
        BASIC ROUTES
***************************/

//This pattern is assigned to the home page
Route::get('/', function () {
    return view('welcome');
});

/*
The simplest route is a constant string pattern and a closure which returns an
HTML string
*/
Route::get('laravelBasicRoute', function(){
    /*
       Here we need to render an HTML text
       it can be a harcoded HTML or a code generate in anothe file called view
   */
    $output = "<h1>This is a Laravel Basic Route</h1>";
    $output .= "<p>This route is loaded using a constant string pattern and a closure which returns
                    this HTML code.
                </p>";

    return $output;

});

/*******************************
        RETURNING A VIEW
*******************************/

/*
Also we can use a view template for storing our HTML and return it in the closure
using the "view" function

The template must be stored in the "resources/views" directory and must have ".blade.php"
extension.

Laravel uses "blade" templates engine for processing the views, that's the reason why view
files must have that extension.
*/

Route::get('basicRouteWithView', function(){
    /*
    View helper function receives the template's name and the data to pass

    The data will be turned into variables inside the template
    */
    return view('basicRouteWithView', ["name" => "Erik Sánchez"]);
});

/*
The previous route can be compressed to one single line using the
Route:view(pattern, template, data) method.

This method directly returns a response withe the view loaded.
*/
Route::view("basicRouteWithViewShort", "basicRouteWithView", ["name" => "Erik Sánchez"]);

/*********************************************
        PASSING GET PARAMETERS TO ROUTE
*********************************************/

/*
It's possible to define parameter tokens inside the route pattern.

This tokens follows a special syntax and defines a variable string inside
the route pattern.

The syntax is {parameter} for required parameters and {parameter?} for optional
parameters
*/
Route::get("withParameters/{name}/{lastname?}", function($param1, $param2 = "N/A"){

    return view("withParameters", ["name" => $param1, "lastname" => $param2]);

});

/****************************************
                EXAMPLE

CREATING A LIST OF STUDENTS USING A FORM
STORING THE STUDENTS IN A JSON FILE
LISTING THE STUDENTS
****************************************/

//Route for the creation form
Route::view("/studentsClosure/new", "students.new");

//Route for storing a user
//Add use Illuminate\Http\Request on the script top
Route::post("/studentsClosure/create", function(Request $request){

    //Load JSON file
    $filename = storage_path("files/students.json");
    $data = file_get_contents($filename);
    $data = json_decode($data,true);

    $student = [
        "id" => request("id"),
        "name" => request("name"),
        "lastname" => request("lastname")
    ];

    $data[request("id")] = $student;

    //Save file
    if( file_put_contents($filename, json_encode($data)) ){
        return redirect("students/list");
    }

});

//Route for students list
Route::get("studentsClosure/list", function(){

    //Load JSON file
    $filename = storage_path("files/students.json");
    $data = file_get_contents($filename);
    $data = json_decode($data,true);

    return view("students.list", ["data" => $data]);

});

/***********************************************
        EXAMPLE WITH SIMPLE CONTROLLERS

CREATING A LIST OF STUDENTS USING A FORM
STORING THE STUDENTS IN A JSON FILE
***********************************************/

/*
It's possible to send the request to a controller instance instead of a closure. It allows having the logic
from the processing in a dedicated file and keeping the routes file cleaner, making the code more
mantainable and scalable

The format is:

Route::get(pattern, controller@method)

The controller can be created using the artisan command:

php artisan make:controller <controllerName>

*/

//Send the request to the "new" method inside app/HttpControllers/StudentsJsonController.php
Route::get("studentsJson/new", "StudentsJsonController@new");

//Send the request to the "create" method inside app/HttpControllers/StudentsJsonController.php
Route::post("studentsJson/create", "StudentsJsonController@create");

/************************************************************
        EXAMPLE WITH RESOURCE CONTROLLERS AND DATABASE

CREATING A LIST OF STUDENTS USING A FORM
STORING THE STUDENTS IN DATABASE USING THE QUERY BUILDER
LISTING THE STUDENTS
************************************************************/

/*
Resource controllers are controllers with the basic empty methods  for doing the CRUD of a given data entity.

Resource controllers can be created using the artisan command:

php artisan make:controller --resource <controllerName>

Actions inside a resource controller must be associated to a given route, so we need to create the routes in
the routing file.

All routes for a "resource controller" actions can be created using a special method from "Route" class
called "resource":

Route::resource("prefix", "controllerName")

*/

Route::resource("students", "StudentsController");

/***************************
    DB CONNECTION TEST
***************************/

#Add "use Illuminate\Support\Facades\DB;" at the top of the script
Route::get("testConnection", function(){
    //If this code works, connection is successfull
    echo "Connected to: " . DB::connection()->getDatabaseName();
});
