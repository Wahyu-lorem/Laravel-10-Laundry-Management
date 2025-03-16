@extends('pelanggan.layouts.app_laporan')

@section('title', 'Invoice')

@section('content')
<div class="tm_invoice_in">
   <div class="tm_invoice_head tm_align_center tm_mb20">
      <div class="tm_invoice_left">
         <div class="tm_logo"><img src="/dist/assets/img/laundry.png" style="max-width: 200px" alt="Logo"></div>
      </div>
      <div class="tm_invoice_right tm_text_right">
         <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
      </div>
   </div>
   <div class="tm_invoice_info tm_mb20">
      <div class="tm_invoice_seperator">
         <img src="assets/img/arrow_bg.svg" alt="">
      </div>
      <div class="tm_invoice_info_list">
         <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">{{ $transaksi->invoice }}</b></p>
         <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</b></p>
         <div class="tm_invoice_info_list_bg tm_accent_bg_10"></div>
      </div>
   </div>
   <div class="tm_invoice_head tm_mb10">
      <div class="tm_invoice_left">
         <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
         <p>
            {{ Auth::user()->name }} <br>
            {{ Auth::user()->telepon }} <br>
            {{ Auth::user()->alamat }}
         </p>
      </div>
   </div>
   <div class="tm_table tm_style1 tm_mb30">
      <div class="tm_table_responsive">
         <table class="tm_border_bottom">
            <thead>
               <tr class="tm_border_top">
                  <th class="tm_width_3 tm_semi_bold tm_primary_color tm_accent_bg_10">Paket</th>
                  <th class="tm_width_2 tm_semi_bold tm_primary_color tm_accent_bg_10">Price</th>
                  <th class="tm_width_1 tm_semi_bold tm_primary_color tm_accent_bg_10">Qty</th>
                  <th class="tm_width_2 tm_semi_bold tm_primary_color tm_accent_bg_10 tm_text_right">Total</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="tm_width_3">{{ $transaksi->paket }}</td>
                  <td class="tm_width_2">Rp. {{ number_format($transaksi->harga, 0) }}</td>
                  <td class="tm_width_1">{{ $transaksi->kilogram }} kg</td>
                  <td class="tm_width_2 tm_text_right">Rp. {{ number_format($transaksi->harga * $transaksi->kilogram, 0) }}</td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="tm_invoice_footer">
         <div class="tm_left_footer">
            <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <ul class="tm_m0 tm_note_list">
               <li>All claims relating to quantity or shipping errors.</li>
               <li>Delivery dates are not guaranteed and Seller.</li>
            </ul>
         </div>
         <div class="tm_right_footer" style="display: flex; flex-direction: column; align-items: flex-end;">
            <table>
               <tbody>
                  <tr>
                     <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtotal</td>
                     <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">Rp. {{ number_format($transaksi->harga * $transaksi->kilogram, 0) }}</td>
                  </tr>
               </tbody>
            </table>
            @if($transaksi->status == 4)
            <div class="tm_invoice_paid" style="margin-top: 10px;">
               <img src="/dist/assets/img/stempel.png" alt="Lunas" style="max-width: 200px">
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection
