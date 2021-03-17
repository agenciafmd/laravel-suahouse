<script src="https://{{ config('laravel-suahouse.domain') }}/track/origem.js"></script>
<script language="javascript">
    var hc_dominio_chat = '{{ config('laravel-suahouse.domain') }}';
    var hc_https = 1;
    @if(config('laravel-suahouse.domain'))
        var hc_color = "{{ config('laravel-suahouse.chat') }}";
    @endif
    /* var hc_filial = "xxxx";
    var hc_empreendimento = "xxxx"; */
</script>