<!-- Menu ADD -->
<?php include('partials/menu.php'); ?>

<!-- Main Content section starts -->

<div class="main-content">
	<div class="wrapper">
		<h4>Manage Category</h4>
		 <br/>

		 <?php
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}

				if(isset($_SESSION['remove']))
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if(isset($_SESSION['no-category-found']))
				{
					echo $_SESSION['no-category-found'];
					unset($_SESSION['no-category-found']);
				}
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if(isset($_SESSION['failed-remove']))
				{
					echo $_SESSION['failed-remove'];
					unset($_SESSION['failed-remove']);
				}
		?>

		<br> 
        <!-- Button  To Add Admin-->
        <a href="<?php echo $SITEURl;?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br/><br/>

        <table class="tbl_full">
        	<tr>
        		<th>S.No</th>
        		<th>Title</th>
        		<th>Image_name</th>
				<th>Featured </th>
				<th>Active</th>
        		<th>Actions</th>
        	</tr>

        	<?php 

        	$sql = "SELECT * FROM tbl_category";

        	$res = mysqli_query($conn, $sql);

        	$count = mysqli_num_rows($res);

        	$sn= 1;

        	if($count > 0)
        		{
        			while($row = mysqli_fetch_assoc($res))
        			{
        				$id = $row['id'];
        				$title = $row['title'];
        				$image_name =$row['image_name'];
        				$featured = $row['featured'];
        				$active = $row['active'];

        				?>

        				<tr>
			        		<td><?php echo $sn++; ?> </td>
			        		<td><?php echo $title; ?></td>

			        		<td>
			        			<?php 

			        				if($image_name!="")
			        				{
			        					

			        					?>
			        					<img src="<?php echo $SITEURl; ?>images/category/<?php echo $image_name ?>" width="100px" >
			        					<?php

			        				}else
			        					{
			        						echo "<div class='error'> Image Not Added </div>";
			        					}

			        			 ?>
			        				
			        		</td>

			        		<td><?php echo $featured; ?></td>
			        		<td><?php echo $active; ?></td>
			        		<td> 
			        			<a href="<?php echo $SITEURl ; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Category </a>
			        			<a href="<?php echo $SITEURl ; ?>admin/delete-category.php?id=<?php echo $id ; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Category </a>

			        		</td>
			        	</tr>

        				<?php
        			}
        		}else
        			{
        				echo "<tr> <td colspan='7' class = 'error'> Category Not Added Yet. </td> </tr>";
        				echo '<script>alert("No Category  found & you can add category ")</script>';
        			}

        	?>
        	

        	
        </table>

	</div>
</div>

<!-- Main Content section End -->

<!-- Footer Add -->
<?php include('partials/footer.php'); ?>