<x-mail::message>
# Invoice Paid
 
Your invoice has been paid!

## {{ $title }}

TRANSACTION: {{ $transaction }} \
TOTAL DUE: USD{{ $total }} \
STATUS: {{ $status }}
 

 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>