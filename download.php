<?php
$imgs = [
    'pos-terminal.jpg' => 'https://images.unsplash.com/photo-1556742059-07cc8f85f1c2?auto=format&fit=crop&w=640&h=480&q=80',
    'cashier-tall.jpg' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=700&h=900&q=80',
    'shop-customer.jpg' => 'https://images.unsplash.com/photo-1556740714-a8395b3bf30f?auto=format&fit=crop&w=500&h=400&q=80',
    'shop-minimal.jpg' => 'https://images.unsplash.com/photo-1579899385055-6bda7d353a29?auto=format&fit=crop&w=500&h=400&q=80',
    'team-pos.jpg' => 'https://images.unsplash.com/photo-1556742031-c6961e102620?auto=format&fit=crop&w=640&h=480&q=80',
    'team-collab.jpg' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&h=500&q=80',
    'owner-shop.jpg' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&h=500&q=80',
    'dashboard-laptop.jpg' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&h=500&q=80',
    'kasir-live.jpg' => 'https://images.unsplash.com/photo-1556745753-b2904692b3cd?auto=format&fit=crop&w=640&h=440&q=80',
    'manajemen-barang.jpg' => 'https://images.unsplash.com/photo-1588661643900-54e79dc17a78?auto=format&fit=crop&w=640&h=440&q=80',
    'laporan-analitik.jpg' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=640&h=440&q=80',
    'multi-peran.jpg' => 'https://images.unsplash.com/photo-1556741533-6c841f4f1f44?auto=format&fit=crop&w=640&h=440&q=80'
];

@mkdir('public/images/landing-modern', 0777, true);
foreach ($imgs as $n => $u) {
    echo 'Downloading ' . $n . PHP_EOL;
    $ctx = stream_context_create(['http' => ['header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)']]);
    file_put_contents('public/images/landing-modern/' . $n, file_get_contents($u, false, $ctx));
}
echo "Done!\n";
