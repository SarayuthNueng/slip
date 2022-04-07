<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบ Slip ออนไลน์</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo-sd.png"/>
    <!-- Bootstrap -->
    <link href="bootstrap_5/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap_5/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <img src="images/h.png" alt="" width="100%" height="100%">
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-9 mt-3 mt-lg-0">
                <div class="row center text-center justify-content-end">
                    <div class=" col-lg-4 col-6  border-right ">
                        <a type="button" class="table-bt fa-solid fa-square-phone ml-2" href="tel:043861140" role="button" style="color:#198754;"> 043-861-140</a>
                    </div>

                    <div class="col-lg-4  col-6 border-right_2">
                        <a type="button" class="table-bt fa-brands fa-facebook ml-2" href="https://www.facebook.com/Hospitalsomdet/" target="_blank"  style="color:steelblue;"> facebook</a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <nav class="mt-4 navbar navbar-expand-lg navbar-light" style="background-color: #C1E1C1;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index3.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit_pass.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('ยืนยันการออกจากระบบใช่หรือไม่')">ออกจากระบบ</a>
                    </li>
                </ul>
                <span class="navbar-text">
                ยินดีต้อนรับ คุณ &nbsp;<strong><?php echo $_SESSION['fname'] ?></strong>
                </span>
            </div>
        </div>
    </nav>