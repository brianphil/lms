<!DOCTYPE html>
<html>

<head>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #000;
            color: white;
            text-align: center;
            /* height: 50px; */
            overflow-y: visible;
            /* z-index: 0; */
        }

        .header {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            background-color: #000;
            color: white;
            text-align: center;
            overflow-y: hidden;
            /* z-index: 12887777889; */
        }



        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- system static page title -->
    <title>Loan Management System Portal</title>
    <!-- responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon here  -->
    <link rel="icon" type="image/x-icon" href="http://localhost/lms/assets/images/logo.png">
    <!-- <script src="http://localhost/lms/jsPDF/jspdf.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script> -->

</head>