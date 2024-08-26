<?php
// $id = $_GET['id'];
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-indigo-600 text-white p-4">
        <img src="asset/logo.svg" alt="logo" class="h-10 mt-10">
        <h1 class="text-3xl font-bold text-center">Pemesanan Paket Majawisata</h1>
    </header>

    <main class="p-4">
        <form class="w-full p-8">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Nama
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text" placeholder="Fauzy Ramadan">

                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="whatsapp">
                        Nomor Whatsapp
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="whatsapp" type="text" placeholder="0812">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Booking_date">
                        Tanggal Kunjungan
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="booking_date" type="date" placeholder="" name="booking_date">
                </div>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Pelayanan Paket Wisata</h3>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="paket_layanan[]" value="1000000" class="form-checkbox h-5 w-5 text-indigo-600">
                    <span class="ml-2 text-gray-700">Penginapan (Rp. 1.000.000,-)</span>
                </label>
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="paket_layanan[]" value="1200000" class="form-checkbox h-5 w-5 text-indigo-600">
                    <span class="ml-2 text-gray-700">Trasportasi (Rp. 1.200.000,-)</span>
                </label>
            </div>

            <div class="mb-8">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="paket_layanan[]" value="500000" class="form-checkbox h-5 w-5 text-indigo-600">
                    <span class="ml-2 text-gray-700">Makanan (Rp. 500.000,-)</span>
                </label>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jml-peserta">
                        Jumlah Peserta
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jml-peserta" type="text" placeholder="1">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="package">
                        Wisata
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="package_id">
                            <option>Ciboerpass</option>
                            <option>Panyaweuyan</option>
                            <option>Situ Cipanten</option>
                            <option>Curug Cipeuteuy</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="package_price">
                        Harga Paket Wisata
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="package_price" type="text" placeholder="Rp. " disabled>
                </div>
                <div class="w-full px-3 mt-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jml_harga">
                        Total Harga Paket
                    </label>
                    <input class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jml_harga" type="text" placeholder="Rp. " disabled>
                </div>
            </div>
        </form>
    </main>
</body>

</html>