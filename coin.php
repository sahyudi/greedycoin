<?php

// Fungsi algoritma Greedy untuk menukar uang dengan koin
function changeCoin($coinValues, $totalCoins, $amountToChange)
{
    // Inisialisasi variabel
    $result = array(); // Untuk menyimpan jumlah koin setiap nilai
    $totalSteps = 0;    // Untuk menghitung total langkah

    // Urutkan koin dalam urutan menurun
    sort($coinValues);
    // rsort($coinValues);

    // Loop untuk setiap jenis koin
    for ($i = 0; $i < $totalCoins; $i++) {
        $coinValue = $coinValues[$i];

        // Hitung jumlah koin yang diperlukan
        $coinCount = floor($amountToChange / $coinValue);
        if ($coinCount > 0) {
            // Simpan jumlah koin dan nilai koin ke dalam hasil
            $result[$coinValue] = $coinCount;
            $totalSteps += $coinCount;

            // Update jumlah yang perlu ditukar
            $amountToChange -= ($coinCount * $coinValue);
        }
    }

    return array('result' => $result, 'steps' => $totalSteps);
}

// Input jumlah coin yang ingin ditukar
echo "Masukkan jumlah coin yang ingin ditukar: ";
$totalCoins = intval(readline());

// Input nilai dari masing-masing coin
$coinValues = array();
echo "Masukkan nilai coin (tekan Enter setelah setiap nilai):\n";
for ($i = 1; $i <= $totalCoins; $i++) {
    echo "Nilai coin ke-$i: ";
    $coinValue = intval(readline());
    $coinValues[] = $coinValue;
}

// Input total koin yang ingin ditukar
echo "Masukkan total koin yang akan ditukar: ";
$amountToChange = intval(readline());

// Panggil fungsi Greedy untuk menghitung hasil
$result = changeCoin($coinValues, $totalCoins, $amountToChange);

// Tampilkan hasil
echo "Hasil pertukaran:\n";
foreach ($result['result'] as $coin => $quantity) {
    echo "$quantity koin dengan nilai $coin\n";
}
echo "Total langkah: " . $result['steps'] . " langkah\n";
