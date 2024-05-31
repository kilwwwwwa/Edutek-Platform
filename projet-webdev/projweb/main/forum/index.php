
<?php
include 'connect.php';
include 'header.php';

$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id";

$result = mysqli_query($conn,$sql);

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysqli_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		
		echo '<table border="1">
			  <tr>
				<th>Category</th>
				<th>Last topic</th>
			  </tr>';	
			
		while($row = mysqli_fetch_assoc($result))
		{				
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<h3><a href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
				echo '</td>';
				echo '<td class="rightpart">';
				
				
					$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . $row['cat_id'] . "
								ORDER BY
									topic_date
								DESC
								LIMIT
									1";
								
					$topicsresult = mysqli_query($conn,$topicsql);
				
					if(!$topicsresult)
					{
						echo 'Last topic could not be displayed.';
					}
					else
					{
						if(mysqli_num_rows($topicsresult) == 0)
						{
							echo 'no topics';
						}
						else
						{
							while($topicrow = mysqli_fetch_assoc($topicsresult))
							echo '<a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						}
					}
				echo '</td>';
			echo '</tr>';
		}
	}
}


?>
</table>
</div>
</div>
</div>
<?php require_once("mainfooter.php");?>
<style>
	html, body {
    height: 100%;
    margin: 0;
}
body {
    background-color: rgb(230, 255, 255);
	text-align: center;			
}
#wrapper {
	height: 65vh;
    display: flex;
    flex-direction: column;
	width: 900px;
	margin: 0 auto; 			
}
#content {
	flex: 1;
	background-color: #fff;
	border: 1px solid #000;
	float: left;
	font-family: Arial;
	padding: 20px 30px;
	text-align: left;
	width: 100%;				
}
#menu {
	float: left;
	border: 1px solid #000;
	border-radius: 30px;
	border-bottom: none;		
	clear: both;				
	width:100%;
	height:20px;
	padding: 5px 30px;
	background-color: #FFF;
	text-align: left;
	font-size: 85%;
}
#menu a:hover {
	background-color: #009FC1;
}
#userbar {
	background-color: #fff;
	float: right;
	width: 250px;
}

table {
	border-collapse: collapse;
	width: 100%;
}
table a {
	color: #000;
}
table a:hover {
	color:#373737;
	text-decoration: none;
}
th {
	background-color: #B40E1F;
	color: #F0F0F0;
}
td {
	padding: 5px;
}

h3 {margin: 0; padding: 0;}

.item {
	background-color: #00728B;
	border: 1px solid #032472;
	color: #FFFF;
	font-family: Arial;
	padding: 3px;
	text-decoration: none;
}
.leftpart {
	width: 70%;
}
.rightpart {
	width: 30%;
}
.small {
	font-size: 75%;
	color: #373737;
}
#footer {
	flex-shrink: 0;
	font-size: 65%;
	padding: 3px 0 0 0;
}
.topic-post {
	height: 100px;
	overflow: auto;
}
.post-content {
	padding: 30px;
}
textarea {
	width: 500px;
	height: 200px;
}
</style>
