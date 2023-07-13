<?php
function hitungPecahan($totalUang, $pecahan) {
    $jumlahPecahan = 0;

    while ($totalUang >= $pecahan) {
        $jumlahPecahan++;
        $totalUang -= $pecahan;
    }

    return $jumlahPecahan;
}

$totalUang = 1575250;

$pecahan100000 = hitungPecahan($totalUang, 100000);
$totalUang %= 100000;

$pecahan50000 = hitungPecahan($totalUang, 50000);
$totalUang %= 50000;

$pecahan20000 = hitungPecahan($totalUang, 20000);
$totalUang %= 20000;

$pecahan5000 = hitungPecahan($totalUang, 5000);
$totalUang %= 5000;

$pecahan50 = hitungPecahan($totalUang, 50);

echo "Jumlah pecahan Rp 100.000: " . $pecahan100000 . "<br>";
echo "Jumlah pecahan Rp 50.000: " . $pecahan50000 . "<br>";
echo "Jumlah pecahan Rp 20.000: " . $pecahan20000 . "<br>";
echo "Jumlah pecahan Rp 5.000: " . $pecahan5000 . "<br>";
echo "Jumlah pecahan Rp 50: " . $pecahan50 . "<br>";
?>