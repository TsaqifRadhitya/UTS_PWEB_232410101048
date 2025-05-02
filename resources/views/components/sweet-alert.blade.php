<div id="sweetAlert" class="fixed left-5 tran bottom-5 bg-green-300 rounded-l py-2.5 px-5 shadow-md rounded-lg">
    <h1 class="w-full text-center text-white">@yield('sweetAlert')</h1>
</div>

<script>
    setTimeout(() => {
        document.getElementById('sweetAlert').remove()
    }, 1000);
</script>
