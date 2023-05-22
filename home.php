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
  color: #1b1b1b;
  font-size: 2em;
  margin: 0.4em 0;
}

div.seperator {
  width: 7.5em;
  background-color: #1b1b1b;
  height: 0.17em;
  margin-left: -1.8em;
}

.faq-list > div {
  border-bottom: 0.07em solid #1b1b1b;
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


.groundColor{
  background-color:#ffff;
}

.faq-body {
  display: flex;
  flex-direction: row;
  width: 40% 60%;
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
  color: #1b1b1b;
  float: right;
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
<div class="groundColor">
    <hr>

        <!-- <h1 class="supp-header">SUPPORT</h1>
        <h5 class="supp-subhead">How can we help you?</h5> -->

        <div id="faq" class="faq-body">
            <div class="faq-header">
                <h3 class="faq-title">FAQ's</h3>
                <h5>Got a question? Fire away</h5>
                <h7>Developed By: @LVCC_BSIS-3 Group#1  (2022-2023)</h7>
                <br>
                <h7>Contact Number: 09XXXXXXXXX </h7>
                
            </div>
            <div class="faq-list">
                <div>
                    <details >
                        <summary title="How do I book a reservation?">How do I book a reservation?</summary>
                        <p class="faq-content">Step 1: Got to the home page. <br>
                            Step 2: Click Book Now and Register(If you Dont have an account).<br>
                            Step 3: Back to LogIn page and signin the newly registered account.<br>
                            Step 4: Go to List of Bookings.<br>Step 5: Click Create New for new set of bookings and save it.<br>Step 6: Wait for Approval of the Admin
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="How Far in Advance should I make a booking?">How Far in Advance should I make a booking?</summary>
                        <p class="faq-content">Step 1: Sign In your account
                           <br>
                           Step 2: Go to List of Bookings
                           <br>
                           Step 3: Click Create New for new set of bookings.<br>
                            Step 4: Lastly, click “save” to update the event.
                            <br>
                            Step 4: Click Save to update the event.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="Can I modify or cancel my booking after it has been made?">Can I modify or cancel my booking after it has been made?</summary>
                        <p class="faq-content">Step 1: Go to the List of Bookings. 
                          <br>
                          Step 2: Click the “Action” button if you want to delete to create new bookings.
                          <br>
                          Step 3: Lastly, click “save” to update the event.
                        </p>
                    </details>
                </div>
                <div>
                    <details>
                        <summary title="What is the cancellation policy?">What is the cancellation policy?</summary>
                        <p class="faq-content">Step 1: Contact the Admin of the DeskHub System.
                          <br>
                          Step 2: Tell them to cancel your bookings <br>
                          Step 3: Wait for cancel until your booking was removed.
                        </p>
                    </details>
                </div>
              
                <div>
                    <details>
                        <summary title="Can I delete scheduled desk booking?">Can I delete scheduled desk booking?</summary>
                        <p class="faq-content">To Delete an entry in the list follow this two easy steps: <br>
                        Step 1: Go to your Account
                        <br>
                        Step 2: Got to List Bookings <br> 
                        Step 3: Click Action Button
                        <br>
                        Step 4: Click Delete
                        <br>
                        Step 5: Last save the event.
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
            background-color: #FFE8C0;
            justify-content: center;
            width: 100%;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                        0 10px 10px rgba(0,0,0,0.22);
        }
        .contact-btn {
          background-image: linear-gradient(to right,  #FFDE59 27%, #FF914D 100%);
          border-width: 0px;
          padding: 10px;
          margin-left:-15px;
          width: 48rem;
          font-weight: bold;
          
        }
        .contact-btn:hover {
          background-image: linear-gradient(to right, #FF914D 27%, #FFDE59 100% );
          color: black;
        }
        .contact-us-title {
          color: black;
        }

        .seperator.contact-separator {
          background-color: #FDC474;
          width: 14rem;
        }

    </style>
</head>
<hr>
<body>
    <div id="contact" class="faq-body">
            <div class="faq-header">
            
                <h3 class="faq-title contact-us-title"></i>Contact Us</h3>
                <div class="seperator contact-separator"></div>
            </div>
    <form action="https://formspree.io/f/xvonzjja"  method="POST">
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
                <button class="btn btn-primary contact-btn" name="FormSubmit" type="submit">Submit</button>
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
