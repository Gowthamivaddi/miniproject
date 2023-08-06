<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <h2>Welcome, Admin!</h2>

  <!-- Form to update hero banner content -->
  <form id="hero_banner_form">
    <label for="title">Hero Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $hero_banner["title"]; ?>"><br>

    <label for="description">Hero Description:</label>
    <textarea id="description" name="description"><?php echo $hero_banner["description"]; ?></textarea><br>

    <button type="submit">Update Hero Banner</button>
  </form>

  <!-- Form to update contact details -->
  <form id="contact_details_form">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $contact_details["email"]; ?>"><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $contact_details["phone"]; ?>"><br>

    <button type="submit">Update Contact Details</button>
  </form>

  <!-- Script to handle AJAX requests -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    // AJAX to handle hero banner update
    $("#hero_banner_form").submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: "POST",
        url: "/task/update_hero_banner.php",
        data: formData,
        dataType: "json",
        success: function(response) {
          alert(response.message);
        },
        error: function(error) {
          alert("An error occurred. Please try again.");
        }
      });
    });

    // AJAX to handle contact details update
    $("#contact_details_form").submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: "POST",
        url: "/task/update_contact_details.php",
        data: formData,
        dataType: "json",
        success: function(response) {
          alert(response.message);
        },
        error: function(error) {
          alert("An error occurred. Please try again.");
        }
      });
    });
  </script>
</body>
</html>

