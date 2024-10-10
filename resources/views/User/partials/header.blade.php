<div class="main_header">
    <div class="logo">
        <a><img style="width: 30px; height: 30px; cursor: pointer;" src="{{ asset('anh/user.png') }}" alt="Login Icon" id="loginIcon"></a>

        @if(Auth::check())
        @if(Auth::user()->role === 'customer') 
        <!-- Display customer-specific content -->
        <span style="color: azure; margin-left: 10px; font-family: Arial, sans-serif;">{{ Auth::user()->username }}</span>
        @elseif(Auth::user()->role === 'employee')
       <span style="color: azure; margin-left: 10px; font-family: Arial, sans-serif;">{{ Auth::user()->username }}</span>
        @endif
        @else
        <span id="usernameDisplay" style="display: none;"></span>
        @endif
        <!-- @if (Auth::check())
        <p style="color:aliceblue;margin-left: 10px; font-family: Arial, sans-serif;display:flex"> {{ Auth::user()->username }} </p>
        @endif -->


        <!-- Dropdown-menu -->
        <div class="dropdown-menu" id="dropdownMenu">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer; text-decoration: none; margin-left: 30px;">
                    Logout
                </button>
            </form><br>
            <hr>
            <a href="{{ route('orders.index') }}">
                <button type="submit" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer; text-decoration: none;">
                    Đơn mua<p style="font-size: 10px;color:gray">Xem lịch sử mua hàng</p>
                </button>
            </a>
        </div>
    </div>
    <div class="diachi">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
        </svg>
        <span>Hỗ trợ mua hàng: 0964xxxx36</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
        </svg>
        <span>Hỗ trợ chăm sóc khách hàng: 0985xxxx42</span>

    </div>
    <div class="giohang">
        <a href="{{ route('reservation.show') }}">
            <button type="button" onclick="openModal()">
                <i class="fas fa-utensils"></i> Đặt Bàn
            </button>
        </a>
        <a href="{{ route('gioHang') }}">
            <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <span class="cart-badge" id="cartCount">0</span>
            </button>
        </a>
    </div>
</div>