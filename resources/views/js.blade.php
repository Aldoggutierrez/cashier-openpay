<script type="text/javascript">
    $(document).ready(function() {
        OpenPay.setId('{{ config('cashier_openpay.id') }}');
        OpenPay.setApiKey('{{ config('cashier_openpay.public_key') }}');
        OpenPay.setSandboxMode({{ config('cashier_openpay.production_mode') ? 'false' : 'true' }});
        @if($id_form != '')
            var deviceSessionId = OpenPay.deviceData.setup('{{ $id_form }}', '{{ $input_name }}');
        @endif
    });
</script>
