$(document).ready(function() {
  // Fetch dynamic content from the backend or local storage
  var dynamicTitle = "Welcome to our Website!";
  var dynamicDescription = "Explore our amazing products and services.";

  // Update the hero banner with dynamic content
  $("#dynamic-title").text(dynamicTitle);
  $("#dynamic-description").text(dynamicDescription);

  // Handle form submission for admin authentication
	$("#admin-login-form").submit(function(event) {
	  event.preventDefault();

	  // Serialize form data to send via AJAX
	  var formData = $(this).serialize();

	  // AJAX request to authenticate admin
	  $.ajax({
		type: "POST",
		url: "/task/admin_authenticate.php", // This is the URL of the PHP script that handles admin authentication
		data: formData,
		dataType: "json",
		success: function(response) {
		  if (response.status === "success") {
		    alert(response.message);
		    // Optionally, redirect to the admin dashboard upon successful authentication
		    window.location.href = "/task/admin_dashboard.html";
		  } else {
		    alert(response.message);
		  }
		},
		error: function(error) {
		  alert("An error occurred. Please try again.");
		}
	  });
	});
});

