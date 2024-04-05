<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.includes.header')
</head>

<body>
    <div class="sidebar">
        @include('client.includes.navbar')
    </div>

    <div class="container-content">
        @yield('content')
    </div>

    <footer>
        @include('client.includes.footer')
    </footer>
</body>

<style>
    body {
        text-align: center;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 15%;
        /* Adjust as needed */
        height: 100vh;
        /* Full height of the viewport */
        background-color: #dee2e6;
        /* Example background color */
        color: #fff;
        /* Example text color */
        border
        /* Add any other necessary styles for the sidebar */

    }

    body {}
/* 110vh */
.container-content {
    margin-top: 0%;
    margin-left: 15%; /* Adjust as needed */
    padding: 10px; /* Add padding to create space around the content */
    border-radius: 5px;
    background-color: #cdcdcd;
    min-height: calc(107.5vh - 56px); /* Set minimum height to 100% of viewport height minus the navbar height */
    overflow: hidden; /* Hide overflow content */
    display: flex; /* Use flexbox to align content vertically */
    align-items: center; /* Center content vertically */
    justify-content: center; /* Center content horizontally */
}

/* Adjust for smaller screens */
@media (max-width: 767.98px) {
    .container-content {
        min-height: calc(100vh - 3.5rem); /* Height of small navbar */
        padding-bottom: 10%; /* Adjust the value as needed */
    }
    .custom-height {
        padding-bottom: 10px; /* Adjust the value as needed */
    }
}
@media (max-width: 480px) {
    .container-content {
        min-height: calc(100vh - 3.5rem); /* Height of small navbar */
        padding-bottom: 10%; /* Adjust the value as needed */

    }
}





    .nav-item {
        margin: 2%;
        /* padding: 4%; */
        /* border: 1px solid gray; */
        border-radius: 5px;
        background-color: rgb(255, 255, 255);
        text-align: center;
        color: black;
        font-size: 15px;
        font-family: sans-serif;
    }

    .nav-item a {
        color: black;
    }

    .nav-item a:hover {
        color: white;
    }

    .nav-item-logout button {
        width: 97%;
        height: 60%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: white;
    }

    .nav-item-logout button:hover {
        border-radius: 5px;
        border: none;
        background-color: red;
    }

    .offcanvas-body {
        padding: 5%;
        /* margin:5%; */
    }

    #logout-btn {
        margin-top: 200%;
    }

    .container-button {
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 8%; /* Adjust as needed */
        margin-left: 11.5%; /* Adjust as needed */
    }
    .pagination-container {
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 42%; /* Adjust as needed */
        margin-left: 50%; /* Adjust as needed */

        text-align: center;
    }
    /* .container-Pendingbutton{
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 8%;
        margin-left: 16.5%;
    } */
    .secondary-container {
    display: flex;
    height: 90%;
    width: 99%;
    flex-direction: column;
    margin-top: 0px; /* Adjust margin-top as needed */
    padding: 10px; /* Adjust padding to make it smaller */
    /* background-color: #f8f9fa; Background color */
    /* min-height: calc(100vh - 56px); Set the same min-height as the content container */
    /* border-radius: 5px; Rounded corners */
    /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); Lighter box shadow for a subtle depth effect */
}

/* Style for the container's pending button */
.container-Pendingbutton {
    margin-bottom: 20px; /* Add margin-bottom to separate the button from the table */
}

/* Style for the table inside the container */
.secondary-container table {
    width: 100%; /* Make the table fill the container's width */
}
.searchDiv{
    margin-bottom: 10px;
    /* padding: 10; */
    position: absolute;
    right: 34%;
}
.row{
    padding-bottom: 1%;
}
.addButton{
    position: relative;
    right: 45%;
}
</style>

</html>
