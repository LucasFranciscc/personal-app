<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\Controllers");

/**
 * APP ROUTES
 */
$route->group(null);
$route->get("/", "App:home");
$route->get("/home", "App:home");

// Login
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

// Logout
$route->get("/logout", "App:logout");

// Warnings
$route->get("/warnings", "Warnings:warnings");

// Training Sheets
$route->get("/training-sheets", "TrainingSheets:trainingSheets");

// Trainings
$route->get("/trainings/{training_sheet_id}", "Trainings:trainings");

// Training Exercises
$route->get("/training-exercises/{training_sheet_id}/{training_id}/{position}", "TrainingExercises:trainingExercises");

// Complete Exercise
$route->post("/complete-exercise", "TrainingExercises:completedExercise");

//Partnerships
$route->get("/partnerships", "Partnerships:partnerships");

//Students
$route->get("/students", "Students:students");

$route->get("/edit_profile", "Students:edit_profile");
//$route->get("/updateProfile", "Students:profile");
$route->post("/editUser", "Students:editUser");



//Chat
$route->get("/chat/{user_id}", "Chat:chat");
$route->post("/chat/{user_id}/chat-get", "Chat:get");
$route->post("/chat/{user_id}/chat-insert", "Chat:insert");

//Request
$route->post("/request", "Requests:status");

//Before and After
$route->get("/beforeafter", "BeforeAndAfter:beforeAfter");
$route->post("/beforeafterResult", "BeforeAndAfter:beforeAfterResult");
//$route->get("/beforeafter/{before}/{after}", "BeforeAndAfter:beforeAfter");

// Postural Evaluation
$route->get("/posturalEvaluation", "PosturalEvaluation:posturalEvaluation");
$route->post("/listEvaluation", "PosturalEvaluation:list");

//Videos
$route->get("/video1/{user_id}", "Presentations:video1");
$route->get("/video2/{user_id}", "Presentations:video2");
$route->post("/videoupdate1/{user_id}", "Presentations:updateVideo1");
$route->post("/videoupdate2/{user_id}", "Presentations:updateVideo2");

// Generate PDF
$route->get("/generatepdf/{training_id}", "TrainingExercises:generatePDF");

/** Notifications */
$route->get("/notifications", "ChatNotifications:notifications");
$route->post("/alert", "ChatNotifications:alert");

/** Recover */
$route->get("/recover", "Login:recover");
$route->post("/recoverPassword", "Login:recover");
$route->get("/recover/{code}", "Login:reset");
$route->post("/recover/reset", "Login:reset");

/** Note Execise */
$route->post("/note", "TrainingExercises:note");


/** END APP */
$route->namespace("Source\Controllers");

/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
  $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
