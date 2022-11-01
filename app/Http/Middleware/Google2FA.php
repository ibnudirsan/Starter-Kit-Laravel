<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Google2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now            = Carbon::now()->format('Y-m-d H:i:s');
        // Jika Aktif OTP.
        if((bool) auth()->user()->secret->statusOTP == true) {
            // Jika TimeOTP lebih kecil dari Time Now maka ke OTP Form.
            if(auth()->user()->secret->timeOTP < $now ){                
                return redirect()->route('google.validation');
            // Jika Time OTP lebih besar dari waktu sekarang dan semua info User sama masih kosong maka lanjut ke Dashboard.
            } elseif (auth()->user()->secret->timeOTP > $now) {
                return $next($request);
            }
        // Jika Belum Aktif OTP.
        } elseif ((bool) auth()->user()->secret->statusOTP == false) {
            return $next($request);
        }
    }
}
