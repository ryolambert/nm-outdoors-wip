<<<<<<< Updated upstream
ALTER DATABASE nmoutdoors CHARACTER SET  utf8 COLLATE  utf8_unicode_ci;

DROP TABLE IF EXISTS activityType;
DROP TABLE IF EXISTS activity;
DROP TABLE IF EXISTS review;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS recArea;

CREATE TABLE recArea (
   recAreaId BINARY(16) NOT NULL,
	recAreaDescription VARCHAR (6000),
	recAreaDirections VARCHAR(6000),
	recAreaImageUrl VARCHAR(255),
	recAreaLat FLOAT,
	recAreaLong FLOAT,
	recAreaMapUrl VARCHAR (255),
	recAreaName VARCHAR (255),

	PRIMARY KEY(recAreaId)
);


CREATE TABLE profile (

   profileId BINARY(16) NOT NULL,
	profileActivationToken CHAR(32),
	profileAtHandle VARCHAR(32) NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	profileHash CHAR(97) NOT NULL,
	profileImageUrl VARCHAR(255),

	PRIMARY KEY(profileId)
);

CREATE TABLE review (
	reviewId BINARY(16) NOT NULL,
	reviewProfileId BINARY(16) NOT NULL,
	reviewRecAreaId BINARY(16) NOT NULL,
	reviewContent VARCHAR(6000),
	reviewDateTime DATETIME(6) NOT NULL,
	reviewRating DECIMAL (5,1) NOT NULL,
	INDEX(reviewProfileId),
	FOREIGN KEY (reviewProfileId) REFERENCES profile(profileId),
	INDEX(reviewRecAreaId),
	FOREIGN KEY (reviewRecAreaId) REFERENCES recArea(recAreaId),
	PRIMARY KEY (reviewId)
);

CREATE TABLE activity (
	activityId BINARY(16) NOT NULL,
	activityName VARCHAR(60),
	PRIMARY KEY (activityId)
);

CREATE TABLE activityType (
	activityTypeActivityId BINARY(16) NOT NULL,
	activityTypeRecId BINARY(16) NOT NULL,
	INDEX (activityTypeActivityId),
	FOREIGN KEY (activityTypeActivityId) REFERENCES activity(activityId),
	INDEX (activityTypeRecId),
	FOREIGN KEY (activityTypeRecId) REFERENCES recArea(recAreaId)
);
