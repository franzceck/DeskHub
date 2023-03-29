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
<body>
    <form action="https://formspree.io/f/mjvdgqvd " method="POST">
        <div class="center">
        <div class="style">
            <div class="row">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="First name" aria-label="First name" required>
                </div>
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="Lastname"  placeholder="Last name" aria-label="Last name" required style="margin-bottom: 7px;">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="Email" class="form-control" id="exampleFormControlInput1" placeholder="email@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                <textarea class="form-control" name="Comments" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="FormSubmit" type="submit">Submit form</button>
            </div>
        </div>      
        </div>
    </form>
</body>
</html>