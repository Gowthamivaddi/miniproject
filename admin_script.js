$("#hero-banner-form").submit(function(event) {
  event.preventDefault();
  // Serialize form data to send via AJAX
  var formData = $(this).serialize();

  // AJAX request to update the hero banner
  $.ajax({
    type: "POST",
    url: "/naveen/update_hero_banner.php",
    data: formData,
    dataType: "json",
    success: function(response) {
      // Display the response message
      $("#response-message").text(response.message);
    },
    error: function(error) {
      $("#response-message").text("An error occurred. Please try again.");
    }
  });
});

$("#contact-details-form").submit(function(event) {
  event.preventDefault();
  var formData = $(this).serialize();

  // AJAX request to update the contact details
  $.ajax({
    type: "POST",
    url: "/task/update_contact_details.php",
    data: formData,
    dataType: "json",
    success: function(response) {
      // Display the response message
      $("#response-message").text(response.message);
      // Optionally, update the dynamic content on the page after a successful update
      $("#address").val(response.newAddress);
      $("#email").val(response.newEmail);
    },
    error: function(error) {
      $("#response-message").text("An error occurred. Please try again.");
    }
  });
});

