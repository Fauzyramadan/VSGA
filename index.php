<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM packages");
$packages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariwisata</title>
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media(max-width:1520px) {
            .left-svg {
                display: none;
            }
        }

        /* small css for the mobile nav close */
        #nav-mobile-btn.close span:first-child {
            transform: rotate(45deg);
            top: 4px;
            position: relative;
            background: #a0aec0;
        }

        #nav-mobile-btn.close span:nth-child(2) {
            transform: rotate(-45deg);
            margin-top: 0px;
            background: #a0aec0;
        }
    </style>
</head>

<body class="overflow-x-hidden antialiased">
    <!-- Header Section -->
    <header class="relative z-50 w-full h-24">
        <div
            class="container flex items-center justify-center h-full max-w-6xl px-8 mx-auto sm:justify-between xl:px-0">

            <a href="" class="relative flex items-center h-full font-black leading-none">
                <img src="asset/logo.svg" class="h-6" alt="logo">
                <span class="ml-3 text-xl text-gray-800">Majawisata<span class="text-pink-500">.</span></span>
            </a>

            <nav id="nav" class="absolute top-0 left-0 z-50 flex-col items-center justify-between hidden w-full h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
                <a href="#" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Beranda</a>
                <a href="paket.php" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Order Paket</a>
                <a href="editpaket.php" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Perbarui Paket</a>
                <div class="flex flex-col w-full font-medium border-t border-gray-200 md:hidden">
                    <a href="login.php" class="w-full py-2 font-bold text-center text-pink-500">Masuk</a>
                    <a href="register.php"
                        class="relative inline w-full px-5 py-3 text-sm leading-none text-center text-white bg-indigo-700 fold-bold">Daftar</a>
                </div>
            </nav>

            <div
                class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                <a href="login.php"
                    class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-white sm:mr-3 md:mt-0">Masuk</a>
                <a href="register.php"
                    class="relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition duration-300 bg-indigo-700 rounded shadow-md fold-bold lg:bg-white lg:text-indigo-700 sm:w-full lg:shadow-none hover:shadow-xl">Daftar</a>
                <svg class="absolute top-0 left-0 hidden w-screen max-w-3xl -mt-64 -ml-12 lg:block"
                    viewBox="0 0 818 815" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="c">
                            <stop stop-color="#E614F2" offset="0%" />
                            <stop stop-color="#FC3832" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="f">
                            <stop stop-color="#657DE9" offset="0%" />
                            <stop stop-color="#1C0FD7" offset="100%" />
                        </linearGradient>
                        <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox"
                            id="a">
                            <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                            <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1" />
                        </filter>
                        <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox"
                            id="d">
                            <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                            <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter1" />
                        </filter>
                        <path
                            d="M160.52 108.243h497.445c17.83 0 24.296 1.856 30.814 5.342 6.519 3.486 11.635 8.602 15.12 15.12 3.487 6.52 5.344 12.985 5.344 30.815v497.445c0 17.83-1.857 24.296-5.343 30.814-3.486 6.519-8.602 11.635-15.12 15.12-6.52 3.487-12.985 5.344-30.815 5.344H160.52c-17.83 0-24.296-1.857-30.814-5.343-6.519-3.486-11.635-8.602-15.12-15.12-3.487-6.52-5.343-12.985-5.343-30.815V159.52c0-17.83 1.856-24.296 5.342-30.814 3.486-6.519 8.602-11.635 15.12-15.12 6.52-3.487 12.985-5.343 30.815-5.343z"
                            id="b" />
                        <path
                            d="M159.107 107.829H656.55c17.83 0 24.296 1.856 30.815 5.342 6.518 3.487 11.634 8.602 15.12 15.12 3.486 6.52 5.343 12.985 5.343 30.816V656.55c0 17.83-1.857 24.296-5.343 30.815-3.486 6.518-8.602 11.634-15.12 15.12-6.519 3.486-12.985 5.343-30.815 5.343H159.107c-17.83 0-24.297-1.857-30.815-5.343-6.519-3.486-11.634-8.602-15.12-15.12-3.487-6.519-5.343-12.985-5.343-30.815V159.107c0-17.83 1.856-24.297 5.342-30.815 3.487-6.519 8.602-11.634 15.12-15.12 6.52-3.487 12.985-5.343 30.816-5.343z"
                            id="e" />
                    </defs>
                    <g fill="none" fill-rule="evenodd" opacity=".9">
                        <g transform="rotate(65 416.452 409.167)">
                            <use fill="#000" filter="url(#a)" xlink:href="#b" />
                            <use fill="url(#c)" xlink:href="#b" />
                        </g>
                        <g transform="rotate(29 421.929 414.496)">
                            <use fill="#000" filter="url(#d)" xlink:href="#e" />
                            <use fill="url(#f)" xlink:href="#e" />
                        </g>
                    </g>
                </svg>
            </div>

            <div id="nav-mobile-btn"
                class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
                <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
                <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
            </div>

        </div>
    </header>
    <!-- End Header Section-->

    <!-- BEGIN HERO SECTION -->
    <div class="relative items-center justify-center w-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
        <div
            class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
            <div
                class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
                <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">Selamat Datang di Majawisata</h1>
                <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">Portal Wisata di Kabupaten Majalengka. Paket wisata paling <span class="font-bold italic"> Worth It </span> ada disini. Daftar Sekarang Juga ! </p>

                <!-- Integrates with section -->
                <div class="flex-col hidden mt-12 sm:flex lg:mt-24">
                    <p class="mb-4 text-sm font-medium tracking-widest text-gray-500 uppercase">Tentang Developer</p>
                    <div class="flex">

                        <a href='https://wa.me/089647333794'>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="whatsapp" class="h-8 mx-2 cursor-pointer">
                                <path d="M8.002 0h-.004C3.587 0 0 3.588 0 8a7.94 7.94 0 0 0 1.523 4.689l-.997 2.972 3.075-.983A7.93 7.93 0 0 0 8.002 16C12.413 16 16 12.411 16 8s-3.587-8-7.998-8zm4.655 11.297c-.193.545-.959.997-1.57 1.129-.418.089-.964.16-2.802-.602-2.351-.974-3.865-3.363-3.983-3.518-.113-.155-.95-1.265-.95-2.413s.583-1.707.818-1.947c.193-.197.512-.287.818-.287.099 0 .188.005.268.009.235.01.353.024.508.395.193.465.663 1.613.719 1.731.057.118.114.278.034.433-.075.16-.141.231-.259.367-.118.136-.23.24-.348.386-.108.127-.23.263-.094.498.136.23.606.997 1.298 1.613.893.795 1.617 1.049 1.876 1.157.193.08.423.061.564-.089.179-.193.4-.513.625-.828.16-.226.362-.254.574-.174.216.075 1.359.64 1.594.757.235.118.39.174.447.273.056.099.056.564-.137 1.11z"></path>
                            </svg> </a>
                        <a href="https://www.instagram.com/_fauzyrmdhn/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="instagram" class="h-8 mx-2 cursor-pointer">
                                <path d="M11 0H5a5 5 0 0 0-5 5v6a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm3.5 11c0 1.93-1.57 3.5-3.5 3.5H5c-1.93 0-3.5-1.57-3.5-3.5V5c0-1.93 1.57-3.5 3.5-3.5h6c1.93 0 3.5 1.57 3.5 3.5v6z"></path>
                                <path d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 6.5A2.503 2.503 0 0 1 5.5 8c0-1.379 1.122-2.5 2.5-2.5s2.5 1.121 2.5 2.5c0 1.378-1.122 2.5-2.5 2.5z"></path>
                                <circle cx="12.3" cy="3.7" r=".533"></circle>
                            </svg></a>
                        <a href="https://github.com/Fauzyramadan">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 28 27.311" viewBox="0 0 28 27.311" id="github" class="h-8 mx-2 cursor-pointer">
                                <path d="M28,14c0-7.732-6.268-14-14-14S0,6.268,0,14c0,6.221,4.061,11.488,9.674,13.311c0.767-0.235,0.803-0.702,0.803-0.702s0-1.383,0-2.661c-0.843,0.155-1.89,0.157-2.271,0.157c-0.464,0-2.009-0.386-2.689-2.132c-0.68-1.746-1.947-1.916-1.947-2.225s0.278-0.371,0.278-0.371s0.17,0,0.927,0c0.757,0,1.514,1.267,2.04,2.04s1.792,0.927,2.411,0.927c0.347,0,0.885-0.175,1.294-0.329c0.167-1.082,0.792-1.896,0.792-1.896c-6.243-0.556-6.397-5.223-6.397-7.046c0-1.823,1.484-3.616,1.484-3.616s-0.719-2.04,0.185-3.709c1.947,0.015,3.894,1.483,3.894,1.483S12.238,6.676,14,6.676s3.523,0.556,3.523,0.556s1.947-1.468,3.894-1.483c0.904,1.669,0.185,3.709,0.185,3.709s1.484,1.792,1.484,3.616c0,1.823-0.155,6.49-6.397,7.046c0,0,0.834,1.082,0.834,2.411s0,4.08,0,4.08s0.035,0.466,0.803,0.702C23.939,25.488,28,20.221,28,14z"></path>
                            </svg></a>

                    </div>
                </div>
                <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg" viewBox="0 0 423 423"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
                            <stop stop-color="#5C54DB" offset="0%" />
                            <stop stop-color="#6A82E7" offset="100%" />
                        </linearGradient>
                        <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox"
                            id="filter-3">
                            <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                            <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1" />
                        </filter>
                        <rect id="path-2" x="63" y="504" width="300" height="300" rx="40" />
                    </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
                        <g id="Desktop-HD" transform="translate(-39 -531)">
                            <g id="Hero" transform="translate(43 83)">
                                <g id="Rectangle-6" transform="rotate(45 213 654)">
                                    <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2" />
                                    <use fill="url(#linearGradient-1)" xlink:href="#path-2" />
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
                <div class="container relative left-0 w-full max-w-4xl lg:absolute xl:max-w-6xl lg:w-screen">
                    <img src="asset/macbook-mockup.png"
                        class="w-full h-auto mt-20 mb-20 ml-0 lg:mt-24 xl:mt-40 lg:mb-0 lg:h-full lg:-ml-12">
                </div>
            </div>
        </div>
    </div>
    <!-- HERO SECTION END -->

    <!-- BEGIN FEATURES SECTION -->
    <div id="features" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
        <div class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
            <h2 class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Paket Wisata</h2>
            <h3 class="max-w-2xl px-5 mt-2 text-3xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">Dapatkan pengalaman terbaik bersama kami</h3>
            <div class="bg-white w-full my-14 gap-4 flex-wrap flex justify-center items-center">
                <!-- card -->
                <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                    <img class="h-40 object-cover rounded-xl" h-40="" object-cover="" rounded-xl"="" src="asset/ciboerpass.jpg" alt="">
                    <div class="p-2">
                        <h2 class="font-bold text-lg mb-2 ">Ciboer Pass </h2>
                        <p class="text-sm text-gray-600">Ngopi Santai Hingga Bermalam di Villa Dengan Pemandangan Alam
                    </div>
                    <div class="m-2">
                        <a role="button" href="#" class="text-white bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">Daftar Paket</a>
                    </div>
                </div>
                <!-- Card -->
                <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                    <img class="h-40 object-cover rounded-xl" h-40="" object-cover="" rounded-xl"="" src="asset/panyawueyan.jpg" alt="">
                    <div class="p-2">
                        <h2 class="font-bold text-lg mb-2 ">Terasering Panyaweuyan</h2>
                        <p class="text-sm text-gray-600">Nikmati sunset dan sunrise di sawah yang menakjubkan
                    </div>
                    <div class="m-2">
                        <a role="button" href="#" class="text-white bg-sky-500 px-3 py-1 rounded-md hover:bg-purple-700">Daftar Paket</a>
                    </div>
                </div>

                <!-- Card -->
                <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                    <img class="h-40 object-cover rounded-xl" h-40="" object-cover="" rounded-xl"="" src="asset/cipanten.jpg" alt="">
                    <div class="p-2">
                        <h2 class="font-bold text-lg mb-2 ">Situ Cipanten</h2>
                        <p class="text-sm text-gray-600">Segarnya air pegunungan yang jernih, asri dan memanjakan ada disini
                    </div>
                    <div class="m-2">
                        <a role="button" href="#" class="text-white bg-green-500 px-3 py-1 rounded-md hover:bg-purple-700">Daftar Paket</a>
                    </div>
                </div>
                <!-- Card -->
                <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                    <img class="h-40 object-cover rounded-xl" h-40="" object-cover="" rounded-xl"="" src="asset/cipeuteuy.jpg" alt="">
                    <div class="p-2">
                        <h2 class="font-bold text-lg mb-2 ">Curug Cipeuteuy</h2>
                        <p class="text-sm text-gray-600">Mata air pegunungan dan suasana hutan pinus yang menyejukan
                    </div>
                    <div class="m-2">
                        <a role="button" href="#" class="text-white bg-yellow-500 px-3 py-1 rounded-md hover:bg-purple-700">Daftar Paket</a>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!-- END FEATURES SECTION -->

    <footer class="px-4 pt-12 pb-8 text-white bg-white border-t border-gray-200">
        <div class="container flex flex-col justify-between max-w-6xl px-4 mx-auto overflow-hidden lg:flex-row">
            <div class="w-full pl-12 mr-4 text-left lg:w-1/4 sm:text-center sm:pl-0 lg:text-left">
                <a href="/"
                    class="flex justify-start text-left sm:text-center lg:text-left sm:justify-center lg:justify-start">
                    <span class="flex items-start sm:items-center">
                        <img src="asset/majawisata.svg.svg" alt="logo" class="h-8">
                    </span>
                </a>
                <p class="mt-6 mr-4 text-base text-gray-500">Memberikan pengalaman terbaik dalam setiap wisata anda</p>
            </div>

            <div class=" pt-6 mt-10 text-center text-gray-500 border-t border-gray-100">© 2024 Landmark. All rights
                reserved.</div>

            <div class=" pt-4 mt-2 text-center text-gray-600 border-t border-gray-100">Develop by <a href="https://www.instagram.com/_fauzyrmdhn">Fauzy Ramadan</a></div>
    </footer>

    <!-- a little JS for the mobile nav button -->
    <script>
        if (document.getElementById('nav-mobile-btn')) {
            document.getElementById('nav-mobile-btn').addEventListener('click', function() {
                if (this.classList.contains('close')) {
                    document.getElementById('nav').classList.add('hidden');
                    this.classList.remove('close');
                } else {
                    document.getElementById('nav').classList.remove('hidden');
                    this.classList.add('close');
                }
            });
        }
    </script>
</body>

</html>