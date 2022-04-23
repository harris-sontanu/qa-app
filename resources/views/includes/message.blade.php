@if (session('success'))
    <div class="style-msg successmsg">
        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Well done!</strong> {{ session('success') }}</div>
    </div>
@endif