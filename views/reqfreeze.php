<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--css/icons/boostrap/jquery/fonts/images end-->
</head>

<body>
    <!-- usersidebar start -->
    <?php
    require_once 'sessionusercheck.php';
    include("partials/usersidebar.php") ?>

    <div class="profile">
        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-lock"></i>Freeze Membership</p>
        </div>

        <div class="reminders">
            <div class="reminder">
                <?php
                include_once "../Models/membershipsModel.php";
                include_once "../Models/ClientModel.php";
                include_once "../Models/PackageModel.php";

                $memberships = new Memberships();
                $clientId = $_SESSION["ID"];
                $membershipdetails = $memberships->getMembership($clientId);
                if ($membershipdetails->getIsActivated() == 'Activated') {
                  $pck = new Package();
                  $package = $pck->getPackage($membershipdetails->getPackageId());
                  ?>
                                  <script>
                                      var currentDate = new Date();
                                      var maxDate = new Date(currentDate);
                                      maxDate.setMonth(currentDate.getMonth() + 3);
                                  </script>
                                  <p class="membership class">Package:</p>
                                  <div class="class-title"><?php echo $package->getTitle(); ?></div>

                                  <div class="membership dates">
                                      <div class="date">
                                          <p>Start Date:</p>
                                          <div class="start-date"><?php echo $membershipdetails->getStartDate(); ?></div>
                                      </div>
                                      <div class="date">
                                          <p>End Date:</p>
                                          <div class="end-date"><?php echo $membershipdetails->getEndDate(); ?></div>
                                      </div>
                                  </div>

                                  <div class="rem-info">
                                      <p>Remaining Freeze Attempts:</p>
                                      <p class="actual-rem" id="actual-rem">
                                          <span id="remainingFreeze"><?php echo $membershipdetails->getFreezeCount() . " Attempts left from " ?></span>
                                          <span id="package-freezelimit"> <?php echo $package->getFreezeLimit(); ?></span>
                                      </p>
                                  </div>
                                  <div class="membershipStatus">
                                  <p>Membership Status:</p>
                                      </div>
                                  <?php if ($membershipdetails->getFreezed() == 1) { ?>
                    
                                                  <p id="membershipStatus"class="actual-rem">Frozen</p>
                                                            <button id="unfreeze-button" onclick='unfreezeMembership(<?php echo $membershipdetails->getID(); ?>)'>Unfreeze</button>
                                  <?php } else { ?>
                      
                                              <p id="membershipStatus" class="actual-rem"><?php echo $membershipdetails->getIsActivated(); ?></p>

                                              <div class="datePicking"  id="datePickerContainer">
                                                <label for="datepicker">Choose a Date:</label>
                                                <input type="date" id="datepicker"  min="<?= date('Y-m-d', strtotime('+1 week')); ?>" max="<?= date('Y-m-d', strtotime('+3 months')); ?>">
                                              </div>
                                              <button id="freeze-button" onclick='showModal()'>Freeze</button> 
                                              <div class="modal" id="freezeModal">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <span class="close-btn" onclick="hideModal()">&times;</span>
                                                          <div>
                                                           <label id="modal-label" >Are you sure you want to freeze your membership?</label>
                                                            </div>
                                                            <button  id="confirm-button"
                                                                                onclick='freezeMembership(<?php echo $membershipdetails->getID() ?>)'>Freeze</button>
                                                                </div>
                                                                    </div>
                                                                </div>                   
                                  <?php }
                } else { ?>
                    
                                    <p class="hello-fz">Subscribe to a membership in order to access this feature</p>
                  <?php } ?>
            </div>

            
        </div>
    </div>

    <script>
        
var freezebtn = document.getElementById("freeze-button");
var datePicker = document.getElementById("datepicker");
var freezeLimit =document.getElementById("package-freezelimit");

function showModal() {
  var selectedDate = document.getElementById("datepicker").value;
  var modalLabel = document.getElementById("modal-label");

  if (selectedDate) {
    modalLabel.textContent =
      "Are you sure you want to freeze your membership to " +
      selectedDate +
      "?";

  } else {
    return;
  }
  $("#freezeModal").fadeIn();

}
function hideModal()
{
    $("#freezeModal").fadeOut();

}
function freezeMembership(membershipID) {
  var selectedDate = $("#datepicker").val();
  console.log(selectedDate);

  console.log("Selected Date:", selectedDate);

  $.ajax({
    type: "POST",
    url: "../Controllers/MembershipsController.php",
    data: {
      action: "freezeClientMembership",
      membershipID: membershipID,
      selectedDate: selectedDate,
    },
    success: function (responseData) {
      var response = JSON.parse(responseData);
      $(".end-date").text(response.EndDate);
      var remainingFreezeText = response.FreezeCount + " Attempts left from " + freezeLimit.textContent;
      $("#remainingFreeze").text(remainingFreezeText);
      $("#membershipStatus").text("Frozen");
      var unfreezeButton =
        '<button id="unfreeze-button" onclick="unfreezeMembership(' +
        membershipID +
        ')">Unfreeze</button>';
      $("#datePickerContainer").fadeOut();
      $("#freeze-button").replaceWith(unfreezeButton);

    },
    error: function (xhr, status, error) {
      console.error("AJAX error: " + status + " - " + error);
    },
  });

  hideModal();
}

function unfreezeMembership(membershipID) {
  console.log(membershipID);
  $.ajax({
    type: "POST",
    url: "../Controllers/MembershipsController.php",
    data: {
      action: "unfreezeClientMembership",
      membershipID: membershipID,
    },
    success: function (responseData) {
            console.log("Response from server:", responseData);

            try {
                var response = JSON.parse(responseData);
                $(".end-date").text(response.EndDate);
                $("#membershipStatus").text("Activated");
                $("#datePickerContainer").show();
                $("#remainingFreeze").text(response.FreezeCount + " Attempts left from " + freezeLimit.textContent);
                var freezeButton = '<button id="freeze-button" class="" onclick="showModal()">Freeze</button>';
                var confirmButton = ' <button  id="confirm-button"onclick"freezeMembership('+membershipID+')">Freeze</button>'
                $("#unfreeze-button").replaceWith(freezeButton);
            } catch (error) {
                console.error("Error parsing JSON response: " + error);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error: " + status + " - " + error);
        },
  });
}

    </script>

    <?php include("partials/footer.php") ?>
</body>

</html>