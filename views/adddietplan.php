<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/classes.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/adddietplan.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <!-- usersidebar start -->
    <?php include("../partials/usersidebar.php") ?>

    <div class="container py-5">
        <h2 style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Plans:</h2>
        <div class="card-container">

            <div class="card">
                <h3>Intermittent Fasting</h3>
            </div>

            <div class="card">
                <h3>Keto (Ketogenic) Diet</h3>
            </div>

            <div class="card">
                <h3>Paleo Diet</h3>
            </div>

            <div class="card">
                <h3>Vegan Diet</h3>
            </div>

            <div class="card">
                <h3>Low-Carb Diet</h3>
            </div>

        </div>

        <section class="dietplan-details" id="diet-details">
            <div class="dietplan-item">
                <div class="dietplan-info">
                    <h2 class="dietplan-descr"><strong>Desciption:</strong> </h2>
                    <p>Intermittent fasting is not so much a
                        specific diet as it is an eating pattern.
                        It involves alternating periods of fasting (not eating) with periods of eating. </p>
                    <div class="dietplan-methods">
                        <h2><strong>Methods:</strong></h2>
                        <ol>
                            <li>
                                <h4>16/8 Method:</h4>
                                <p>Fast for 16 hours, including overnight.
                                    Consume all daily calories within an 8-hour window.
                                    Example: Eating from 12 PM to 8 PM and fasting from 8 PM to 12 PM.
                                </p>
                            </li>
                            <li>
                                <h4>5:2 Method:</h4>
                                <p>Eat regularly for five days.
                                    Restrict calorie intake (around 500-600 calories) on two non-consecutive days.
                                    Example: Eating normally on Monday, Wednesday, Friday, and Sunday, while consuming
                                    fewer calories on Tuesday and Thursday.
                                </p>
                            </li>
                            <li>
                                <h4>Eat-Stop-Eat Method:</h4>
                                <p>Fast for a full 24 hours once or twice a week.
                                    Example: Fast from dinner one day to dinner the next day.
                                </p>
                            </li>
                        </ol>
                    </div>

                    <div class="dietplan-benefits">
                        <h2><strong>Benefits:</strong></h2>
                        <ul>
                            <li>
                                <p>Weight Loss: IF may help reduce calorie intake and promote weight loss.</p>
                            </li>
                            <li>
                                <p>Insulin Sensitivity: Improved insulin sensitivity can lower the risk of type 2
                                    diabetes.</p>
                            </li>
                        </ul>
                    </div>

                    <div class="day1-example">
                        <h2><strong>Day 1 Example:</strong></h2>
                        <h4>Breakfast:</h4>
                        <ul>
                            <li>
                                <p>Oatmeal topped with nuts and berries</p>
                            </li>
                        </ul>
                        <h4>Lunch:</h4>
                        <ul>
                            <li>
                                <p>Whole grain pasta salad with tuna</p>
                            </li>
                        </ul>
                        <h4>Advice:</h4>
                        <ul>
                            <li>
                                <p>Start with protein</p>
                            </li>
                        </ul>

                    </div>
                    <div class="dietplan-price">
                        <h2>Price:</h2>
                        <ul>
                            <li>
                                <p>500 L.E</p>
                            </li>
                        </ul>

                    </div>
                    <button class="reserve-class">Reserve Now</button>

                </div>
            </div>
        </section>



    </div>

</body>

<script src="../public/js/dietplan.js"></script>


</body>
<?php include("../partials/footer.php") ?>


</html>