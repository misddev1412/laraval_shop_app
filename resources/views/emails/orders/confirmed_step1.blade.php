<p style="display: none">{{__('emails.orders.confirmed.title', ['code' => $order->code])}}</p>
@component('mail::message')
# {{ __('emails.orders.confirmed.greeting', ['name' => $order->user->name]) }}
<ul style="list-style: none;display: flex;text-align: center;justify-content: center;align-items: center;margin-left:0;margin-right: 0;padding-left: 0;padding-right: 0;margin-top:20px;margin-bottom: 20px">
    <li style="display: flex;align-items: center;margin: auto"><img width="40" src="{{asset('https://s3.ap-southeast-1.wasabisys.com/laravel-shop-core/progress_step/1_order_confirm_fill.png')}}" alt="{{__('emails.orders.step.confirmed')}}"></li>
    <li style="display: flex;align-items: center;margin: auto">-----------</li>
    <li style="display: flex;align-items: center;margin: auto"><img width="40" style="filter:opacity(0.2);opacity: 0.2" src="{{asset('https://s3.ap-southeast-1.wasabisys.com/laravel-shop-core/progress_step/2_preparing_outline.png')}}" alt="{{__('emails.orders.step.preparing')}}"></li>
    <li style="display: flex;align-items: center;margin: auto">-----------</li>
    <li style="display: flex;align-items: center;margin: auto"><img width="40" style="filter:opacity(0.2);opacity: 0.2" src="{{asset('https://s3.ap-southeast-1.wasabisys.com/laravel-shop-core/progress_step/3_delivery_outline.png')}}" alt="{{__('emails.orders.step.shipping')}}"></li>
    <li style="display: flex;align-items: center;margin: auto">-----------</li>
    <li style="display: flex;align-items: center;margin: auto"><img width="40" style="filter:opacity(0.2);opacity: 0.2" src="{{asset('https://s3.ap-southeast-1.wasabisys.com/laravel-shop-core/progress_step/4_done_outline.png')}}" alt="{{__('emails.orders.step.completed')}}"></li>
</ul>
{{ __('emails.orders.confirmed.intro') }}
@component('mail::table')
| | |
|:---:|:---:|
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.code')}} </div>|<div style="text-align: left"> {{$order->code}} </div>|
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.status')}} </div>|<div style="text-align: left"> {{$order->external_status}}</div> |
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.total')}} </div>| <div style="text-align: left">{{ $payment->currency->symbol . number_format($order->total_due_amount) }}</div> |
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.created_at')}} </div>|<div style="text-align: left"> {{$order->created_at}}</div> |
@endcomponent
@component('mail::table')
| | |
|:---:|:---:|
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.shipping_address')}} </div>|<div style="text-align: left"> {{__('So 4, Nguyen Trai, Thanh Xuan, Ha Noi')}} </div>|
    |<div style="text-align: left;font-weight: 500"> {{__('emails.orders.attributes.shipping_method')}} </div>|<div style="text-align: left"> {{__('Giao hang nhanh')}} </div>|
@endcomponent

@component('mail::table')
| {{ __('emails.orders.attributes.order_number') }} | {{ __('emails.orders.attributes.image') }} | {{ __('emails.orders.attributes.name') }} | {{ __('emails.orders.attributes.quantity') }} | {{ __('emails.orders.attributes.unit_price') }} | {{ __('emails.orders.attributes.total_price') }} |
|:---:|:---:|:---:|:---:|:---:|:---:|
@php
    $i = 1;
    $subtotal = 0;
@endphp
@foreach ($order->items as $item)
    @php($subtotal += $item->unit_price * $item->quantity)
    | {{ $i++ }} | {{ $item->product->image }} | <div style="text-align: left"> {{ $item->product->currentTranslation->name }} </div> <div style="text-align:left;color: #ccc;font-size: 11px">{{$item->variant_name . ': ' . $item->variant_value}}</div>  | {{ $item->quantity }} | <div style="text-align: right">{{ $payment->currency->symbol . number_format($item->unit_price) }} </div> | <div style="text-align: right">{{ $payment->currency->symbol . number_format($item->unit_price * $item->quantity) }} </div> |
@endforeach
| | | | | **{{ __('emails.orders.attributes.subtotal') }}** | <div style="text-align: right">{{ $payment->currency->symbol . number_format($subtotal) }}</div> |
| | | | | **{{ __('emails.orders.attributes.shipping') }}** | <div style="text-align: right">{{ $payment->currency->symbol . number_format($order->total_shipping_cost) }}</div> |
| | | | | **{{ __('emails.orders.attributes.total') }}** | <div style="text-align: right">{{ $payment->currency->symbol . number_format($order->total_due_amount) }}</div>  |
@endcomponent
@component('mail::button', ['url' => route('frontend.order.show', $order->id)])
{{ __('emails.orders.confirmed.button') }}
@endcomponent
{{ __('emails.orders.confirmed.outro') }}

{{ __('emails.orders.confirmed.salutation') }},<br>
{{ config('app.name') }}
@endcomponent
