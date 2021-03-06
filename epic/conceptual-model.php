<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Conceptual Model</title>
      <link rel="stylesheet" href="./style.css">
   </head>
   <body>
      <h3>Entities & Attributes</h3>
      <div>
         <ul>RecArea
            <li>recAreaId (Primary Key)</li>
            <li>recAreaDescription</li>
            <li>recAreaDirections</li>
				<li>recAreaImageUrl</li>
            <li>recAreaLat</li>
            <li>recAreaLong</li>
				<li>recAreaMap</li>
            <li>recAreaName</li>
         </ul>
         <ul>Profile
            <li>profileId (Primary Key)</li>
            <li>profileActivationToken</li>
				<li>profileAtHandle</li>
				<li>profileEmail</li>
            <li>profileHash</li>
            <li>profileImageUrl</li>
         </ul>
         <ul>Review
            <li>reviewId (Primary Key)</li>
				<li>reviewProfileId (Foreign Key)</li>
				<li>reviewRecAreaId (Foreign Key)</li>
            <li>reviewContent</li><!--make this nullable-->
            <li>reviewDateTime</li>
            <li>reviewRating</li>
         </ul>
         <ul>Activity<!--innummerator-->
            <li>activityId (Primary Key)</li>
            <li>activityName</li>
         </ul>
         <ul>ActivityType (weak entity)<!--bridge-->
				<li>activityTypeActivityId (Foreign Key)</li>
				<li>activityTypeRecId (Foreign Key)</li>
         </ul>
      </div>
      <div>
         <ul>Relationships
				<li>Many rec areas can have many reviews (m-to-n)</li>
				<li>Many rec areas can have many activity types (m-to-n)</li>
				<li>Many profiles can write many reviews (m-to-n)</li>
				<li>Many activities can have many activity types (m-to-n)</li>
			</ul>
      </div>
		<h3>ERD</h3>
		<div>
			<a href="https://bootcamp-coders.cnm.edu/~ecorsi/nm-outdoors/epic/images/erd-nmoutdoors.svg" target="_blank"><img class="img" src="./images/erd-nmoutdoors.svg" alt="image of ERD" width="800px" /></a>
		</div>
      <div class="fixed-footer">
         <div class="container"><a href="./index.html">Home</a></div>
      </div>
   </body>
</html>