<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index()
    { 
        $coupons = Coupon::orderBy('id', 'desc')->paginate(10);
        return view('admin.coupon.list', compact('coupons'));
    }

    function create()
    {
        return view('admin.coupon.add');
    }

    function store(Request $request)
    {
        $request->validate([
            // regex code: ^[A-Z0-9]{10}
            'code' => 'required|regex:/^[A-Z0-9]{7}$/|unique:coupons',
            'discount' => 'required|numeric|min:1|max:100',
            'quantity' => 'required|numeric|min:1|max:9999',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
        ]);

        $dataCoupon = [
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
        ];

        if (Coupon::create($dataCoupon)) {
            return redirect()->route('admin.coupon')->with('success', 'Coupon created successfully');
        } else {
            return redirect()->route('admin.coupon.create')->with('error', 'Coupon created failed');
        }
    }

    function edit(string $code)
    {
        $coupon = Coupon::where('code', $code)->first();
        return view('admin.coupon.edit', compact('coupon'));
    } 

    function update(string $code, Request $request)
    {
        $coupon = Coupon::where('code', $code)->first();

        $request->validate([
            'code' => 'required|regex:/^[A-Z0-9]{7}$/|unique:coupons,code,' . $coupon->id, 
            'discount' => 'required|numeric|min:1|max:100',
            'quantity' => 'required|numeric|min:1|max:9999',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
        ]);

        $dataCoupon = [
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
        ];

        if ($coupon->update($dataCoupon)) {
            return redirect()->route('admin.coupon')->with('success', 'Coupon updated successfully');
        } else {
            return redirect()->route('admin.coupon.edit', $code)->with('error', 'Coupon updated failed');
        }
    }

    function delete(string $code)
    {
        $coupon = Coupon::where('code', $code)->first();
        if ($coupon->delete()) {
            return redirect()->route('admin.coupon')->with('success', 'Coupon deleted successfully');
        } else {
            return redirect()->route('admin.coupon')->with('error', 'Coupon deleted failed');
        }
    } 

    
}
