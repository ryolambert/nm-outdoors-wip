<?php


require_once(dirname(__DIR__, 3) . "/vendor/autoload.php");
require_once(dirname(__DIR__, 3) . "/php/classes/autoload.php");
require_once(dirname(__DIR__, 3) . "/php/lib/jwt.php");
require_once(dirname(__DIR__, 3) . "/php/lib/xsrf.php");
require_once(dirname(__DIR__, 3) . "/php/lib/uuid.php");

require_once("/etc/apache2/capstone-mysql/encrypted-config.php");

use HalfMortise\NmOutdoors\RecArea;

/**
 * API for RecArea
 *
 * @author Bashir Shafii
 * @version 1.0
 */

//verify the session, if it is not active start it
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//grab the mySQL connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/nmoutdoors.ini");

	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	// sanitize input
	$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$recAreaName = filter_input(INPUT_GET, "recAreaName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$recAreaLat = filter_input(INPUT_GET, "recAreaLat", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_NO_ENCODE_QUOTES);
	$recAreaLong = filter_input(INPUT_GET, "recAreaLong", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userLat = filter_input(INPUT_GET, "userLat", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userLong = filter_input(INPUT_GET, "userLong", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$distance = filter_input(INPUT_GET, "distance", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_NO_ENCODE_QUOTES);
	$activityId = filter_input(INPUT_GET, "activityId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);


	// make sure the id is valid for methods that require it
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}

	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//gets rec area by Id
		if(empty($id) === false) {
			$reply->data = RecArea::getRecAreaByRecAreaId($pdo, $id);
			//get rec area by name
		} else if(empty($recAreaName) === false) {
			$reply->data = RecArea::getRecAreaByRecAreaName($pdo, $recAreaName)->toArray();
			//get recArea by activityId
		} else if(empty($activityId) === false) {
			$reply->data = RecArea::getRecAreaByActivityId($pdo, $activityId)->toArray();
			//get rec area by distance
		} else if(empty($recAreaLat || $recAreaLong || $userLat || $userLong || $distance) || $distance === false) {
			$reply->data = RecArea::getRecAreaByDistance($pdo, 36.245525, -106.427714, 35.159, -106.5761, 75.531951)->toArray();//$recAreaLat, $recAreaLong,  $userLat,  $userLong,  $distance);

			//return all rec areas in the database
		} else if(empty($pdo) === false) {
			$reply->data = RecArea::getAllRecAreas($pdo)->toArray();

		}
	} else {
		throw (new InvalidArgumentException("Invalid HTTP request", 400));
	}
	// catch any exceptions that were thrown and update the status and message state variable fields

} catch(\Exception \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}
// encode and return reply to front end caller
echo json_encode($reply);