 <!-- HOMEPAGE (DITO IINSERT ANG UI NA IEEDIT) -->

 <!-- Header-->
 <header class="bg-light py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"><?php echo $_settings->info('name') ?></h1>
            <p class="lead fw-normal text-white-50 mb-0">

            <!-- HOMEPAGE BUTTON -->
                <a class="btn btn-lg btn-primary" type="button" id="create_appointment" href="user/register.php">Book Now !</a>
            </p>
        </div>
    </div>
</header>
<!-- About Section (editable siya)-->
<?php
$sched_arr = array();
$max = 0;
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

    <?php include('about.html') ?>

    </div>
</section>

<div class="faqs">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <style>


.supp-header {
  position: relative;
  height: 24px;
  left: 200px;
  font-family: "Moon 2.0";
  font-style: normal;
  font-weight: 700;
  color: #226acc;
  line-height: 24px;
}

.supp-subhead {
  position: relative;
  /* margin-top: 120px; */
  left: 200px;
  color: #226acc;
  font-family: "Red Hat Display";
  font-size: 20px;
  width: 650px;
}

div + div {
  clear: both;
}

p {
  line-height: 1.4em;
  color: #1b1b1b;
}

.faq-title {
  color: #226acc;
  font-size: 2em;
  margin: 0.4em 0;
}

div.seperator {
  width: 7.5em;
  background-color: #226acc;
  height: 0.17em;
  margin-left: -1.8em;
}

.faq-list > div {
  border-bottom: 0.07em solid #226acc;
  padding: 1.5em 0em;
}

.faq-list > div:last-child {
  border: unset;
}

details > summary {
  list-style: none;
}
details > summary::-webkit-details-marker {
  display: none;
}

summary {
  font-size: 1.4em;
  font-weight: bold;
  cursor: pointer;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  transition: all 0.3s ease;
}

summary:hover {
  color: #226acc;
}

details[open] summary ~ * {
  animation: sweep 0.5s ease-in-out;
}

@keyframes sweep {
  0% {
    opacity: 0;
    margin-left: -10px;
  }
  100% {
    opacity: 1;
    margin-left: 55px;
  }
}

details[open] summary {
  color: #226acc;
}

details[open] p {
  border-left: 3px solid #226acc;
  margin-left: 55px;
  padding-left: 25px;
  opacity: 100;
  transition: all 3s ease;
}

details[open] summary:after {
  content: "-";
  font-size: 3.2em;
  margin: -33px 0.35em 0 0;
  font-weight: 200;
}

.faq-body {
  position: relative;
  left: 200px;
  width: 60em;
  /* margin: 4em auto; */
  border-radius: 0.5em;
  padding: 3em;
  /* background-color: #e5eafc; */
  margin-bottom: 125px;
}

.faq-list {
  width: 55em;
  margin: 1em auto;
  padding: 2em 0;
}

summary::-webkit-details-marker {
  display: none;
}

summary:after {
  background: transparent;
  border-radius: 0.3em;
  content: "+";
  color: #226acc;
  float: left;
  font-size: 1.8em;
  font-weight: bold;
  margin: -0.3em 0.65em 0 0;
  padding: 0;
  text-align: center;
  width: 25px;
}

   </style>


</head>

<body>
    <div>
    <hr>

        <!-- <h1 class="supp-header">SUPPORT</h1>
        <h5 class="supp-subhead">How can we help you?</h5> -->

        <div id="faq" class="faq-body">
            <div class="faq-header">
                <h3 class="faq-title">FAQ's</h3>
                <div class="seperator"></div>
            </div>
            <div class="faq-list">
                <div>
                    <details open>
                        <summary title="How to add an event?">How to add an event?</summary>
                        <p class="faq-content">Step 1: Go to the upcoming events page. <br>
                            Step 2: Click the “add” button on the upper right of the table.<br>
                            Step 3: Input the event’s details on the form.<br>
                            Step 4: Lastly, click “save” to add the event on the list.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="Can I delete a scheduled event?">Can I delete a scheduled event?</summary>
                        <p class="faq-content">Step 1: Go to the upcoming events page. <br>
                            Step 2: Click the “delete” button parallel to the event you wish to remove.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="How to edit a scheduled event?">How to edit a scheduled event?</summary>
                        <p class="faq-content">Step 1: Go to the scheduled events page. <br>
                            Step 2: Click the “edit” button that corresponds to the event details you're going to edit. <br>
                            Step 3: Edit the details on the form.<br>
                            Step 4: Lastly, click “save” to update the event.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="How to change passwords?">How to change passwords?</summary>
                        <p class="faq-content">Step 1: Go to the list of employee pages. <br>
                            Step 2: Click the “change password” button that corresponds to employee’s detail. <br>
                            Step 3: Change or set to default password. <br>
                            Step 4: Lastly, click “save” to update the event.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="How to Edit bookings?">How to Edit bookings?</summary>
                        <p class="faq-content">If someone have made a mistake in their bookings, you can follow this steps: <br>
                            1st Step: Go to the Bookings Page by clicking the word ‘Bookings’ in the sidebar on the left. <br>
                            2nd Step: on the Bookings Page, we can see two buttons on the right side of each tables, press the ‘Edit’ button of which table you want to edit. <br>
                            3rd Step: Edit the Name, Desk No., Date and/or Reason of the table you had selected. <br>
                            4th Step: Once you had rewrite the table, press the button ‘Edit’.<br>
                            That is how you Edit the Bookings.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="How to Delete an Entry in the Bookings?">How to Delete an Entry in the Bookings?</summary>
                        <p class="faq-content">To Delete an entry in the list follow this two easy steps: <br>
                            1st Step: Go to the Bookings Page by clicking the word ‘Bookings’ in the sidebar on the left. <br>
                            2nd Step: On the Bookings Page, we can see two buttons on the right side of each table, <br> press the ‘Delete’ button and that is how you Edit the Bookings.
                        </p>
                    </details>
                </div>
            </div>
        </div>

    </div>
    <!-- </div> -->

</body>

</html>
</div class="contact">

<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .center{
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 5%;
            align-items: center;
        }
        .style{
            display: flex;
            flex-direction: column;
            background-color: #FFFFFF;
            justify-content: center;
            width: 50%;
            padding: 3rem;
            border-radius: 2px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                        0 10px 10px rgba(0,0,0,0.22);
        

        }
    </style>
</head>
<hr>
<body>
    <div id="contact" class="faq-body">
            <div class="faq-header">
                <h3 class="faq-title">Contact Us</h3>
                <div class="seperator"></div>
            </div>
    <form action="https://formspree.io/f/xvonzjja" " method="POST">
        <div class="center">
        <div class="style">
            <div class="row">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="First Name" aria-label="First name" required>
                </div>
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="Lastname"  placeholder="Last Name" aria-label="Last name" required style="margin-bottom: 7px;">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                <input type="email" name="Email" class="form-control" id="exampleFormControlInput1" placeholder="me@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" name="Comments" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="FormSubmit" type="submit">Submit</button>
            </div>
        </div>      
        </div>
    </form>

    </div>
<hr>

</body>
</html>
</div>


<script>
    $(function(){
    //     $('#create_appointment').click(function(){
		// 	uni_modal("Booking Form","user/appointments/manage_appointment.php",'mid-large')
		// })
    })
</script>
