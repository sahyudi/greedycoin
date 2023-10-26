
<?php

function greedyCoinChange($coins, $amount)
{
    $coinCount = count($coins);
    $result = array();
    $stepCount = 0;

    for ($i = 0; $i < $coinCount; $i++) {
        $coin = $coins[$i];
        $coinQty = floor($amount / $coin);
        if ($coinQty > 0) {
            $result[$coin] = $coinQty;
            $stepCount += $coinQty;
            $amount -= ($coinQty * $coin);
        }
    }

    return array('result' => $result, 'stepCount' => $stepCount);
}

// Input jumlah koin yang akan ditukar
echo "Masukkan jumlah koin yang akan ditukar: ";
$amount = intval(readline());

// Input nilai koin
$coins = array();
echo "Masukkan nilai koin (tekan Enter setelah setiap koin, ketik 'selesai' untuk mengakhiri):\n";
while (true) {
    $coin = readline();
    if ($coin === 'selesai') {
        break;
    }
    $coins[] = intval($coin);
}

// Urutkan koin dalam urutan menurun
rsort($coins);

// Panggil fungsi Greedy untuk menghitung hasil
$result = greedyCoinChange($coins, $amount);

// Tampilkan hasil
echo "Hasil pertukaran:\n";
foreach ($result['result'] as $coin => $quantity) {
    echo "$quantity koin dengan nilai $coin\n";
}
echo "Total langkah: " . $result['stepCount'] . " langkah\n";


?> 
