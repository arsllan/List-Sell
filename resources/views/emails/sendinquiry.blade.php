<h2>List & Sell Inquiry Request</h2>

<p> Name : {{ $name }} </p>
<p> Email : {{ $email }} </p>
<p> Phone : {{ $phone }} </p>
<p> Message : {{ $messages }} </p>
<p> I am a cash buyer : @if($cash_or_finance == 'cash') Yes @else No @endif </p>
<p> I will need finance : @if($cash_or_finance == 'finance') Yes @else No @endif </p>