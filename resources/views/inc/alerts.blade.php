@if(session()->has('success'))
<p class="alert alert-success">{{ session('success') }}</p>
<script>
    $('.alert-success').hide().slideDown(300).delay(2000).slideUp(300);

</script>
@endif

@if(session()->has('warning'))
<p class="alert alert-warning mt-2">{{ session('warning') }}</p>
<script>
    $('.alert-warning').hide().slideDown(300).delay(2000).slideUp(300);

</script>
@endif
