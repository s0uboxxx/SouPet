@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="sm:flex items-center max-w-screen-xl">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="https://i.imgur.com/WbQnbas.png">
        </div>
    </div>
    <div class="sm:w-1/2 p-5">
        <div class="text" style="text-align: justify">
            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">Về <span class="text-indigo-600">Trang Web</span>
            </h2>
            <p class="text-gray-700 text-base">
                Tôi tin rằng mình có thể làm cho thế giới của thú cưng và những người nuôi thú cưng trở nên tốt đẹp hơn bằng cách 
                mang đến cho họ những sản phẩm và trải nghiệm tốt nhất.
            </p>
            <p class="text-gray-700 text-base">
                Tôi đang cố gắng trở thành một Website đáng tin cậy và tiện lợi nhất cho những người nuôi thú cưng. Sự thành công của tôi được đánh giá bởi sự hạnh phúc của những thú cưng mà tôi phục vụ.
            </p>
            <p class="text-gray-700 text-base">
                Tầm nhìn của tôi là xây dựng một nền tảng công nghệ toàn diện cho các những người nuôi thú cưng để tận hưởng sản phẩm và dịch vụ trực tuyến không bị gián đoạn, vì tôi tin rằng phục vụ cộng đồng nuôi thú rộng là phải thu hẹp khoảng cách và đưa cộng đồng lại gần nhau.
            </p>
        </div>
    </div>
</div>
@endsection
