<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIUANG v.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-dark mx-3">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="pemasukan">Pemasukan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="pengeluaran">Pengeluaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="admin">Administrator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <span class="badge bg-primary"><?= $_SESSION['nama']; ?></span>
                                </a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <span class="badge bg-primary"><?= date('D  d M  Y'); ?></span>
                        </form>
                        <a href="func/Login?logout=true">
                            <button class="btn btn-danger btn-sm ms-4" type="submit" name="btn_logout">
                                logout
                            </button>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>