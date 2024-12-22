<?php include 'config.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Portfolio Template">
    <meta name="author" content="Suvrat Jain">
    <title> Portfolio</title>
    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <link rel="stylesheet" href="css/style.css">
    <!-- Add jQuery and jQuery UI -->
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
  <body>
  <script src="js/script.js"></script>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
         
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#portfolio">Achievement</a></li>
            

            
          </ul> 
        </div><!--/.nav-collapse -->
      </div>
    </div>

<div class="container-fluid splash" id="splash">
  <div class="container">
    <img src="women.jpg" alt="Portrait of a Woman" class="profile-image"> 
    <h1>HELLO!</h1> 
    <h1 class="intro-text"><span class="lead" id="typed">I am Meenu Antony</span></h1>
    <span class="continue"><a href="#about"><i class="fa fa-angle-down"></i></a></span>
  </div>
</div>
        <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Me</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p class="content-text" style="text-align:justify;">Hey there! Driven by a passion for technology and a thirst for innovation, I’m an MCA student dedicated to integrating cutting-edge solutions to tackle real-world challenges. 
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="content-text">My journey in software development is fueled by a commitment to excellence and a curiosity to explore new horizons in tech.</p>
             </div>
                <div class="col-lg-8 col-lg-offset-2 text-center contact-button">
                   
                </div>
            </div>
        </div>
    </section>
<!-- Portfolio -->
    <div class="container-fluid portfolio-container-holder content-section" id="portfolio">
		<div class="portfolio-container container">
			<h1 class="text-center">My Achievement<button class="btn btn-success" style="float: right;">+</button></h1>
      <hr class="star-portfolio">
			<div class="row">
				<?php
                // Include the database configuration file
                include 'config.php'; // Ensure this path is correct

                // Fetch achievements
                $sql = "SELECT title, description, image FROM achievements"; // Updated table name
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result === false) {
                    // Output the error message
                    echo "Error: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4 col-sm-6 col-xs-12 portfolio-card-holder" style="margin-bottom: 20px; padding-right: 15px;">'; // Adjusted column class to display 3 cards per row
                            echo '    <div class="portfolio-card" style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; height: 550px; width: 250px; margin-bottom: 20px;">'; // Set fixed width of 250px with bottom margin
                            echo '        <h4 style="margin: 0; font-weight: bold; text-align: center; margin-bottom: 10px;">' . htmlspecialchars($row["title"]) . '</h4>'; // Title with margin-bottom for spacing
                            echo '        <p style="flex-grow: 1; margin: 5px 0 15px 0; text-align: justify;">' . htmlspecialchars($row["description"]) . '</p>'; // Adjusted description margins for spacing and text alignment
                            echo '        <img src="' . htmlspecialchars($row["image"]) . '" alt="Portfolio" class="img-responsive portfolio-img" style="max-width: 100%; height: 400px; border-radius: 5px;">'; // Responsive image with consistent border radius
                            echo '    </div>';
                            echo '</div>';
                        }
                        
                        
                        
                    } else {
                        echo "No achievements found.";
                    }
                }
                $conn->close();
                ?>
			</div>
		</div>
	</div>



<!-- Footer -->
	<footer>
		<div class="container footer-container">
			<div class="row footer-row">
				<div class="col-xs-12 text-center">
					
					<address>
						<p>© 2024 Meenu Antony. All rights reserved.</p>
						
					</address>
				</div>
			</div>
		</div>
	</footer>

    <!-- Bootstrap core JavaScript -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            // Initialize dialog
            $("#dialog-form").dialog({
                autoOpen: false,
                modal: true,
                buttons: {
                    "Save": function() {
                        // AJAX call to save data
                        $.post("save.php", {
                            title: $("#title").val(),
                            description: $("#description").val(),
                            image: $("#image").val()
                        }, function(data) {
                            // Handle response
                            alert(data);
                            $("#dialog-form").dialog("close");
                            location.reload(); // Reload to fetch new data
                        });
                    },
                    Cancel: function() {
                        $(this).dialog("close");
                    }
                }
            });

            // Open dialog on button click
            $(".btn-success").click(function() {
                $("#dialog-form").dialog("open");
            });
        });
    </script>

    <!-- Popup Form -->
    <div id="dialog-form" title="Add Achievement/Skill" style="display:none;">
        <form>
            <fieldset>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="text ui-widget-content ui-corner-all">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="text ui-widget-content ui-corner-all"></textarea>
                <label for="image">Image URL</label>
                <input type="text" name="image" id="image" class="text ui-widget-content ui-corner-all">
            </fieldset>
        </form>
    </div>

   
    ...
</body>
</html>
