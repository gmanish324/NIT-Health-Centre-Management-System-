<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Downloader</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

            
        }

        .container {
            max-width: 80%;
            padding: 34px;
            margin: auto;
        }

        .container h1 {
            text-align: center;
    border-radius: 10px 10px 0 0;
    margin: -10px -40px;
    padding: 15px;
    color: black;
    font-size: 80px;
        }

        p {
            text-align: center;
    border-radius: 10px 10px 0 0;
    margin: -10px -40px;
    padding: 15px;
    color: red;
    font-size: 25px;
    font-weight: bold;
        }

        input,
        textarea {

            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
            width: 50%;
            margin: 11px 0px;
            padding: 7px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btn {
            width: 250px;
            color: white;
            background: purple;
            padding: 8px 12px;
            font-size: 30px;
            border: 2px solid white;
            border-radius: 14px;
            cursor: pointer;
            margin-left: 550px;
        }

        .bg {
            width: 130%;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
        }

        .submitMsg {
            color: yellow;
            
        }
    </style>


</head>

<body>
    


    
    <div class="container">
        <h1>Welcome to Invoice Creater</h1>
            <p>Enter your details and submit this form </p>
         
            <form action="invoice_pdf.php" method="post">
                <input type="text" name="name" placeholder="Name of the Buyer"><br />
                <input type="text" name="product" placeholder="Product's name"><br />
                <input type="number" name="price" placeholder="Price"><br />
                <input type="number" name="quantity" placeholder="Quantity"><br />
                
 </div></br>

                <button class="btn">submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>