<?php
	include("connect.php");
	$db = @new mysqli('localhost', "$user", "$password", "$database");
	mysqli_set_charset ( $db , "utf8" );
	$limit = 3;
	if($db->connect_errno > 0)
	{
		echo 'Not connected to the database [' . $db->connect_errno . ']';
		echo "</div></div>";
		include("include_footer.php");
		echo "<div class=\"clearfix\"></div></div>";
		include("include_footer_out.php");
		echo "</body></html>";
		exit(1);
	}
?>
<div class="col2">
    <div class="widget">
		<div class="title">News updates</div>
		<p><a href="circulars/revised_price_list_2021.pdf" target="_blank"><img style="width: 50%;" src="images/revised_price_list_2017.png" /></a></p>
		<p>
			<span class="news"><a href="circulars/revised_price_list_2021.pdf" target="_blank">Revised price list of books</a></span><br /><br />
		</p>
		<p>
			<span class="news"><a href="circulars/intro.php">ಶ್ರೀ ಸಚ್ಚಿದಾನಂದ ಅಧ್ಯಾತ್ಮವಿದ್ಯಾಲಯ - ಪರಿಚಯ ಪತ್ರ ಮತ್ತು ಪಾಠಕ್ರಮ</a></span>
		</p><br />
	</div>
	<p style="text-align: right; font-size: 16px" class="news"><a class="title" href="images/Jayanthi.pdf">ವೇದಾಂತ ಸಪ್ತಾಹ ಆಹ್ವಾನ ಪತ್ರಿಕೆ</a></p>
	<br />
    <div class="widget">
		<div class="title">Adhyatmaprakasha Blog</div>
		<p>
			<span class="news"><a href="http://adhyatmaprakashakaryalaya.blogspot.in/">This blog is about activity performed in APK</a></span>
		</p>	
	</div>
	<br />
    <div class="widget">
		<div class="title">Program List of April 2016</div>
		<p>
			<span class="news"><a href="images/2016_04.pdf" target="_blank">Download PDF</a></span>
		</p>
	</div><br /><br />
	<div class="widget">
		<div class="title">Keep in touch</div>
		<p>
			For all the latest and regular communication and updates:<br /><br />
		</p>	
			<p><img style="width: 20%;" src="images/whatsapp.png" alt="whatsapp_image" /></p>
			<p>Please send a WhatsApp message "Shri Gurubhyo Namaha" to +91-8073081405 and add the phone number as Adhyatma Prakasha Karyalaya to get messages on adhyatma in Kannada.<br /><br /></p> 
			<p><a href="http://www.youtube.com/c/apkbooks" target="_blank"><img style="width: 20%;" src="images/youtube.png" /></a></p>
			<p>Videos and talks of scholars from Karyalaya will be available at: <span class="lang"><a href="http://www.youtube.com/c/apkbooks" target="_blank">Youtube</a></span><br /><br /></p> 
			<p><a href="http://www.facebook.com/groups/AdhyatmaPrakasha/" target="_blank"><img style="width: 20%;" src="images/facebook.png" /></a></p>
			<p>Group interaction of like minded people is at <span class="lang"><a href="http://www.facebook.com/groups/AdhyatmaPrakasha/" target="_blank">Facebook</a></span></p>
		<p>Please subscribe to the same</p>
		<p><a href="https://twitter.com/AKaryalaya/" target="_blank"><img src="images/twitter.png" alt="twitter image" width="43px" height="43px"/></a></p>
			<p>Please follow twitter handle of Adhyatma Prakasha Karyalaya <span class="lang"><a href=" https://twitter.com/AKaryalaya/" target="_blank">Twitter</a></span></p>
	</div>
	<div class="rule"></div>
	<div class="widget">
        <div class="title">Top viewed books</div>
        <p>
            <span class="lang"><a href="english_books.php">English</a></span><br />
            <?php
				$query = "select * from topviewed where language = 'english' order by hits desc limit $limit";
				$result = $db->query($query); 
				$num_rows = $result ? $result->num_rows : 0;
				if($num_rows > 0)
				{
					for($i=1;$i<=$num_rows;$i++)
					{
						$row = $result->fetch_assoc();
						$query1 = "select * from english_books_list where book_id = ".$row["bookid"]."";
						$result1 = $db->query($query1);
						$row1 = $result1->fetch_assoc();
						echo "<span class=\"news\"><a href=\"".$row1["type"]."/".$row1["type"]."_books_toc.php?book_id=".$row1["book_id"]."&amp;type=".$row1["type"]."&amp;book_title=" . urlencode($row1["title"]) . "\">".$row1["title"]."</a></span><br />";
					}
				}
				
            ?>
            <br /><span class="lang"><a href="kannada_books.php">ಕನ್ನಡ</a></span><br />
            <?php 
				$query = "select * from topviewed where language = 'kannada' order by hits desc limit $limit";
				$result = $db->query($query); 
				$num_rows = $result ? $result->num_rows : 0;
				if($num_rows > 0)
				{
					for($i=1;$i<=$num_rows;$i++)
					{
						$row = $result->fetch_assoc();
						$query1 = "select * from kannada_books_list where book_id = ".$row["bookid"]."";
						$result1 = $db->query($query1);
						$row1 = $result1->fetch_assoc();
						echo "<span class=\"news\"><a href=\"".$row1["type"]."/".$row1["type"]."_books_toc.php?book_id=".$row1["book_id"]."&amp;type=".$row1["type"]."&amp;book_title=" . urlencode($row1["title"]) . "\">".$row1["title"]."</a></span><br />";
					}
				}
			?>
            <br /><span class="lang"><a href="sanskrit_books.php">संस्कृतम् </a></span><br />
            <?php 
				$query = "select * from topviewed where language = 'sanskrit' order by hits desc limit $limit";
				$result = $db->query($query); 
				$num_rows = $result ? $result->num_rows : 0;
				if($num_rows > 0)
				{
					for($i=1;$i<=$num_rows;$i++)
					{
						$row = $result->fetch_assoc();
						$query1 = "select * from sanskrit_books_list where book_id = ".$row["bookid"]."";
						$result1 = $db->query($query1);
						$row1 = $result1->fetch_assoc();
						echo "<span class=\"news\"><a href=\"".$row1["type"]."/".$row1["type"]."_books_toc.php?book_id=".$row1["book_id"]."&amp;type=".$row1["type"]."&amp;book_title=" . urlencode($row1["title"]) . "\">".$row1["title"]."</a></span><br />";
					}
				}
			?>
        </p>
    </div>
       <div class="visitors">
		<table class="visit">
			<th>Visitors</th>
			<tr>
				<td><?php include("count.php");?></td>
			</tr>
		</table>
	</div>
</div>
