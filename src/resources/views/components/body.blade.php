<script language="javascript">
    function sendToSuaHouse(param, callback) {
        var param = {
            event: param.event || 'form',
            form_name: param.form_name || 'formulário',
            form_id: param.form_id || '0000',
            code: param.code || '0000',
            id: param.id || '0000',
            product: param.product || 'Nenhum',
            name: param.name || 'John Doe',
            email: param.email || 'john.doe@email.com',
            ddd: param.ddd || '00',
            phone: param.phone || '999999999',
        };

        let response = hc_envia_mensagem(
            param.code,
            param.name,
            param.email,
            param.ddd,
            param.phone,
        );

        callback(param, response);
    };

    function pushToDatalayer(param, response) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            event: param.event,
            form_name: param.form_name,
            form_id: param.form_id,
            product_id: param.id,
            product: param.product,
            lead_id: response.retorno,
        });
    }

    window.livewire.on('suahouse', (param) => {
        sendToSuaHouse(param, pushToDatalayer);
    });

    @if(session()->has('suahouse'))
        let param = {
            @foreach(session('suahouse') as $param => $value)
                {{ $param }}: '{{ $value }}',
            @endforeach
        };

        sendToSuaHouse(param, pushToDatalayer);
    @endif
</script>