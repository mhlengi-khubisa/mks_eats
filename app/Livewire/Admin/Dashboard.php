<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use Livewire\Component;

class Dashboard extends Component
{
    public function __invoke()
    {
        return $this->render();
    }

    public function render()
    {
        $stats = [
            'vendors' => Vendor::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'revenue' => (float) Order::sum('grand_total'),
        ];

        $recentOrders = Order::with('customer', 'vendor')
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
        ]);
    }
}
