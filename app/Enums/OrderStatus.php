<?php
namespace App\Enums;
enum OrderStatus:string { case Pending='pending'; case Paid='paid'; case Packed='packed'; case Shipped='shipped'; case Delivered='delivered'; case Cancelled='cancelled'; }
