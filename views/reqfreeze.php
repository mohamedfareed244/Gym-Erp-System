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


    <style>
      
#unfreeze-button{
  background-color: transparent;
  padding: 8px;
  border: 1px solid rgb(51, 51, 51);
  cursor: pointer;
  transition: 0.4s ease;
}

#unfreeze-button:hover {
  background-color: rgb(51, 51, 51);
  color: white;
}
      </style>
    <!--css/icons/boostrap/jquery/fonts/images end-->
</head>

<body>
    <!-- usersidebar start -->
    <?php session_start();
    include("partials/usersidebar.php") ?>

<div class="profile">
        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-lock"></i>Freeze Membership</p>
        </div>

        <div class="reminders">
            <?php
            include_once "../Models/membershipsModel.php";
            include_once "../Models/ClientModel.php";
            include_once "../Models/PackageModel.php";

            $memberships = new Memberships();
            $membership = Memberships::getClientMembershipInfo();
            $clientId = $_SESSION["ID"];

            if (!empty($membership)) :
                foreach ($membership as $membershipp) :
                    $membershipdetails = $memberships->getMembership($clientId);
                    $pck = new Package();
                    $package = $pck->getPackage($membershipdetails->packageId);
                    ?>
                    <script>
                        var currentDate = new Date();
                        var maxDate = new Date(currentDate);
                        maxDate.setMonth(currentDate.getMonth() + 3);
                    </script>
                    <div class="reminder">
                        <p class="membership class">Package:</p>
                        <div class="class-title"><?php echo $package->getTitle(); ?></div>

                        <div class="membership dates">
                            <div class="date">
                                <p>Start Date:</p>
                                <div class="start-date"><?php echo $membershipdetails->startDate; ?></div>
                            </div>
                            <div class="date">
                                <p>End Date:</p>
                                <div class="end-date"><?php echo $membershipdetails->endDate; ?></div>
                            </div>
                        </div>

                        <div class="rem-info">
                            <p>Remaining Freeze Attempts:</p>
                            <p class="actual-rem" id="actual-rem">
                                <?php echo $membershipdetails->freezeCount . " Days left from " . $package->getFreezeLimit(); ?>
                            </p>
                        </div>
                        <div class="rem-info">
                            <p>Membership Freeze Status:</p>
                            <p class="actual-rem" id="freeze-stat"><?php echo ($membershipdetails->freezed == 0) ? 'Not Freezed' : 'Freezed'; ?></p>
                        </div>

                        <div class="rem-info">
                            <p>Membership Status:</p>
                            <p class="actual-rem"><?php echo $membershipdetails->isActivated; ?></p>
                        </div>
                        <?php if ($membershipdetails->freezed == 1) { ?>
                            <button id="unfreeze-button" onclick='unfreezeMembership(<?php echo $membershipdetails->ID; ?>)'>Unfreeze</button>
                        <?php } else { ?>
                            <div class="datePicking">
                                <label for="datepicker">Choose a Date:</label>
                                <input type="date" id="datepicker" min="<?= date('Y-m-d', strtotime('+1 week')); ?>" max="<?= date('Y-m-d', strtotime('+3 months')); ?>">
                            </div>
                            <button id="freeze-button" onclick='showModal()'>Freeze</button>
                            <div class="modal" id="freezeModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="hideModal()">&times;</span>
                                        <div>
                                            <label id="modal-label">Are you sure you want to freeze your membership?</label>
                                        </div>
                                        <button id="confirm-button" onclick='freezeMembership(<?php echo $membershipdetails->ID ?>)'>Freeze</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-package" style="height:1000px; margin-left:200px;">
                    <p class="nopackage" style="font-size:24px;">You aren't subscribed to any package still.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        
var freezebtn = document.getElementById("freeze-button");
var datePicker = document.getElementById("datepicker");

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
    success: function (response) {
      console.log(response);

      $("#freeze-stat").text("Freezed");

      var unfreezeButton =
        '<button id="unfreeze-button" onclick="unfreezeMembership(' +
        membershipID +
        ')">Unfreeze</button>';
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
    success: function (response) {
      console.log(response);

      $(".status").text("Active");

      var freezeButton =
        '<button id="freeze-button" class="" onclick="showModal()">Freeze</button>';
      $("#unfreeze-button").replaceWith(freezeButton);
      $("#freeze-stat").text("Not Freezed");

      
    },
    error: function (xhr, status, error) {
      console.error("AJAX error: " + status + " - " + error);
    },
  });
}



    </script>

    <script src="../public/js/slider.js"></script>

    <?php include("partials/footer.php") ?>
</body>

</html>
