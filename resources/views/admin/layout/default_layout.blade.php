<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.header')
</head>

<body>
    <div class="sidebar">
        @include('admin.includes.navbar')
    </div>

    <div class="container-content">
        @yield('content')
    </div>

    <footer>
        @include('admin.includes.footer')
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

    .container-content {
        margin-top: 3.65%;
        margin-left: 15%;
        padding: 50px;
        border-radius: 5px;
        background-color: #cdcdcd;
        height: 680px;
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
        padding: 0px 0px 5px 0px;
        display: flex;
        align-items: center;
        /* Align items vertically */
    }
</style>

</html>
