<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$kuliners = App\Models\Kuliner::with('resto')->get();
foreach ($kuliners as $k) {
    echo "Kuliner: " . $k->nama_kuliner . " | RestoID: " . $k->resto_id . " | RestoName: " . ($k->resto ? $k->resto->nama_resto : 'NULL') . "\n";
}
