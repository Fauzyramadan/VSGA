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

    <form action="proses_booking.php" method="POST">
        <main class="p-4">
            <form class="w-full p-8">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Nama
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="Fauzy Ramadan" required>

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="whatsapp">
                            Nomor Whatsapp
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="whatsapp" name="whatsapp" type="text" placeholder="0812" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="hari_kunjungan">
                            Hari Kunjungan
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="hari_kunjungan" type="number" placeholder="1" name="hari_kunjungan">
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Pelayanan Paket Wisata</h3>
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="paket_inap" id="paket_inap" value="1" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2 text-gray-700">Penginapan (Rp. 1.000.000,-)</span>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="paket_transport" id="paket_transport" value="1" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2 text-gray-700">Trasportasi (Rp. 1.200.000,-)</span>
                    </label>
                </div>

                <div class="mb-8">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="paket_makan" id="paket_makan" value="1" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2 text-gray-700">Makanan (Rp. 500.000,-)</span>
                    </label>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="harga">
                            Harga Paket Wisata
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="harga" id="harga" type="number" placeholder="Rp. " readonly>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jml_peserta">
                            Jumlah Peserta
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jml_peserta" type="number" name="jml_peserta" placeholder="1">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="package_id">
                            Wisata
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="package_id" name="package_id">
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
                    <div class="w-full px-3 mt-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="total">
                            Total Harga Paket
                        </label>
                        <input class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="total" type="number" name="total" placeholder="Rp. " readonly>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                            Pesan Sekarang
                        </button>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button type="Reset" class="bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Reset Pesanan
                        </button>
                    </div>

                </div>
            </form>
        </main>
    </form>
</body>

</html>

<script>
    //tentukan konstanta biaya masing-masing
    const paket_inap = 1000000;
    const paket_transport = 1200000;
    const paket_makan = 500000;

    function updateTotalCost() {
        //inisisi harga paket 0
        let totalCost = 0;

        //referensi dari checkbox
        const inapCheckbox = document.getElementById('paket_inap');
        const transportCheckbox = document.getElementById('paket_transport');
        const makanCheckbox = document.getElementById('paket_makan');

        //jika inap checkbox ter-check
        if (inapCheckbox.checked) {
            totalCost += paket_inap;
        }

        //jika transport checkbox ter-check
        if (transportCheckbox.checked) {
            totalCost += paket_transport;
        }

        //jika makan checkbox ter-check
        if (makanCheckbox.checked) {
            totalCost += paket_makan;
        }

        document.getElementById('harga').value = totalCost;
    }

    function updateTotal() {
        let TotalTagihan = 0;

        var hari_kunjungan = document.getElementById('hari_kunjungan').value;
        var jml_peserta = document.getElementById('jml_peserta').value;
        var harga = document.getElementById('harga').value;

        TotalTagihan = hari_kunjungan * jml_peserta * harga;

        document.getElementById('total').value = TotalTagihan;
    }

    document.getElementById('paket_inap').addEventListener('change', updateTotalCost);
    document.getElementById('paket_transport').addEventListener('change', updateTotalCost);
    document.getElementById('paket_makan').addEventListener('change', updateTotalCost);

    document.getElementById('paket_inap').addEventListener('change', updateTotal);
    document.getElementById('paket_transport').addEventListener('change', updateTotal);
    document.getElementById('paket_makan').addEventListener('change', updateTotal);

    document.getElementById('hari_kunjungan').addEventListener('change', updateTotalCost);
    document.getElementById('jml_peserta').addEventListener('change', updateTotalCost);

    document.getElementById('hari_kunjungan').addEventListener('change', updateTotal);
    document.getElementById('jml_peserta').addEventListener('change', updateTotal);

    updateTotalCost();
    updateTotal();
</script>